<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Meja</title>
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

        button:hover {
            background-color: var(--secondary-color);
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

    <!-- Container for the table -->
    <div class="container">
        <h2>Data Meja</h2>
        <table id="tableMeja">
            <thead>
                <tr>
                    <th>No Meja</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Aksi</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td>{{ $table->meja_id }}</td>
                        <td>{{ $table->kapasitas }}</td>
                        <td>{{ $table->status_meja ? 'Terisi' : 'Tersedia' }}</td>
                        <td>
                            <a href="{{ route('meja.edit', $table->meja_id) }}" class="btn btn-edit">Edit</a> <!-- Tombol Edit -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
