<?php
include "../conn.php";
session_start();
    if($_SESSION['status']!="login"){
header("location:../index.php?pesan=belum_login");
}

if(isset($_POST['save'])){
    unset($_POST['save']);
    mysqli_query($db_link, "insert into spk (".implode(", ", array_keys($_POST)).") VALUES ('".implode("', '", $_POST)."')");
    header("Location: riwayat_klasifikasi.php");
    exit;
}

$file = fopen("hasil.csv", "r");
$cols = ['id_pkh','nama','sd','smp','sma','bumil','balita','tahun','kelas'];
$head = true;
while($row = fgetcsv($file, 1024)){
    if($head) {$head = false; continue;} // Skip baris pertama
    mysqli_query($db_link, "insert into spk (".implode(", ", $cols).") VALUES ('".implode("', '", $row)."')");
}

header("Location: riwayat_klasifikasi.php");