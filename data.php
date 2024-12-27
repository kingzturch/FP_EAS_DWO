<?php
require 'koneksi.php';

$sql = "SELECT s.TerritoryName AS nama_toko,
               SUM(fp.SalesAmount) AS total_pendapatan
        FROM dimsalesterritory s
        JOIN factsales fp ON s.TerritoryID = fp.TerritoryID
        GROUP BY s.TerritoryName
        ORDER BY total_pendapatan DESC";

$result = mysqli_query($conn, $sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil, array(
        "name" => $row['nama_toko'],
        "total" => $row['total_pendapatan'],
    ));
}

$data = json_encode($hasil);