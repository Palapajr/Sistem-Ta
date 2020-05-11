<?php
include "../conn.php";

mysqli_query($db_link, "
CREATE TABLE `simulation` (
  `id` int(11) NOT NULL,
  `id_pkh` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `sd` int(11) NOT NULL,
  `smp` int(11) NOT NULL,
  `sma` int(11) NOT NULL,
  `bumil` int(11) NOT NULL,
  `balita` int(11) NOT NULL,
  `tahun` year NOT NULL,
  `komp_prediksi` varchar(20) NOT NULL,
  `skor_Pendidikan` float NOT NULL,
  `skor_Kesehatan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$data = $_POST;
$data['id'] = 1;
if(isset($_POST['kelas'])) unset($data['kelas']);

$query = mysqli_query($db_link, "insert into simulation (".implode(", ",array_keys($data)).") values ('".implode("','",$data)."')");

exec("python from_simulation.py");

$query = mysqli_query($db_link, "select * from simulation");
$hasil = mysqli_fetch_assoc($query);
$hasil['skor_Kesehatan'] = number_format($hasil['skor_Kesehatan'], 2);
$hasil['skor_Pendidikan'] = number_format($hasil['skor_Pendidikan'], 2);

header("Content-Type: text/json");
echo json_encode($hasil);
mysqli_query($db_link, "drop table simulation");
