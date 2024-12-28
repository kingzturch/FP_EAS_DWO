<?php
require 'koneksi.php';

$sql = "SELECT p.ProductCategory AS kategori,
               p.ProductName AS produk,
               SUM(fp.SalesAmount) AS pendapatan
        FROM dimproduct p
        JOIN factsales fp ON p.ProductID = fp.ProductID
        GROUP BY kategori, produk
        ORDER BY kategori, pendapatan DESC";

$result = mysqli_query($conn, $sql);

$pendapatan = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($pendapatan, array(
        "kategori" => $row['kategori'],
        "produk" => $row['produk'],
        "pendapatan" => $row['pendapatan'],
    ));
}

$data10 = json_encode($pendapatan);