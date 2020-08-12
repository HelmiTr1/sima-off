<?php 
$file = '../../json/audited.json';
$isi = file_get_contents($file);
$data= json_decode($isi,true);
$up = array();
foreach ($data as $key => $dt ) {
    $up =[
        "no_mesin"=> $dt['no_mesin'],
        "no_rangka"=> $dt['no_rangka'],
        "id_cabang"=> $dt['id_cabang'],
        "id_lokasi"=> $dt['id_lokasi'],
        "kode_item"=> $dt['kode_item'],
        "type"=> $dt['type'],
        "tahun"=> $dt['tahun'],
        "status_unit"=> $dt['status_unit'],
        "keterangan"=> $dt['keterangan'],
        "is_ready"=> $dt['is_ready'],
        "audit_by" =>$_POST['auditor']
    ];
    $send = curl('http://localhost:8080/ci-api/api/audit/dataunit2',json_encode($up,true));
}

function curl($url, $data){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

 json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES);

header('location:clear_data.php');


