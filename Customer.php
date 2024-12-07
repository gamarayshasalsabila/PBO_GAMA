<?php
// Memeriksa apakah form sudah disubmit dan menangani data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Membaca data customer yang sudah ada
    $customers = [];
    if (file_exists('customers.json')) {
        $customers = json_decode(file_get_contents('customers.json'), true);
    }

    // Menambahkan customer baru
    $newCustomer = [
        'nama'    => $nama,
        'email'   => $email,
        'telepon' => $telepon,
    ];
    $customers[] = $newCustomer;

    // Menyimpan data customer ke file
    file_put_contents('customers.json', json_encode($customers, JSON_PRETTY_PRINT));

    // Redirect ke halaman yang sama setelah menambah data
    header('Location: customer.php');
    exit;
}

// Membaca data customer dari file
$customers = [];
if (file_exists('customers.json')) {
    $customers = json_decode(file_get_contents('customers.json'), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Navbar */
        nav {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }

        /* Header */
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            margin-bottom: 20px;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form div {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer */
        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="index.php">Stok</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <div class="header">
        <h1>Data Customer</h1>
        <p>Kelola informasi pelanggan dengan mudah.</p>
    </div>

    <!-- Container -->
    <div class="container">
        <h2>Daftar Customer</h2>

        <!-- Form untuk Menambah Customer -->
        <form method="POST" action="">
            <div>
                <label for="nama">Nama Customer:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="email">Email Customer:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="telepon">Nomor Telepon:</label>
                <input type="text" id="telepon" name="telepon" required>
            </div>
            <button type="submit" name="tambah">Tambah Customer</button>
        </form>

        <!-- Tabel Data Customer -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $index => $customer): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($customer['nama']) ?></td>
                        <td><?= htmlspecialchars($customer['email']) ?></td>
                        <td><?= htmlspecialchars($customer['telepon']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2024 Toko Jualan. Semua Hak Dilindungi.
    </div>

</body>
</html>
