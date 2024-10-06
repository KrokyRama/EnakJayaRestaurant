<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="assets/css/styleadmin.css">
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
        <h2>Edit Transaksi</h2>
        <form action="{{ route('transaksi.update', $order->order_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select name="metode_pembayaran" required>
                    <option value="cash" {{ $order->payment->metode_pembayaran == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="qris" {{ $order->payment->metode_pembayaran == 'qris' ? 'selected' : '' }}>QRIS</option>
                </select>
            </div>

            <div>
                <label for="status_pembayaran">Status Pembayaran:</label>
                <select name="status_pembayaran" required>
                    <option value="1" {{ $order->payment->status_pembayaran == 1 ? 'selected' : '' }}>Lunas</option>
                    <option value="0" {{ $order->payment->status_pembayaran == 0 ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>

            <div>
                <label for="status_pesanan">Status Pesanan:</label>
                <select name="status_pesanan" required>
                    <option value="1" {{ $order->status_pesanan == 1 ? 'selected' : '' }}>Selesai</option>
                    <option value="0" {{ $order->status_pesanan == 0 ? 'selected' : '' }}>Belum Selesai</option>
                </select>
            </div>

            <button type="submit">Perbarui Transaksi</button>
        </form>
    </div>
</body>
</html>
