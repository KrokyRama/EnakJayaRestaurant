<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Admin - Enak Jaya Restaurant</title>
    <style>
        :root {
            --primary-color: #f4a261;
            --secondary-color: #e76f51;
            --background-color: #ffffff;
            --text-color: #333;
            --header-bg: #2f3e46;
            --header-text: #ffffff;
            --border-color: #ddd;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            background-color: var(--header-bg);
            color: var(--header-text);
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .header p {
            margin: 10px 0 0;
            font-size: 1.2em;
            color: var(--primary-color);
        }

        .section {
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .section-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-header h2 {
            margin: 0;
            font-size: 1.2em;
        }

        .section-content {
            padding: 20px;
            display: none;
        }

        .dropdown-icon {
            transition: transform 0.3s ease;
        }

        .section.active .dropdown-icon {
            transform: rotate(180deg);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--secondary-color);
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-buttons button {
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .edit-btn {
            background-color: #008CBA;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .add-button {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            opacity: 0.8;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            table, th, td {
                font-size: 14px;
            }

            .action-buttons button {
                padding: 3px 6px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin</h1>
        <p>Enak Jaya Restaurant</p>
        <div class="header-icons">
            <a class="shopping-cart" href="{{ url('/cart') }}"><i class="fas fa-shopping-cart"></i></a>
            @if (Auth::check())
                <!-- Tombol Logout -->
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Tombol Login -->
                <a href="{{ url('/login') }}">
                    <i class="fas fa-user"></i>
                </a>
            @endif
        </div>
    </div>


    <div class="container">
        <!-- Meja Section -->
        <div class="section" id="mejaSection">
            <div class="section-header" onclick="toggleSection('mejaSection')">
                <h2>Manajemen Meja</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <button class="add-button" onclick="addMeja()">Tambah Meja Baru</button>
                <table>
                    <thead>
                        <tr>
                            <th>No. Meja</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="mejaTableBody">
                        <!-- Data meja akan dimasukkan di sini -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Menu Section -->
        <div class="section" id="menuSection">
            <div class="section-header" onclick="toggleSection('menuSection')">
                <h2>Manajemen Menu</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <button class="add-button" onclick="addMenu()">Tambah Menu Baru</button>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="menuTableBody">
                        <!-- Data menu akan dimasukkan di sini -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Order Section -->
        <div class="section" id="orderSection">
            <div class="section-header" onclick="toggleSection('orderSection')">
                <h2>Manajemen Pesanan</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <table>
                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Meja</th>
                            <th>Jenis Pesanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="orderTableBody">
                        <!-- Data pesanan akan dimasukkan di sini -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Customers Section -->
        <div class="section" id="customerSection">
            <div class="section-header" onclick="toggleSection('customerSection')">
                <h2>Data Pelanggan</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Gender</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="customerTableBody">
                        <!-- Data pelanggan akan dimasukkan di sini -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Contacts Section -->
        <div class="section" id="contactSection">
        <div class="section-header" onclick="toggleSection('contactSection')">
        <h2>Data Pesan, Saran, dan Keluhan</h2>
        <span class="dropdown-icon">▼</span>
        </div>
        <div class="section-content">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Subject</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="contactTableBody">
                <!-- Data kontak akan dimasukkan di sini -->
            </tbody>
        </table>
    </div>
</div>

    </div>



    <script>
        // Fungsi untuk toggle section
        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.classList.toggle('active');
            const content = section.querySelector('.section-content');
            if (section.classList.contains('active')) {
                content.style.display = 'block';
                loadData(sectionId);
            } else {
                content.style.display = 'none';
            }
        }

        // Fungsi-fungsi untuk menambah data baru
        function addMeja() {
            console.log('Implementasi untuk menambah meja baru');
        }

        function addMenu() {
            console.log('Implementasi untuk menambah menu baru');
        }

        function addStaff() {
            console.log('Implementasi untuk menambah staff baru');
        }

        // Fungsi untuk memuat data
        function loadData(sectionId) {
            // Contoh data dummy, ganti dengan pemanggilan API sesuai dengan backend Anda
            const mejaData = [
                { meja_id: 1, kapasitas: 4, status_meja: 'Tersedia' },
                { meja_id: 2, kapasitas: 2, status_meja: 'Terisi' }
            ];

            const menuData = [
                { menu_id: 1, nama_menu: 'Nasi Goreng', price: 25000, kategori: 'Makanan Utama', foto: 'nasi-goreng.jpg' },
                { menu_id: 2, nama_menu: 'Es Teh', price: 5000, kategori: 'Minuman', foto: 'es-teh.jpg' }
            ];

            const staffData = [
                { staff_id: 1, nama: 'John Doe', jabatan: 'Pelayan', nomor_telepon: '08123456789' },
                { staff_id: 2, nama: 'Jane Smith', jabatan: 'Koki', nomor_telepon: '08987654321' }
            ];

            const orderData = [
                { order_id: 1, customer_id: 1, meja_id: 1, jenis_pesanan: 'Dine-in', status_pesanan: 'Proses' },
                { order_id: 2, customer_id: 2, meja_id: null, jenis_pesanan: 'Take-away', status_pesanan: 'Selesai' }
            ];

            const customerData = [
                { customer_id: 1, nama: 'Alice', nomor_telepon: '081122334455', gender: 'F' },
                { customer_id: 2, nama: 'Bob', nomor_telepon: '089988776655', gender: 'M' }
            ];

            // Fungsi untuk mengisi tabel
            function fillTable(tableId, data, columns) {
                const tableBody = document.getElementById(tableId);
                tableBody.innerHTML = '';
                data.forEach(item => {
                    const row = document.createElement('tr');
                    columns.forEach(column => {
                        const cell = document.createElement('td');
                        cell.textContent = item[column];
                        row.appendChild(cell);
                    });
                    const actionCell = document.createElement('td');
                    actionCell.innerHTML = `
                        <div class="action-buttons">
                            <button class="edit-btn" onclick="editItem(${item.id})">Edit</button>
                            <button class="delete-btn" onclick="deleteItem(${item.id})">Delete</button>
                        </div>
                    `;
                    row.appendChild(actionCell);
                    tableBody.appendChild(row);
                });
            }

            // Mengisi tabel dengan data berdasarkan section yang aktif
            switch(sectionId) {
                case 'mejaSection':
                    fillTable('mejaTableBody', mejaData, ['meja_id', 'kapasitas', 'status_meja']);
                    break;
                case 'menuSection':
                    fillTable('menuTableBody', menuData, ['nama_menu', 'price', 'kategori', 'foto']);
                    break;
                case 'staffSection':
                    fillTable('staffTableBody', staffData, ['nama', 'jabatan', 'nomor_telepon']);
                    break;
                case 'orderSection':
                    fillTable('orderTableBody', orderData, ['order_id', 'customer_id', 'meja_id', 'jenis_pesanan', 'status_pesanan']);
                    break;
                case 'customerSection':
                    fillTable('customerTableBody', customerData, ['nama', 'nomor_telepon', 'gender']);
                    break;
            }
        }

        // Fungsi untuk memuat data
        function loadData(sectionId) {
        if (sectionId === 'contactSection') {
        fetch('/admin/contacts')
            .then(response => response.json())
            .then(data => {
                fillTable('contactTableBody', data, ['name', 'email', 'phone', 'subject', 'message']);
            });
    }

    function deleteItem(id) {
    fetch(`/admin/contacts/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Pesan berhasil dihapus');
            loadData('contactSection'); // Reload data kontak setelah delete
        }
    });
    }


        // Fungsi untuk mengisi tabel
        function fillTable(tableId, data, columns) {
        const tableBody = document.getElementById(tableId);
        tableBody.innerHTML = '';
        data.forEach(item => {
            const row = document.createElement('tr');
            columns.forEach(column => {
                const cell = document.createElement('td');
                cell.textContent = item[column];
                row.appendChild(cell);
            });
            const actionCell = document.createElement('td');
            actionCell.innerHTML = `
                <div class="action-buttons">
                    <button class="edit-btn" onclick="editItem(${item.id})">Edit</button>
                    <button class="delete-btn" onclick="deleteItem(${item.id})">Delete</button>
                </div>
            `;
            row.appendChild(actionCell);
            tableBody.appendChild(row);
        });
    }

        // Menambahkan data ke table sesuai dengan section yang aktif
        switch(sectionId) {
        case 'contactSection':
            fillTable('contactTableBody', contactData, ['name', 'email', 'phone', 'subject', 'message']);
            break;
        // Sections lainnya seperti meja, menu, order, customer tetap sama
    }
}

    // Fungsi dummy untuk edit dan delete kontak
    function editItem(id) {
    console.log(`Edit item dengan id ${id}`);
}

    function deleteItem(id) {
    console.log(`Delete item dengan id ${id}`);
}


        // Fungsi dummy untuk edit dan delete
        function editItem(id) {
            console.log(`Edit item dengan id ${id}`);
        }

        function deleteItem(id) {
            console.log(`Delete item dengan id ${id}`);
        }
    </script>
</body>
</html>
