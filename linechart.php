<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Adventure Work</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="css/styleGraph.css">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body id="page-top">

    <?php 
include 'data3.php';
$data3 = json_decode($data3, TRUE);

usort($data3, function ($a, $b) {
    return $b['jumlah'] <=> $a['jumlah']; 
});

$data3 = array_slice($data3, 0, 10);
?>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div id="linechart" class="grafik"></div>
                <p class="highcharts-description">
                    Berikut merupakan grafik untuk menampilkan produk terlaris pada Adventure Work.
                </p>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dashboard DWO</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Script untuk membuat line chart -->
    <script type="text/javascript">
    // Membuat line chart
    Highcharts.chart('linechart', {
        chart: {
            type: 'line' // Jenis grafik line
        },
        title: {
            text: 'Barang Terlaris' // Judul grafik
        },
        subtitle: {
            text: 'Source: Database advuas' // Sumber data
        },
        xAxis: {
            categories: <?php echo json_encode(array_column($data3, 'barang')); ?>, // Nama produk untuk kategori sumbu X
            title: {
                text: 'Nama Barang' // Nama sumbu X
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah Terjual' // Nama sumbu Y
            }
        },
        tooltip: {
            valueSuffix: ' unit' // Satuan yang ditampilkan di tooltip
        },
        series: [{
            name: 'Jumlah Terjual',
            data: <?php echo json_encode(array_column($data3, 'jumlah')); ?> // Data jumlah penjualan
        }]
    });
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/js/sb-admin-2.min.js"></script>

</body>

</html>