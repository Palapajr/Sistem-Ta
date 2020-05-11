<?php
include "../conn.php";
    session_start();
        if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}
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
								<a href="peserta.php" class="waves-effect"><i class="ti-menu-alt"></i><span>Data Peserta</span></span></a>
								
							</li>
							<li class="has_sub">
								<a href="ttg_sistem.php" class="waves-effect active"><i class="ti-pencil-alt"></i><span> Tentang Sistem </span> </a>
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
								<h4 class="page-title">Tentang System</h4>
								<ol class="breadcrumb">
									<li>
										<a href="index.php">Beranda</a>
									</li>
									<li class="active">
										Tentang System
									</li>
								</ol>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="card-box">
								<p align="center">Sistem Klasifikasi Program Keluarga Harapan adalah sistem yang dirancang untuk membantu pegawai
								dalam proses penentuan komponen pada calon penerima bantuan PKH. sistem ini dirancang untuk memberikan gambaran kepada pegawai,
								Komponen yang tepat untuk dimiliki oleh peserta Calon PKH</p>
								<p align="center">Sistem ini dibuat, sudah diberikan algoritma perhitungan menggunakan teknik <strong>Data Mining</strong>
							. dimana algoritma yang dipakai pada sistem ini adalah Probabilistic Neural Network (PNN).</p>
								<p align="center">PNN merupakan salah satu metode klasifikasi Jaringan Syaraf Tiruan (JST) yang 
								dipilih karena mampu mengoperasikan serta kehandalannya dalam mengklasifikasi dan 
								mengenali pola secara cepat (Kurniawardhani 2014).</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-box">
								<h3 align="center">Alur Proses Klasifikasi menggunakan Algoritma PNN</h3>
								<hr>
								<div align="center"><img src="../assets/images/alur.jpg"></div>
								
								</div>
							</div>
							<div class="col-md-6">
							<div class="card-box">
							<h3 align="center">Sistem Klasifikasi PKH</h3>
								<hr>
									<div class="row" align="center">									
										<img src="../assets/images/algo1.jpg" alt="image" class="img-responsive img-thumbnail" width="500"/>	
									</div>
								</div>
								</div>
							</div>
						
						</div> <!-- container -->
						<!-- awal konten-->
						</div> <!-- content -->
						<?php include "footer.php"; ?>
					</div>
					<!-- ============================================================== -->
					<!-- End Right content here -->
					<!-- ============================================================== -->
					<!-- Right Sidebar -->
					
					<!-- /Right-bar -->
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
				
			</body>
		</html>