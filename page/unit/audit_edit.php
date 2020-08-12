<?php 
$id = $_POST['id'];
$status = $_POST['status'];
$ket = $_POST['ket'];

$file = '../../json/audited.json';
$isi = file_get_contents($file);
$data= json_decode($isi,true);

foreach ($data as $key => $dt ) {
    if ($dt['no_mesin']==$id) {
        $data[$key]['status_unit'] = $status;
        if ($data[$key]['keterangan'] == '') {
            $data[$key]['keterangan'] = $ket;
        }else{
            $data[$key]['keterangan'] = $data[$key]['keterangan'].', '.$ket;
        }
        $data[$key]['edit'] = '1';
    }
}

$json = json_encode($data);

if (file_put_contents($file,$json)) {
    $data= array(
        'status' => true
    );
}else{
    $data= array(
        'status' => false
    );
}
echo json_encode($data,true);
