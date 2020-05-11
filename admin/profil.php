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
                                <a href="index.php" class="waves-effect"><i class="ti-home"></i> <span> Beranda </span> </a>
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
                                                         

                                <h4 class="page-title">Profile</h4>
                                <ol class="breadcrumb">
                                <li><a href="index.php">Beranda</a></li>
                                <li class="active">Profile</a></li>

                            </ol>
                            </div>
                        </div>

					<!-- Awal isi conten -->
					<div class="row">
						<div class="col-lg-7">							
							<div class="profile-detail card-box">								
								<h3>Ganti Password</h3>
								<hr>
								<div class="card-box">
  
                                    <form class="form-horizontal m-t-20" action="change_pass.php" method="POST">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" required class="form-control" value="<?php echo $_SESSION['uname']; ?>" readonly name="uname">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Lama</label>
                                            <input type="password" parsley-trigger="change" required placeholder="Password Lama" class="form-control" name="passwordlama">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru *</label>
                                            <input type="password" placeholder="Password Baru" required class="form-control" name="passwordbaru">
                                        </div>
                                        <div class="form-group">
                                            <label>Ulangi Password Baru *</label>
                                            <input type="password" required placeholder="Ulangi Password Baru" class="form-control" name="konfirmasipassword">
                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-default waves-effect waves-light" type="submit"  name="Submit">
                                                Ganti
                                            </button>
                                            <a href="index.php" class="btn btn-danger waves-effect waves-light m-l-5">
                                                Kembali
                                            </a>
                                        </div>
                                    </form>
                                </div>
							</div>
							
						</div>
						<div class="col-md-5">
							<div class="card-box">
								<img src="../assets/images/algo1.jpg" class="img-responsive img-thumbnail" width="500"/>
							
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