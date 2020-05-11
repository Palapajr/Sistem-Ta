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
									<li class="active">Klasifikasi</li>
								</ol>
							</div>
						</div>
						<div class="row">
						<div class="col-md-4">
							<div class="card-box">
								<form role="form" method="post" id="atribut" action="simpan_klasifikasi.php">
									<div class="form-group">
										<label for="id_pkh">Kode PKH</label>
										<input class="form-control" type="text" required="" id="id_pkh" name="id_pkh" placeholder="Contoh : Wn-xx">
									</div>
									<div class="form-group">
										<label for="name">Nama Pengurus</label>
										<input type="text" class="form-control" required="" id="name" name="nama" placeholder="Contoh : Budiman">
									</div>
									
									<div class="form-group">
										<label for="sd">Jumlah Anak SD</label>
										<input type="text" class="form-control" required="" id="sd" name="sd" placeholder="0">
									</div>
									
									<div class="form-group">
										<label for="smp">Jumlah Anak SMP</label>
										<input type="text" class="form-control" required="" id="smp" name="smp" placeholder="0">
									</div>
									
									<div class="form-group">
										<label for="sma">Jumlah Anak SMA</label>
										<input type="text" class="form-control" required="" id="sma" name="sma" placeholder="0">
									</div>
									<div class="form-group">
										<label for="bumil">Ibu Hamil</label>
										<input type="text" class="form-control" required="" id="bumil" name="bumil" placeholder="0">
									</div>
									<div class="form-group">
										<label for="balita">Jumlah Anak Balita</label>
										<input type="text" class="form-control" required="" id="balita" name="balita" placeholder="0">
									</div>
									<div class="form-group">
										<label for="kelas">Kelas</label>
										<input type="text" class="form-control" required="" id="kelas" name="kelas" readonly>
									</div>
									<div class="form-group">
										<label for="hasil">Hasil</label>
										<span id="hasil" class="form-control" style="height: 100px; overflow: scroll">
											-
										</span>
									</div>
									
									<button type="button" class="btn btn-default waves-effect waves-light" name="prediksi" id="prediksi">Prediksi</button>
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="save" id="simpan" disabled>Save data</button>
									<button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
								</form>
							</div>
						</div>

						
						</div>
						</div> <!-- container -->
						</div> <!-- content -->
						<?php include "footer.php"; ?>
					</div>
						
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
				
				<script type="text/javascript">
				$(document).ready(function () {
					$("#prediksi").on("click", function(){
						data = $("#atribut").serialize();
						$("#hasil").html("")
						$.post("proses_simulasi.php", data, function(hasil){
							$("#kelas").val(hasil.komp_prediksi);
							$("#simpan").removeAttr("disabled");
							
							$("#hasil").append("Probabilitas 'Pendidikan': <strong>"+(hasil.skor_Pendidikan*100)+"%</strong><br>")
							$("#hasil").append("Probabilitas 'Kesehatan': <strong>"+(hasil.skor_Kesehatan*100)+"%</strong>")
						})
					})
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
											 + "<td>"+val.kelas+"</td>"
											 + "</tr>";
									$("#hasil-upload>tbody").append(dataHtml);
								});
								$("#hasil-spk").toggleClass("hidden");
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