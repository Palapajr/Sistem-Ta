<?php

require_once ("../conn.php");

$passwordlama = md5($_POST['passwordlama']);

$passwordbaru = md5($_POST['passwordbaru']);

$konfirmasipassword = md5($_POST['konfirmasipassword']);

$username = $_GET['uname'];

$cekuser = "SELECT * FROM admin where uname = '$username' and pass = '$passwordlama'";

$querycekuser = mysqli_query($db_link, $cekuser);

$count = mysqli_num_rows($querycekuser);

if ($count >= 1){

$updatepassword = "UPDATE admin set pass = '$passwordbaru' where uname = '$username'";

$updatequery = mysqli_query($db_link, $updatepassword);

if($updatequery)

{
echo "<script language='javascript'>
		  alert ('Password Berhasil Diubah, Silahkan Login Kembali dengan Password Baru');
		  window.open('../index.php','_top')
		  </script>";
}else{

	echo "<script language='javascript'>
		  alert ('Gagal Mengubah Password');
		  window.open('index.php?p=ganti_password','_top')
		  </script>";}

}elseif (
($_POST['username']=="") or
($_POST['passwordlama']=="") or
($_POST['passwordbaru']=="") or
($_POST['konfirmasipassword']=="")
) {
	echo "<script language='javascript'>
		  alert ('Data Yang Dimasukkan Tidak Valid');
		  window.open('index.php?p=ganti_password','_top')
		  </script>";
}

?>