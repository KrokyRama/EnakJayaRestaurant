<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function member()
    {
        // Get the logged-in customer
        $customer = Customer::where('email', Auth::user()->email)->firstOrFail();

        // Get the last voucher created date (if any)
        $lastVoucher = Voucher::where('customer_id', $customer->customer_id)
            ->orderBy('created_at', 'desc')
            ->first();

        // Default to 10 years ago if no voucher exists
        $lastVoucherDate = $lastVoucher ? $lastVoucher->created_at : Carbon::now()->subYears(10);

        // Fetch all orders and purchase history
        $allpurchaseHistory = Order::with('orderDetails.menu')
            ->where('customer_id', $customer->customer_id)
            ->get();

        // Filter orders after the last voucher's date
        $purchaseHistory = $allpurchaseHistory->where('order_date', '>', $lastVoucherDate);

        // Initialize points system
        $totalPoints = $customer->total_points;
        $goalTarget = 200; // Set the goal to get a voucher
        $pointsHistory = [];
        $goalPointsPercentage = 0;
        $voucherCode = null;

        // Check for any unused voucher
        $existingVoucher = Voucher::where('customer_id', $customer->customer_id)
            ->where('used', false)
            ->first();

        // If no unused voucher, calculate points
        if (!$existingVoucher) {
            foreach ($purchaseHistory as $order) {
                $orderTotal = $order->orderDetails->sum(function ($detail) {
                    return $detail->quantity * $detail->menu->price;
                });

                $pointsEarned = $orderTotal * 0.001; // 0.1% of total spending as points
                $totalPoints += $pointsEarned;

                // Save points history for each order
                $pointsHistory[] = [
                    'order_id' => $order->order_id,
                    'order_date' => $order->order_date,
                    'total_spending' => $orderTotal,
                    'points_earned' => $pointsEarned,
                ];
            }

            // Check if total points meet or exceed the voucher goal
            while ($totalPoints >= $goalTarget) {
                // Generate a voucher
                $voucherCode = 'DISCOUNT' . strtoupper(Str::random(6));

                // Save the new voucher
                Voucher::create([
                    'customer_id' => $customer->customer_id,
                    'voucher_code' => $voucherCode,
                    'discount' => 15, // 15% discount
                    'used' => false,
                ]);

                // Subtract exactly the points needed for one voucher
                $totalPoints -= $goalTarget;
            }

            // Update the customer's total points (keep only the remainder after voucher issuance)
            $customer->update(['total_points' => $totalPoints]);
        }

        // Calculate the percentage towards the next goal (prevent division by zero)
        $goalPointsPercentage = $goalTarget > 0 ? ($totalPoints % $goalTarget) / $goalTarget * 100 : 0;

        // Fetch all vouchers to display
        $vouchers = Voucher::where('customer_id', $customer->customer_id)->get();

        // Return the view with all data
        return view('member', compact(
            'customer',
            'purchaseHistory',
            'totalPoints',
            'pointsHistory',
            'goalPointsPercentage',
            'voucherCode',
            'vouchers',
            'allpurchaseHistory'
        ));
    }

    public function updateProfile(Request $request)
    {
        // Ambil data customer berdasarkan email dari sesi pengguna
        $customer = Customer::where('email', Auth::user()->email)->firstOrFail();
        $user = User::where('email', Auth::user()->email)->firstOrFail();

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|max:255',
        ]);

        $oldEmail = $customer->email;

        // Update data di tabel customer
        $customer->nama = $validatedData['name'];
        $customer->nomor_telepon = $validatedData['phone'];
        $customer->gender = $validatedData['gender'] == 'male' ? 0 : 1;
        $customer->email = $validatedData['email'];
        $customer->save();

        // Update data di tabel user
        $user->name = $validatedData['name']; // Sesuaikan dengan field yang Anda gunakan di tabel user
        $user->email = $validatedData['email'];
        $user->save();

        // Jika email berubah, login ulang user dengan model User
        if ($oldEmail !== $validatedData['email']) {
            Auth::login($user); // Re-authenticate user with the new email
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
