<?php
require('koneksi.php');

// Periksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query untuk mengambil data kategori produk terlaris
$sql1 = "SELECT dp.productname AS barang, 
                COUNT(fp.productID) AS jumlah
         FROM factsales fp
         JOIN dimproduct dp ON fp.productID = dp.productID
         GROUP BY dp.productname
         ORDER BY jumlah DESC";

$result1 = mysqli_query($conn, $sql1);

// Periksa hasil query
if (!$result1) {
    die("Query failed: " . mysqli_error($conn));
}

// Array untuk menampung data
$barangTerlaris = array();

if (mysqli_num_rows($result1) > 0) {
    // Mengambil data dari hasil query
    while ($row = mysqli_fetch_array($result1)) {
        $barangTerlaris[] = array(
            "barang" => $row['barang'],
            "jumlah" => (int)$row['jumlah'] // Cast ke integer untuk Highcharts
        );
    }
} else {
    echo "No data found.";
}

// Mengencode hasil ke format JSON
$data3 = json_encode($barangTerlaris);
?>
