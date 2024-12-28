<?php
require('koneksi.php');

$sql = "SELECT e.EmployeeName AS nama_karyawan,
SUM(fp.SalesAmount) AS total,
(SUM(fp.SalesAmount) / (SELECT SUM(SalesAmount) FROM factsales)) * 100 AS persentase
FROM dimemployee e
JOIN factsales fp ON e.EmployeeID = fp.EmployeeID
GROUP BY e.EmployeeName";
$result = mysqli_query($conn, $sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
array_push($hasil, array(
"name" => $row['nama_karyawan'],
"total" => $row['total'],
"y" => $row['persentase']
));
}

$data8 = json_encode($hasil);