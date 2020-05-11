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

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>
        
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
               

				<!-- nav atas-->
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
                                <a href="index.php" class="waves-effect active"><i class="ti-home"></i> <span> Beranda </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="peserta.php" class="waves-effect"><i class="ti-menu-alt"></i><span>Data Peserta </span></span></a>
                                
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
                                

                                <h4 class="page-title">Beranda</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Di Beranda</p>
                            </div>
                        </div>

					<!-- Awal isi conten -->
						<div class="row">
							<div class="col-sm-12">
								
								
                                <br>
                                <div class="row">
									<div class="col-md-12">
										<div class="card-box" align="center">
											
											<H2>Assalamualaikum Warahmatullahi Wabarakatuh</H2>
                                            <hr>
                                            <h4>Selamat Datang di sistem Klasifikasi Program Keluarga Harapan, Ini adalah
                                            sistem yang dirancang untuk sebagai pendukung tim verifikasi peserta PKH dalam pengkelasan/
                                            menentukan komponen yang layak diterima untuk calon peserta PKH yang baru</h4>
                                            <h4>Semoga dengan adanya sistem ini dapat mempercepat kinerja serta waktu yang efisien
                                            untuk Tim verifikasi dalam menentukan komponen peserta PKH yang baru.</h4>
                                            <h4>adapun alur dari proses pengkasifikasian di sistem ini dapat dilihat pada menu <a href="ttg_sistem.php"> Tentang sistem</a></h4>
											
										</div>
									</div>
								</div>
								
								
								
							</div>
						</div>
					

					

                        
                        
					<!-- Akhir isi konten -->
                    </div> <!-- container -->
                               
                </div> <!-- content -->

				<!-- Footer-->
                <?php include "footer.php"; ?>

            </div>
        </div>

            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            

        
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

        <!-- Counterup  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="../assets/plugins/morris/morris.min.js"></script>
        <script src="../assets/plugins/raphael/raphael-min.js"></script>
		
		<script src="../assets/pages/jquery.dashboard_4.js"></script>

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
    
    </body>
</html>