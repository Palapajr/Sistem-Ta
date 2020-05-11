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
								<a href="peserta.php" class="waves-effect active"><i class="ti-menu-alt"></i><span>Data Peserta </span></span></a>
								
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
								<h4 class="page-title">Peserta</h4>
								<ol class="breadcrumb">
									<li><a href="index.php">Home</a></li>
									<li><a href="peserta.php">Peserta</a></li>
									<li class="active">Data Testing</li>
								</ol>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="card-box">
									<div class="row">
										
										<div class="col-sm-12">
											<a href="#custom-modal" class="btn btn-success btn-md waves-effect waves-light m-b-30" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"><span class="btn-label"><i class="md md-add"></i></span>Tambah Data</a>
											
											<a href="#import" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"><span class="btn-label"><i class="ti-import"></i></span>Import Data</a>
											
											<a href="?proses_akurasi" class="btn btn-warning btn-md waves-effect waves-light m-b-30"><span class="btn-label"><i class="fa fa-gear"></i></span>Proses Klasifikasi</a>
																		
										</div>
										
									</div>
									<?php if(isset($_GET['proses_akurasi'])){ 
										exec("python from_testing.py");
										$tampil	= 'SELECT * FROM testing';
										$query	= mysqli_query($db_link,$tampil);
										$orig_label = [];
										$result = [];
										$jumlah_benar = 0;
										$jumlah_salah = 0;
										$jumlah_data = 0;
										$confusion = [];
										while($row = mysqli_fetch_assoc($query)){
											if($row['kelas'] == $row['prediksi']){
												$jumlah_benar++;
											} else {
												$jumlah_salah++;
											}
											$confusion[$row['kelas']][$row['prediksi']] = isset($confusion[$row['kelas']][$row['prediksi']]) ? $confusion[$row['kelas']][$row['prediksi']] + 1 : 1;
											$jumlah_data++;
										}

										?>

									<div class="row">
										<div class="col-sm-4">
											<p class="lead">Akurasi: </p>
											<h3><?= ($jumlah_benar / $jumlah_data) * 100 ?>%</h3>
										</div>
										<div class="col-sm-4">
											<p class="lead">Jumlah Benar Terklasifikasi:</p>
											<h3><?= $jumlah_benar ?> data</h3>
										</div>
										<div class="col-sm-4">
											<p class="lead">Jumlah Salah Terklasifikasi:</p>
											<h3><?= $jumlah_salah ?> data</h3>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<h3>Confusion Matrix</h3>
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<td></td>
														<td>Pendidikan</td>
														<td>Kesehatan</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Pendidikan</td>
														<td style="background-color: #ffffaa"><?= $confusion['Pendidikan']['Pendidikan'] ?></td>
														<td><?= $confusion['Pendidikan']['Kesehatan'] ?></td>
													</tr>
													<tr>
														<td>Kesehatan</td>
														<td><?= $confusion['Kesehatan']['Pendidikan'] ?></td>
														<td style="background-color: #ffffaa"><?= $confusion['Kesehatan']['Kesehatan'] ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<?php }?>

									<!-- Tabel -->
									<div class="table-responsive">
										<?php
										$tampil	= 'SELECT * FROM testing';
										$query	= mysqli_query($db_link,$tampil);
										?>
										<table id="datatable" class="table table-striped table-bordered">
											<thead>
												<tr>													
													<th>No</th>
													<th>Id Peserta</th>
													<th>Nama Pengurus</th>
													<th>SD</th>
													<th>SMP</th>
													<th>SMA</th>
													<th>Bumil</th>
													<th>Balita</th>
													<th>Kelas</th>
													<th>Kelas Prediksi</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(mysqli_num_rows($query)>0) { ?>
											<?php
											$no = 1;
											while($row	= mysqli_fetch_array($query)){ 
											?>
												<tr>													
													<td><?php echo $no++ ;?></td>
													<td><?php echo $row['id_pkh'];?></td>
													<td><?php echo $row['nama'];?></td>
													<td><?php echo $row['sd'];?></td>
													<td><?php echo $row['smp'];?></td>
													<td><?php echo $row['sma'];?></td>
													<td><?php echo $row['bumil'];?></td>
													<td><?php echo $row['balita'];?></td>													
													<td><span class="label label-success pull-center"><?php echo $row['kelas'];?></span></td>	
													<td>
														<?php if($row['prediksi'] == ""){ ?>
															<span class="label pull-center" style="background-color: #aaa">Belum Diprediksi</span>
														<?php }  else { ?>
															<span class="label <?= ($row['prediksi'] == "Pendidikan"? "label-success" : "label-primary") ?> pull-center"><?php echo $row['prediksi'];?></span>
														<?php } ?>
													</td>
													<td>
														<a href="#custom-modal-edit" class="btn btn-primary editdata" title="Edit ini" data-animation="door" data-plugin="custommodal"
														data-overlaySpeed="100" data-overlayColor="#36404a" data-idpkh="<?= $row['id_pkh'] ?>"><i class="fa fa-pencil m-r-5"></i>Edit</a>
														<a href="proses.php?ni=<?php echo $row['id_pkh'];?>" class="btn btn-danger" name="delete" onclick="return confirm('Anda Yakin ingin menghapus data <?php echo $row['id_pkh'];?>?');"><i class="fa fa-times m-r-5"></i>Delete</a>
													</td>												
												</tr>	
												<?php  } ?>
												<?php }	?>
											</tbody>

										</table>
										<!--button checkboks -->
										<a href="del_all_testing.php" class="btn btn-danger btn-sm waves-effect waves-light m-b-30" onclick="hapus()"><i class="fa fa-times m-r-5"></i>Hapus Semua data</a>
										<!--end -->
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
						<div id="custom-modal" class="modal-demo">
							<button type="button" class="close" onclick="Custombox.close();">
							<span>&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="custom-modal-title">Tambah Data</h4>
							<div class="custom-modal-text text-left">
								<form role="form" method="post" action="proses.php">
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
										<input type="text" class="form-control" required="" id="kelas" name="kelas" placeholder="Contoh : Pendidikan">
									</div>
									
									<button type="submit" class="btn btn-default waves-effect waves-light" name="save">Save</button>
									<button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
								</form>
							</div>
						</div>

						<!-- Modal Import-->
						<div id="import" class="modal-demo">
							<button type="button" class="close" onclick="Custombox.close();">
							<span>&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="custom-modal-title">Import Data</h4>
							<div class="custom-modal-text text-left">
								<form role="form" method="post" action="proses.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="id_pkh">Import File Exel</label>										
										<input class="form-control" type="file" name="file">
									</div>

									<button type="submit" class="btn btn-default waves-effect waves-light" name="import" id="import_btn">Save</button>
									<button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
									<span class="pesan"></span>
								</form>
							</div>
						</div>

						<!-- Modal edit-->
						<div id="custom-modal-edit" class="modal-demo">
							<button type="button" class="close" onclick="Custombox.close();">
							<span>&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="custom-modal-title">Edit Data</h4>
							<div class="custom-modal-text text-left">
								<form role="form" method="post" action="proses.php">
									<div class="form-group">
										<label for="id_pkh">Kode PKH</label>										
										<input class="form-control" type="text" required="" id="edit_id_pkh" name="id_pkh" placeholder="Contoh : Wn-xx">
									</div>

									<div class="form-group">
										<label for="name">Nama Pengurus</label>
										<input type="text" class="form-control" required="" id="edit_nama" name="nama" placeholder="Contoh : Budiman">
									</div>
									
									<div class="form-group">
										<label for="sd">Jumlah Anak SD</label>
										<input type="text" class="form-control" required="" id="edit_sd" name="sd" placeholder="0">
									</div>
									
									<div class="form-group">
										<label for="smp">Jumlah Anak SMP</label>
										<input type="text" class="form-control" required="" id="edit_smp" name="smp" placeholder="0">
									</div>
									
									<div class="form-group">
										<label for="sma">Jumlah Anak SMA</label>
										<input type="text" class="form-control" required="" id="edit_sma" name="sma" placeholder="0">
									</div>

									<div class="form-group">
										<label for="bumil">Ibu Hamil</label>
										<input type="text" class="form-control" required="" id="edit_bumil" name="bumil" placeholder="0">
									</div>

									<div class="form-group">
										<label for="balita">Jumlah Anak Balita</label>
										<input type="text" class="form-control" required="" id="edit_balita" name="balita" placeholder="0">
									</div>

									<div class="form-group">
										<label for="kelas">Kelas</label>
										<input type="text" class="form-control" required="" id="edit_kelas" name="kelas" placeholder="Contoh : Pendidikan">
									</div>
									
									<button type="submit" class="btn btn-default waves-effect waves-light" name="edit">Edit</button>
									<button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
								</form>
							</div>
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
			$(".editdata").on("click", function(){
				id_pkh = $(this).data("idpkh");
				$.post("proses.php", {read:"", id: id_pkh}, function(res){
					$("#edit_id_pkh").val(res.id_pkh);
					$("#edit_nama").val(res.nama);
					$("#edit_sd").val(res.sd);
					$("#edit_smp").val(res.smp);
					$("#edit_sma").val(res.sma);
					$("#edit_bumil").val(res.bumil);
					$("#edit_balita").val(res.balita);
					$("#edit_kelas").val(res.kelas);
				})
			})
			$("#import_btn").on('click', function() {
				$("span.pesan").html("<strong>Sedang mengupload data. Mohon tunggu...");
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