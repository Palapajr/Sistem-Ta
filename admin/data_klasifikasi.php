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

		<!-- sweet alert -->
		<link rel="stylesheet" type="text/css" href="../assets/plugins/sweetalert/css/sweetalert.css">
		
		<link href="../assets/plugins/custombox/css/custombox.css" rel="stylesheet">

		<!-- Dropzone css -->
		<link href="../assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
		

		<!-- DataTables -->
		<link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
                                <a href="klasifikasi.php" class="waves-effect active"><i class="icon-share"></i><span> Klasifikasi </span> </a>   
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
								<h4 class="page-title">Peserta</h4>
								<ol class="breadcrumb">
									<li><a href="index.php">Home</a></li>
									<li><a href="peserta.php">Peserta</a></li>
									<li class="active">Data Testing</li>
								</ol>
							</div>
						</div>
						
						<div class="row">
																											
										</div>
										
									</div>
									<!-- Tabel -->
                                    <div class="col-md-12">
							<div class="card-box">
								<h3>Simulasi dari Excel</h3>
								<form role="form" method="post" action="proses2.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="file">Import File Exel</label>										
										<input class="form-control" type="file" name="file" id="fileup">
									</div>

									<button type="button" class="btn btn-default waves-effect waves-light" name="import" id="import_btn">Prediksi</button>
									<a href="klasifikasi.php" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</a>
									<span class="pesan"></span>
								</form>

								<div id="hasil-spk" class="hidden">
									<table class="table table-bordered" id="hasil-upload">
										<thead>
										<tr>													
											<th>Id Peserta</th>
											<th>Nama Pengurus</th>
											<th>SD</th>
											<th>SMP</th>
											<th>SMA</th>
											<th>Bumil</th>
											<th>Balita</th>
											<th>Tahun</th>
											<th>Prediksi Komponen</th>
										</tr>
										</thead>
										<tbody>

										</tbody>
                                    </table>
                                    <a href="simpan_klasifikasi.php" class="btn btn-primary">Simpan ke Database</a>
								</div>
							</div>
						</div>
									<!-- end tabel-->
									
								</div>	
							</div> <!-- end col -->		
						</div>		
					</div> <!-- container -->					
				</div> <!-- content -->
							<?php include "footer.php"; ?>
						</div>
						
						<!-- Modal cread-->
						

						<!-- Modal Import-->
						
						<!-- ============================================================== -->
						<!-- End Right content here -->
						<!-- ============================================================== -->
						<!-- Right Sidebar -->
						
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
		
		<!-- Modal-Effect -->
		<script src="../assets/plugins/custombox/js/custombox.min.js"></script>
		<script src="../assets/plugins/custombox/js/legacy.min.js"></script>

		   <!-- Page Specific JS Libraries -->
		<script src="../assets/plugins/dropzone/dropzone.js"></script>

		<!-- SweetAlert Plugin JS -->
        <script type="text/javascript" src="../assets/plugins/sweetalert/js/sweetalert.min.js"></script>


		<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
		<script src="../assets/pages/datatables.init.js"></script>
		<script>
			function hapus() {
				var conf = confirm('Apakah anda yakin ingin menghapus semua data?');
				if(conf) {
					document.proses.action = 'del_all_testing.php';
					document.proses.submit();
				}
			}
			
		</script>	
		<script type="text/javascript">
		$(document).ready(function () {
			$("#import_btn").on('click', function() {
                $("span.pesan").html("<strong>Sedang memposes klasifikasi data. Mohon tunggu...");
                var file = document.getElementById("fileup");
                var formData = new FormData();
                formData.append("fileupload", file.files[0]);
                if(!$("#hasil-spk").hasClass("hidden")) $("#hasil-spk").toggleClass("hidden");
                $("#hasil-upload>tbody").html("");
                $.ajax({
                    url: 'proses_spk.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        Object.values(data).forEach(function(val){
                            dataHtml = "<tr>"
                                        + "<td>"+val.id_pkh+"</td>"
                                        + "<td>"+val.nama+"</td>"
                                        + "<td>"+val.sd+"</td>"
                                        + "<td>"+val.smp+"</td>"
                                        + "<td>"+val.sma+"</td>"
                                        + "<td>"+val.bumil+"</td>"
                                        + "<td>"+val.balita+"</td>"
                                        + "<td>"+val.tahun+"</td>"
                                        + "<td>"+val.kelas+"</td>"
                                        + "</tr>";
                            $("#hasil-upload>tbody").append(dataHtml);
                        });
                        $("#hasil-spk").toggleClass("hidden");
                        $("span.pesan").html("")
                    }
                });
            });
		$('#datatable').dataTable();
		$('#datatable-keytable').DataTable({keys: true});
		$('#datatable-responsive').DataTable();
		$('#datatable-colvid').DataTable({
		"dom": 'C<"clear">lfrtip',
		"colVis": {
		"buttonText": "Change columns"
		}
		});
		$('#datatable-scroller').DataTable({
		ajax: "assets/plugins/datatables/json/scroller-demo.json",
		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true
		});
		var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
		var table = $('#datatable-fixed-col').DataTable({
		scrollY: "300px",
		scrollX: true,
		scrollCollapse: true,
		paging: false,
		fixedColumns: {
		leftColumns: 1,
		rightColumns: 1
		}
		});
		});
		TableManageButtons.init();
		</script>
	</body>
</html>