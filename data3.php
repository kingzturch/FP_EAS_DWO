<?php
require('koneksi.php');

// Query untuk mengambil data kategori produk terlaris per bulan
$sql1 = "SELECT dp.ProductCategory AS kategori,
           dt.Bulan AS bulan,
           SUM(fs.QuantitySold) AS jumlah
    FROM factsales fs
    JOIN dimtime dt ON fs.TimeID = dt.TimeID
    JOIN dimproduct dp ON fs.ProductID = dp.ProductID
    GROUP BY dp.ProductCategory, dt.Bulan
    ORDER BY dp.ProductCategory, dt.Bulan;
";

$result1 = mysqli_query($conn, $sql1);

$pendapatan = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($pendapatan, array(
        "jumlah" => $row['jumlah'],
        "bulan" => $row['bulan'],
        "kategori" => $row['kategori']
    ));
}

$data3 = json_encode($pendapatan);
?>