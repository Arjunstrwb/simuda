<?php
include_once(__DIR__."/lib/udara.php");
include_once(__DIR__."/lib/DataFormat.php");
header("Access-Control-Allow-Methods: POST");


$sensor = new Sensor();

$humidity = isset($_GET['humidity']) ? $_GET['humidity']: null;
$temperature = isset($_GET['temperature']) ? $_GET['temperature']: null;
$gas_dan_asap = isset($_GET['gas_dan_asap']) ? $_GET['gas_dan_asap']: null;
$co = isset($_GET['co']) ? $_GET['co']: null;
$amonia = isset($_GET['amonia']) ? $_GET['amonia']: null;
$hidrogen_sulfida = isset($_GET['hidrogen_sulfida']) ? $_GET['hidrogen_sulfida']: null;
$konsentrasi_debu= isset($_GET['konsentrasi_debu']) ? $_GET['konsentrasi_debu']: null;


$sensor->setValue($humidity, $temperature, $gas_dan_asap, $co, $amonia, $hidrogen_sulfida, $konsentrasi_debu);


$result = $sensor->create();
// $format= new DataFormat();
// echo $format->asJSON($result);

// function storeInDB($temperature, $humidity, $nilai_amonia_sulfida_benzena, $resistansi_amonia_sulfida_benzena, 
// $nilai_gas_lpg, $nilai_asap, $nilai_karbonmonoksida, $nilai_gas_metana){
//  $query = "INSERT INTO log set humidity='".$humidity."', temperature='".$temperature."',
//  nilai_amonia_sulfida_benzena='".$nilai_amonia_sulfida_benzena."', resistansi_amonia_sulfida_benzena='".$resistansi_amonia_sulfida_benzena."',
//  nilai_gas_lpg='".$nilai_gas_lpg."', nilai_asap='".$nilai_asap."',
//  nilai_karbonmonoksida='".$nilai_karbonmonoksida."', nilai_gas_metana='".$nilai_gas_metana."'
//   ";
//  $result = mysqli_query($this->link,$query) or die('Error query:  '.$query);
// }

// }
// if($_GET['temperature'] != '' and  $_GET['humidity'] != '' 
// and $_GET['nilai_amonia_sulfida_benzena'] != '' and $_GET['resistansi_amonia_sulfida_benzena'] != ''
// and $_GET['nilai_gas_lpg'] != '' and $_GET['nilai_asap'] != '' 
// and $_GET['nilai_karbonmonoksida'] != '' and $_GET['nilai_gas_metana'] != '' ){

// $sensor=new Sensor($_GET['temperature'], $_GET['humidity'],
// $_GET['nilai_amonia_sulfida_benzena'], $_GET['resistansi_amonia_sulfida_benzena'], 
// $_GET['nilai_gas_lpg'], $_GET['nilai_asap'], $_GET['nilai_karbonmonoksida'], $_GET['nilai_gas_metana']);
// }

?>