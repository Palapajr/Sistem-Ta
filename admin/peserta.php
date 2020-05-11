<?php
include "../conn.php";
    session_start();
        if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}

$training = mysqli_fetch_assoc(mysqli_query($db_link, "SELECT count(*) as total, sum(sd) as sd, sum(smp) as smp, sum(sma) as sma, sum(bumil) as bumil, sum(balita) as balita FROM `training`"));
$testing = mysqli_fetch_assoc(mysqli_query($db_link, "SELECT count(*) as total, sum(sd) as sd, sum(smp) as smp, sum(sma) as sma, sum(bumil) as bumil, sum(balita) as balita FROM `testing`"));
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="../assets/images/pkh.ico">

		<?php include "tittle.php"; ?>

		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../assets/js/modernizr.min.js"></script>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                

                <!-- Button mobile view to collapse sidebar menu -->
                <?php include "atas.php";  ?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
              <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                  <ul>
                    <li class="text-muted menu-title">Menu</li>
                    <li class="has_sub">
                      <a href="index.php" class="waves-effect"><i class="ti-home"></i> <span> Beranda </span> </a>
                    </li>
                    <li class="has_sub">
                      <a href="peserta.php" class="waves-effect active"><i class="ti-menu-alt"></i><span>Data Peserta</span></span></a>
                    </li>
                    <li class="has_sub">
                      <a href="ttg_sistem.php" class="waves-effect"><i class="ti-pencil-alt"></i><span> Tentang Sistem </span> </a>
                    </li>
                    <li class="has_sub">
                      <a href="klasifikasi.php" class="waves-effect"><i class="icon-share"></i><span> Klasifikasi </span> </a>
                    </li>
                    <li class="has_sub">
                      <a href="riwayat_klasifikasi.php" class="waves-effect"><i class="fa fa-history"></i><span> Lihat Hasil Klasifikasi </span> </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
			<!-- Left Sidebar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->

      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
            <!-- Page-Title -->
            <div class="row">
              <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                  
                  <ul class="dropdown-menu drop-menu-right" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <h4 class="page-title">Data Peserta</h4>
                <ol class="breadcrumb">
                  <li>
                    <a href="index.php">Beranda</a>
                  </li>
                  <li class="active">
                    Data Peserta
                  </li>
                </ol>
              </div>
            </div>
            
          </div> <!-- container -->
              <div class="row"> 
                <div class="col-md-6 col-sm-6 col-lg-3">
                  <div class="widget-panel widget-style-2 bg-white">
                    <i class="md md-account-child text-custom"></i>
                    <h4 class="text-dark"> <a href="data_training.php"><strong>Training</a></strong></h4>
                    <h2 class="text-primary text-left"><span data-plugin="counterup"><?php echo $training['total'];?></span></h2>
                    <p class="text-muted">Total Data</p>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3">
                   <div class="widget-panel widget-style-2 bg-white">
                    <i class="md md-account-child text-custom"></i>
                     <h4 class="text-dark"> <a href="data_testing.php"><strong>Testing</a></strong></h4>
                    <h2 class="text-pink text-left"><span data-plugin="counterup"><?php echo $testing['total'];?></span></h2>
                    <p class="text-muted">Total Data</p>
                  </div>
                </div>
              </div>
                        
              <div class="row">
                <div class="col-lg-12">
                  <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Grafik Perbandingan data Training dan Tesing</h4>
                    
                    
                    <div id="chart"></div>

                    
                  </div>   
                </div>                        
              </div>
                        <!-- end row -->
        </div> <!-- content -->
          <?php include "footer.php"; ?>
      </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        <script src="../assets/chart/highcharts.js"></script>
        <script src="../assets/chart/modules/data.js"></script>
        <script src="../assets/chart/modules/drilldown.js"></script>
        <script type="text/javascript">
            $(function () {
                // Create the chart
                Highcharts.chart('chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Jumlah Data Latih dan Data Uji'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah Data'
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
                                format: '{point.y}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} data</b> dari keseluruhan<br/>'
                    },

                    series: [{
                        name: 'Jumlah Data',
                        colorByPoint: true,
                        data: [{
                            name: 'Data Training',
                            y:  <?php echo $training['total']; ?>,
                            drilldown: 'Training'
                        }, {
                            name: 'Data Testing',
                            y: <?php echo $testing['total']; ?>,
                            drilldown: 'Testing'
                        }]
                    }],
                    drilldown: {
                        allowPointDrilldown: true,
                        series: [{
                            name: 'Data Testing Jumlah PKH',
                            id: 'Testing',
                            data: [
                                <?php foreach(["sd"=>"SD","smp"=>"SMP","sma"=>"SMA","bumil"=>"Ibu Hamil","balita"=>"Balita"] as $key=>$item){ ?>
                                    {
                                        name: '<?= $item ?>',
                                        y: <?= $testing[$key] ?>
                                    },
                                <?php } ?>
                            ]
                        }, {
                            name: 'Data Training Jumlah PKH',
                            id: 'Training',
                            data: [
                                <?php foreach(["sd"=>"SD","smp"=>"SMP","sma"=>"SMA","bumil"=>"Ibu Hamil","balita"=>"Balita"] as $key=>$item){ ?>
                                    {
                                        name: '<?= $item ?>',
                                        y: <?= $training[$key] ?>
                                    },
                                <?php } ?>
                            ]
                        }
                        ]
                    }
                });
            });
            </script>
	</body>
</html>