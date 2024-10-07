<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Order</title>
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
                <li><a href="/adminorderdetail">Data Detail Transaksi</a></li>
                <li><a href="/adminpelanggan">Data Pelanggan</a></li>
                <li><a href="/adminsaran">Data Saran dan Keluhan</a></li>
                <li><a href="/adminmenu">Data Menu</a></li>
                <li><a href="/adminmeja">Data Meja</a></li>
                <li>
                    <div class="button-container">
                        <a href="{{ url('/') }}" class="button" id="logoutBtn">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Container for the table -->
    <div class="container">
        <h2>Detail Order</h2>
        <table id="detailOrderTable">
            <thead>
                <tr>
                    <th>Id Detail Order</th>
                    <th>Nomor Transaksi</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->order_detail_id }}</td> <!-- Pastikan ini sesuai dengan primary key -->
                        <td>{{ $detail->order_id }}</td>
                        <td>{{ $detail->menu->nama_menu }}</td> <!-- Ambil nama menu dari relasi -->
                        <td>{{ $detail->quantity }}</td> <!-- Ganti 'jumlah' dengan 'quantity' sesuai model -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
