<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'conn.php';

// menangkap data yang dikirim dari form
$uname = $_POST['uname'];
$pass = md5($_POST['pass']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($db_link,"select * from admin where uname='$uname' and pass='$pass'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['uname'] = $uname;
	$_SESSION['status'] = "login";
	header("location: admin/index.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>