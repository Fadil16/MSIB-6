<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: plum;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            background: teal;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input, select, button {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            background: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Belanja</h1>
        <form method="POST" action="">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>

            <label for="produk">Produk</label>
            <select id="produk" name="produk" required>
                <option value="Sepatu">Sepatu</option>
                <option value="Sendal">Sendal</option>
                <option value="Kaos Kaki">Kaos Kaki</option>
            </select>

            <label for="jumlah_beli">Jumlah Beli</label>
            <input type="number" id="jumlah_beli" name="jumlah_beli" required>

            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" id="harga_satuan" name="harga_satuan" required>

            <button type="submit">Total</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $produk = $_POST['produk'];
            $jumlah_beli = $_POST['jumlah_beli'];
            $harga_satuan = $_POST['harga_satuan'];

            // Hitung total belanja
            $total_belanja = $jumlah_beli * $harga_satuan;

            // Hitung diskon
            $diskon = 0;
            if ($total_belanja > 100000) {
                $diskon = $total_belanja * 0.20;
            }

            // Hitung PPN
            $ppn = ($total_belanja - $diskon) * 0.10;

            // Hitung harga bersih
            $harga_bersih = ($total_belanja - $diskon) + $ppn;
            ?>

            <div class="result">
                <h2>Rincian Belanja</h2>
                <p>Nama Pelanggan: <?php echo htmlspecialchars($nama_pelanggan); ?></p>
                <p>Produk: <?php echo htmlspecialchars($produk); ?></p>
                <p>Jumlah Beli: <?php echo htmlspecialchars($jumlah_beli); ?></p>
                <p>Harga Satuan: Rp <?php echo number_format($harga_satuan, 2, ',', '.'); ?></p>
                <p>Total Belanja: Rp <?php echo number_format($total_belanja, 2, ',', '.'); ?></p>
                <p>Diskon: Rp <?php echo number_format($diskon, 2, ',', '.'); ?></p>
                <p>PPN: Rp <?php echo number_format($ppn, 2, ',', '.'); ?></p>
                <p>Harga Bersih: Rp <?php echo number_format($harga_bersih, 2, ',', '.'); ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
