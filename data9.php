<?php
require 'koneksi.php';

$sql = "SELECT p.ProductCategory AS kategori,
               SUM(fp.SalesAmount) AS total_pendapatan
        FROM dimproduct p
        JOIN factsales fp ON p.ProductID = fp.ProductID
        GROUP BY p.ProductCategory
        ORDER BY total_pendapatan DESC";

$result = mysqli_query($conn, $sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil, array(
        "name" => $row['kategori'],
        "total" => $row['total_pendapatan'],
    ));
}

$data9 = json_encode($hasil);