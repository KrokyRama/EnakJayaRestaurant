<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
            background-color: #07212e; /* Warna hijau diganti menjadi #07212e */
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

        .btn {
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px; /* Tambahkan margin bawah untuk jarak */
        }

        .btn-add {
            background-color: #07212e; /* Warna tombol tambah */
        }

        .btn-edit {
            background-color: #07212e; /* Warna diganti menjadi #07212e */
            margin-right: 10px; /* Jarak antar tombol edit dan hapus */
        }

        .btn-delete {
            background-color: #f44336; /* Warna merah tetap sama */
        }

        /* Tambahkan style untuk form inline agar tombol tidak saling berhimpitan */
        .actions {
            display: flex;
            gap: 10px; /* Jarak antar tombol */
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
        <h2>Data Menu</h2>

        <!-- Tambahkan tombol untuk menambah menu baru -->
        <a href="{{ route('menu.create') }}" class="btn btn-add">Tambah Menu Baru</a>

        <table>
            <thead>
                <tr>
                    <th>Id Menu</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Aksi</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->menu_id }}</td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->kategori }}</td>
                    <td>{{ $menu->price }}</td>
                    <td><img src="{{asset($menu->foto) }}" alt="Foto Menu" width="50"></td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>{{ $menu->stok }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('menu.edit', $menu->menu_id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('menu.destroy', $menu->menu_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
