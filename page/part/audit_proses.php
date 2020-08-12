<?php 
$file = '../../json/audited_part.json';

$isi = file_get_contents($file);

$data= json_decode($isi,true);
$cek = 1;
foreach ($data as $key => $dt ) {
    if(
        $dt['part_number'] == $_POST['part_number'] && 
    $dt['id_lokasi'] == $_POST['lokasi'] && 
    $dt['kd_lokasi_rak'] == $_POST['kdrak']){
        $data[$key]['qty'] = $dt['qty']+$_POST['qty'];
        $cek = 0;
        $json = json_encode($data);
    }
}

if ($cek == 1) {
    $data[]=array(
        'id_cabang' => $_POST['cabang'],
        'id_lokasi' => $_POST['lokasi'],
        'kd_lokasi_rak' => $_POST['kdrak'],
        'part_number' => $_POST['part_number'],
        'deskripsi' => $_POST['deskripsi'],
        'qty' => $_POST['qty']
    );
    $json = json_encode($data,JSON_PRETTY_PRINT);
}

file_put_contents($file,$json);
$data= array(
    'status' => $cek
);
echo json_encode($data,true);
