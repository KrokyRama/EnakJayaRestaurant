<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meja</title>
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

        input[type="number"],
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
        <h2>Edit Meja</h2>
        <form action="{{ route('meja.update', $table->meja_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="kapasitas">Kapasitas:</label>
                <input type="number" name="kapasitas" value="{{ $table->kapasitas }}" required>
            </div>

            <div>
                <label for="status_meja">Status:</label>
                <select name="status_meja" required>
                    <option value="1" {{ $table->status_meja ? 'selected' : '' }}>Terisi</option>
                    <option value="0" {{ !$table->status_meja ? 'selected' : '' }}>Tersedia</option>
                </select>
            </div>

            <button type="submit">Perbarui Meja</button>
        </form>
    </div>
</body>
</html>
