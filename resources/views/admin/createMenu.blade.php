<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/LOGOS.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tambah Menu Baru</h2>
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" name="nama_menu" required>
            </div>

            <div>
                <label for="kategori">Kategori:</label>
                <select name="kategori" required>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <option value="ekstra">Ekstra</option>
                </select>
            </div>

            <div>
                <label for="price">Harga:</label>
                <input type="number" name="price" required>
            </div>

            <div>
                <label for="stok">Stok:</label>
                <input type="number" name="stok" required>
            </div>

            <div>
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" required></textarea>
            </div>

            <div>
                <label for="foto">Foto:</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">Tambah Menu</button>
        </form>
    </div>
</body>
</html>
