<?php 
set_time_limit(0);
$cabang = $_POST['id_cabang'];
$tgl = date('Y-m-d');
$file = '../../json/audit_part.json';
$isi = file_get_contents($file);

$data= json_decode($isi,true);
$data[]=array(
    'id_cabang' => $cabang,
    'tanggal_audit' => $tgl
);

$json = json_encode($data,JSON_PRETTY_PRINT);
file_put_contents($file,$json);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://localhost:8080/ci-api/api/audit/datapart2?id_cabang=".$cabang);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($ch),true);
// print_r($output['data']);
foreach ($output['data'] as $key =>$res) {
    $get = '../../json/part_temp.json';
    $isi2 = file_get_contents($get);
    $data2= json_decode($isi2,true);
    $data2[] =[
        'id_cabang' => $res['KD_DEALER'],
        'id_lokasi' => $res['KD_GUDANG'],
        'kd_lokasi_rak' => $res['KD_RAKBIN'],
        'part_number' => $res['PART_NUMBER'],
        'deskripsi' => $res['PART_DESKRIPSI'],
        'qty' => $res['STOCK_OH']
    ];
    
    $json = json_encode($data2,JSON_PRETTY_PRINT);
    
    file_put_contents($get,$json);
}
curl_close($ch);

header('location:audit_part.php');
