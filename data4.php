<?php
require('koneksi.php');

$sql = "SELECT f.kategori AS kategori, 
               COUNT(DISTINCT fp.customer_id) AS pelanggan
        FROM film f
        JOIN fakta_pendapatan fp ON f.film_id = fp.film_id
        GROUP BY f.kategori
        ORDER BY pelanggan DESC";

$result = mysqli_query($conn, $sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil, array(
        "kategori" => $row['kategori'],
        "pelanggan" => $row['pelanggan']
    ));
}

$data4 = json_encode($hasil);
?>