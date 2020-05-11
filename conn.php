<?php 
$db_host = 'localhost';
$db_usn = 'root'; //nama username
$db_psw = ''; // untuk password, jika tidak ada kosongi saja
$db_name = 'pkh_pnn' ; // nama database

$db_link = mysqli_connect( $db_host, $db_usn, $db_psw, $db_name);
if(!$db_link) {
	echo 'TIDAK DAPAT TERHUBUNG KE DATABASE';
}

?>