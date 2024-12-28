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
//data barchart
include 'data9.php';
include 'data10.php';

$data = json_decode($data9, TRUE);
$data2 = json_decode($data10, TRUE);
?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php";?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div id="barchart" class="grafik"></div>
                <p class="highcharts-description">
                    Berikut merupakan grafik untuk menampilkan Produk dari dari Setiap Kategori.
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

    <script type="text/javascript">
    // Data utama (kategori)
    var dataKategori = <?php echo $data9; ?>;

    // Data drilldown (produk)
    var dataDrilldown = <?php echo $data10; ?>;

    // Mengelompokkan data drilldown berdasarkan kategori
    var groupedDrilldown = {};
    dataDrilldown.forEach(function(item) {
        if (!groupedDrilldown[item.kategori]) {
            groupedDrilldown[item.kategori] = [];
        }
        groupedDrilldown[item.kategori].push([item.produk, parseFloat(item.pendapatan)]);
    });

    // Siapkan data drilldown untuk Highcharts
    var drilldownSeries = [];
    for (var kategori in groupedDrilldown) {
        drilldownSeries.push({
            name: kategori,
            id: kategori,
            data: groupedDrilldown[kategori]
        });
    }

    // Highcharts Bar Chart
    Highcharts.chart('barchart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Pendapatan Setiap Kategori Produk'
        },
        subtitle: {
            text: 'Klik untuk melihat detail produk'
        },
        xAxis: {
            type: 'category',
            title: {
                text: 'Kategori Produk'
            }
        },
        yAxis: {
            title: {
                text: 'Pendapatan (USD)'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.2f}$'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$</b><br/>'
        },
        series: [{
            name: "Kategori",
            colorByPoint: true,
            data: dataKategori.map(function(item) {
                return {
                    name: item.name,
                    y: parseFloat(item.total),
                    drilldown: item.name
                };
            })
        }],
        drilldown: {
            series: drilldownSeries
        }
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