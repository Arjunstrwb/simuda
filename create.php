<?php
include_once(__DIR__."./lib/udara.php");
include_once(__DIR__."./lib/DataFormat.php");
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

?>