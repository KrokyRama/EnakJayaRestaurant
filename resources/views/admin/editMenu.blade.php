<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/LOGOS.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            margin: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background-color: #007BFF; /* Warna biru */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Menu</h2>
        <form action="{{ route('menu.update', $menu->menu_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>
            </div>

            <div>
                <label for="kategori">Kategori:</label>
                <select name="kategori" required>
                    <option value="makanan" {{ $menu->kategori == 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ $menu->kategori == 'minuman' ? 'selected' : '' }}>Minuman</option>
                    <option value="ekstra" {{ $menu->kategori == 'ekstra' ? 'selected' : '' }}>Ekstra</option>
                </select>
            </div>

            <div>
                <label for="price">Harga:</label>
                <input type="number" name="price" value="{{ $menu->price }}" required>
            </div>

            <div>
                <label for="stok">Stok:</label>
                <input type="number" name="stok" value="{{ $menu->stok }}" required>
            </div>

            <div>
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" required>{{ $menu->deskripsi }}</textarea>
            </div>

            <div>
                <label for="foto">Foto:</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">Perbarui Menu</button>
        </form>
    </div>
</body>
</html>
