<?php
require_once 'BarangManager.php'; // Memanggil class BarangManager

$barangManager = new BarangManager();
$barangList = $barangManager->getBarang(); // Mendapatkan semua barang dari data JSON
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css"> <!-- Menautkan file CSS -->
</head>
<body>

        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="index.php">Stok</a></li>
            </ul>
        </nav>

    <!-- Konten Utama -->
    <div class="container">
        <h1>Daftar Barang</h1>

        <!-- Grid untuk menampilkan produk -->
        <div class="product-grid">
            <?php foreach ($barangList as $barang): ?>
                <div class="product-card">
                    <!-- Menampilkan gambar produk (gunakan gambar placeholder jika tidak ada gambar sebenarnya) -->
                    <img src="https://tse4.mm.bing.net/th?id=OIP.nil4YGDP-kvnTHQD-GvGPQHaE-&pid=Api&P=0&h=180<?= htmlspecialchars($barang['nama']) ?>" alt="<?= htmlspecialchars($barang['nama']) ?>">
                    <div class="product-info">
                        <h3><?= htmlspecialchars($barang['nama']) ?></h3>
                        <p><?= htmlspecialchars($barang['harga']) ?></p>
                        <p>Stok: <?= htmlspecialchars($barang['stok']) ?></p>
                        <button>Beli Sekarang</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        
    </div>
   

</body>
</html>