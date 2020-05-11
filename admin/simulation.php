<?php
echo "Initializing DB...";
$db = mysqli_connect("localhost", "root", "", "pkh_pnn");
mysqli_query($db, "
CREATE TABLE `simulation` (
  `id` int(11) NOT NULL,
  `peserta` varchar(10) NOT NULL,
  `nama_peserta` varchar(35) NOT NULL,
  `sd` int(11) NOT NULL,
  `smp` int(11) NOT NULL,
  `sma` int(11) NOT NULL,
  `bumil` int(11) NOT NULL,
  `balita` int(11) NOT NULL,
  `komp_prediksi` varchar(20) NOT NULL,
  `skor_Pendidikan` float NOT NULL,
  `skor_Kesehatan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
echo mysqli_error($db);

echo "\nInserting Data...";
// Dummy Data
$data = [
    "id"=>1,
    "peserta"=>"WN-001",
    "nama_peserta"=>"Peserta",
    "sd"=>1,
    "smp"=>0,
    "sma"=>1,
    "bumil"=>1,
    "balita"=>1
];

$query = mysqli_query($db, "insert into simulation (".implode(", ",array_keys($data)).") values ('".implode("','",$data)."')");

echo "\nRunning Python Script...";
exec("python from_simulation.py");

$query = mysqli_query($db, "select * from simulation");
while($row = mysqli_fetch_assoc($query)){
 print_r($row);
}

//mysqli_query($db, "drop table simulation");


