<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/LOGOS.png">
    <style>
        /* Tambahkan style sesuai kebutuhan */
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
                        <td>{{ $order->payment->metode_pembayaran }}</td>
                        <td>{{ $order->payment->status_pembayaran }}</td>
                        <td>{{ $order->status_pesanan }}</td>
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
