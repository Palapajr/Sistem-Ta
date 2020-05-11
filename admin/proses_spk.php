<?php
include "../conn.php";
if(isset($_FILES)){
    if(file_exists("test.xlsx")){
        unlink("test.xlsx");
    }
    //mysqli_query($db_link, "truncate `spk`");
    move_uploaded_file($_FILES['fileupload']['tmp_name'], __DIR__."/test.xlsx");
    exec("python from_spk.py");

    // $query = mysqli_query($db_link, "select * from spk");
    // $res = [];
    // while($row = mysqli_fetch_assoc($query)){
    //     $res[] = $row;
    // }
    $res = [];
    $file = fopen("hasil.csv", "r");
    $cols = ['id_pkh','nama','sd','smp','sma','bumil','balita','tahun','kelas'];
    $head = true;
    while($row = fgetcsv($file, 1024)){
        if($head) {$head = false; continue;} // Skip baris pertama
        $data = [];
        foreach($cols as $key=>$col){
            $data[$col] = $row[$key];
        }
        $res[] = $data;
    }
    header("Content-Type: text/json");
    echo json_encode($res);

}