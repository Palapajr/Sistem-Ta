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
		<link href="../assets/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
                                <a href="klasifikasi.php" class="waves-effect"><i class="icon-share"></i><span> Klasifikasi </span> </a>   
							</li>
							<li class="has_sub">
                      <a href="riwayat_klasifikasi.php" class="waves-effect active"><i class="fa fa-history"></i><span> Lihat Hasil Klasifikasi </span> </a>
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
									<li class="active">Riwayat Klasifikasi Data</li>
								</ol>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="card-box">
									<div class="row">									
										<div class="col-sm-12">
											<div class="form-group">
												<label for="tahun" class="control-label">Tahun</label>
												<select name="tahun" id="tahun" class="form-control">
													<option value="">Pilih Tahun</option>
													<?php
													$query = mysqli_query($db_link,"SELECT tahun FROM spk group by tahun order by tahun desc");
													while ($value = mysqli_fetch_array($query)){?>

														<option value="<?=$value['tahun']?>"><?=$value['tahun']?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div class="form-group">
												<label for="kelas" class="control-label">Kelas</label>
												<select name="kelas" id="kelas" class="form-control">
													<option value="">Pilih Kelas</option>
													<option value="Pendidikan">Pendidikan</option>
													<option value="Kesehatan">Kesehatan</option>
												</select>
											</div>
											
                                            <div class="table-responsive">
                                            <?php
                                                $tampil	= 'SELECT * FROM spk';
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
															<th>Tahun</th>
                                                            <th>Kelas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(mysqli_num_rows($query)>0) {
													$no = 1;
													$jumlah = [];

                                                    while($row	= mysqli_fetch_array($query)){ 
													$jumlah[$row['kelas']] = isset($jumlah[$row['kelas']]) ? $jumlah[$row['kelas']] + 1 : 1;
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
                                                            <td><?php echo $row['tahun'];?></td>								
															<td id="kelas"><span class="label <?= ($row['kelas'] == "Pendidikan"? "label-success" : "label-primary") ?> pull-center"><?php echo $row['kelas'];?></span></td>
                                                        </tr>	
                                                        <?php  } ?>
                                                        <?php }	?>
                                                    </tbody>
                                                </table>
											</div>
											<a href="del_riwayat.php" class="btn btn-danger btn-sm waves-effect waves-light m-b-30" onclick="hapus()"><i class="fa fa-times m-r-5"></i>Hapus Semua data</a>
											<hr>
											<div id="chart"></div>
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
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/jquery.printElement.min.js"></script>
		<script src="../assets/js/jszip.min.js"></script>
		<script src="../assets/js/pdfmake.min.js"></script>
		<script src="../assets/js/vfs_fonts.js"></script>
		
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script>
			function hapus() {
				var conf = confirm('Apakah anda yakin ingin menghapus semua data?');
				if(conf) {
					document.proses.action = 'del_riwayat.php';
					document.proses.submit();
				}
			}
			
			function strip_html(html){
				var tmp = document.createElement("div");
				tmp.innerHTML = html;
				return tmp.textContext || tmp.innerText || "";
			}
			
		</script>	
        <script type="text/javascript">
        tabelRiwayat = $('#datatable').DataTable({
			dom: "Brftip",
			buttons: ['print','excel','pdf']
		});

		$("#kelas").on('keyup change', function(e){
			tabelRiwayat.columns(9).search($(this).val()).draw();
		})

		$("#tahun").on('keyup change', function(e){
			tabelRiwayat.columns(9).search("")
						.columns(8).search($(this).val()).draw();
			$("#kelas").val("");
			update_chart();
		})

		function update_chart(){
			currentData = tabelRiwayat.columns(9, {filter: 'applied'}).data()[0];
			dataClass = currentData.map(strip_html);
			pendidikan = dataClass.filter(x=> x == "Pendidikan").length;
			kesehatan = dataClass.filter(x=> x == "Kesehatan").length;
			highChart.series[0].data[0].update(pendidikan);
			highChart.series[0].data[1].update(kesehatan);
		}

		// TableManageButtons.init();

		// 	var pendidikan = tabelRiwayat.columns(9).search('Pendidikan').length;
		// 	var kesehatan = tabelRiwayat.columns(9).search('Kesehatan').length;
		</script>
		<script src="../assets/chart/highcharts.js"></script>
        <script src="../assets/chart/modules/data.js"></script>
        <script src="../assets/chart/modules/drilldown.js"></script>
		<script type="text/javascript">
			var currentData = tabelRiwayat.columns(9).data()[0];
			var dataClass = currentData.map(strip_html);
			var pendidikan = dataClass.filter(x=> x == "Pendidikan").length;
			var kesehatan = dataClass.filter(x=> x == "Kesehatan").length;
			var highChart;
            $(function () {
                // Create the chart
                highChart = Highcharts.chart('chart', {
                    chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b>: {point.percentage:.1f} %'
							}
						}
					},
                    title: {
                        text: 'Perbandingan Kelas yang telah diklasifikasi'
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

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} data</b> dari keseluruhan<br/>'
                    },

                    series: [{
                        name: 'Jumlah Kelas',
                        colorByPoint: true,
                        data: [{
                            name: 'Pendidikan',
                            y: pendidikan,
                        }, {
                            name: 'Kesehatan',
                            y: kesehatan,
                        }]
                    }],
                });
            });
            </script>
    </body>
</html>