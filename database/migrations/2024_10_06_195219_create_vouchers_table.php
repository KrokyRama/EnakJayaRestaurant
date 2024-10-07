<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id('voucher_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('voucher_code')->unique();
            $table->decimal('discount', 5, 2); // Discount persen
            $table->boolean('used')->default(false); // false jika belum digunakan, true jika sudah digunakan
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
}
