<?php 
include "../conn.php";
require "../assets/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 

// tambah data
if (isset($_POST['save'])) {
	$id_pkh = $_POST['id_pkh'];
	$nama = $_POST['nama'];
	$sd = $_POST['sd'];
	$smp = $_POST['smp'];
	$sma = $_POST['sma'];
	$bumil = $_POST['bumil'];
	$balita = $_POST['balita'];
	$kelas = $_POST['kelas'];

	$sql = 'INSERT into training(id_pkh,nama,sd,smp,sma,bumil,balita,kelas) value("'.$id_pkh.'","'.$nama.'","'.$sd.'","'.$smp.'","'.$sma.'","'.$bumil.'","'.$balita.'","'.$kelas.'")';
	$query = mysqli_query($db_link,$sql);

	if ($query) {    
		echo "<script language='javascript'>              
				alert('Proses Tambah Data Berhasil');      
				window.open('data_training.php','_top')          
			</script>";
	} else {    
		echo "<script language='javascript'>             
				alert('Proses Tambah Data Gagal');     
				window.open('data_training.php','_top')          
			</script>"; }

}

if (isset($_GET['ni'])) {
	$ni = $_GET['ni'];
	$sql = 'DELETE from training where id_pkh="'.$ni.'"';
	$query = mysqli_query($db_link,$sql);

	if ($query) {    
		echo "<script language='javascript'>              
				alert('Proses hapus Data Berhasil');      
				window.open('data_training.php','_top')          
			</script>";
	}else{    
		echo "<script language='javascript'>             
				alert('Proses hapus Data Gagal');     
				window.open('data_training.php','_top')          
			</script>"; }

}

if(isset($_POST['edit'])){ 
 	$id_pkh = $_POST['id_pkh'];
	$nama = $_POST['nama'];
	$sd = $_POST['sd'];
	$smp = $_POST['smp'];
	$sma = $_POST['sma'];
	$bumil = $_POST['bumil'];
	$balita = $_POST['balita'];
	$kelas = $_POST['kelas'];

	$sql	= 'UPDATE training set nama="'.$nama.'", sd="'.$sd.'", smp="'.$smp.'", sma="'.$sma.'", bumil="'.$bumil.'", balita="'.$balita.'", kelas="'.$kelas.'" where id_pkh="'.$id_pkh.'"';
	$query  = mysqli_query($db_link,$sql);

	if ($query) {    
	echo "<script language='javascript'>              
			alert('Proses edit Data Berhasil');      
			window.open('data_training.php','_top')          
		</script>";

}else{    
	echo "<script language='javascript'>             
			alert('Proses edit Data Gagal');     
			window.open('data_training.php','_top')          
		</script>"; }

}
if(isset($_POST['import'])){
	if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
	    $arr_file = explode('.', $_FILES['file']['name']);
	    $extension = end($arr_file);
	 
	    if('csv' == $extension) {
	        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
	    } else {
	        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	    }
	 
	    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
	     
	    $sheetData = $spreadsheet->getActiveSheet()->toArray();

		foreach($sheetData as $i=>$row)
		{
			if($i == 0) continue;
			$id_pkh =  $sheetData[$i]['0'];
	        $nama = $sheetData[$i]['1'];
	        $sd = $sheetData[$i]['2'];
	        $smp = $sheetData[$i]['3'];
	        $sma = $sheetData[$i]['4'];
	        $bumil = $sheetData[$i]['5'];
	        $balita = $sheetData[$i]['6'];
	        $kelas = $sheetData[$i]['7'];
	        $query = mysqli_query($db_link,"INSERT into training (id_pkh,nama,sd,smp,sma,bumil,balita,kelas) VALUES ('$id_pkh','$nama','$sd','$smp','$sma','$bumil','$balita','$kelas')");
	    }
	    if ($query) {    
				echo "<script language='javascript'>              
						alert('Proses Import Data Berhasil');      
						window.open('data_training.php','_top')          
					</script>";

		}else{    
				echo "<script language='javascript'>              
						alert('Proses Import Data Berhasil');      
						window.open('data_training.php','_top')          
					</script>"; }
	}
}

if(isset($_POST['read'])){
	$id = $_POST['id'];
	$query = mysqli_query($db_link, "SELECT * from training where id_pkh='$id'");
	$data = mysqli_fetch_assoc($query);
	header("Content-Type: text/json");
	echo json_encode($data);
}

?>