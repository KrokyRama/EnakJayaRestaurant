<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="assets/css/styleadmin.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/LOGOS.png">
    <style>
        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        table thead {
            background-color: #f2f2f2;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        table th {
            background-color: #07212e;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            margin: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 0px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin EnakJaya</h1>

        <nav class="navbar">
            <ul>
                <li><a href="/admintransaksi">Data Transaksi</a></li>
                <li><a href="/adminpelanggan">Data Pelanggan</a></li>
                <li><a href="/adminsaran">Data Saran dan Keluhan</a></li>
                <li><a href="/adminmenu">Data Menu</a></li>
                <li><a href="/adminmeja">Data Meja</a></li>
                <li>
                    <div class="button-container">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button" id="logoutBtn" title="Logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Data Transaksi</h2>
        <table id="transactionTable">
            <thead>
                <tr>
                    <th>Nomor Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Cust</th>
                    <th>Nomor Meja</th>
                    <th>Jenis Pesanan</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->customer->nama }}</td>
                        <td>{{ $order->meja_id }}</td>
                        <td>{{ $order->jenis_pesanan }}</td>
                        <td>
                            @php
                                $totalPrice = 0;
                                foreach($order->orderDetails as $detail) {
                                    $totalPrice += $detail->quantity * $detail->menu->price;
                                }

                                // Tambahkan biaya takeaway sebesar Rp.3000 jika jenis pesanan adalah takeaway
                                if ($order->jenis_pesanan == 'takeaway') {
                                    $totalPrice += 3000;
                                }
                            @endphp
                            Rp {{ number_format($totalPrice, 0, ',', '.') }}
                        </td>
                        <td>{{ $order->payment->metode_pembayaran }}</td>
                        <td>{{ $order->payment->status_pembayaran == 1 ? 'Lunas' : 'Belum Lunas' }}</td>
                        <td>{{ $order->status_pesanan == 1 ? 'Selesai' : 'Belum Selesai' }}</td>
                        <td>
                            <a href="{{ route('transaksi.edit', $order->order_id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
