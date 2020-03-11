<?php
include_once(__DIR__."./lib/udara.php");
include_once(__DIR__."./lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Sensor();
$format=new DataFormat();

$getAll=$sensor->getAll();
$resultAll= isset($getAll['data']) ? $getAll['data'] : [];


$getFilter=$sensor->getAllFilter();
$resultFilter = isset($getFilter['data']) ? $getFilter['data'] : [];
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <meta http-equiv="refresh" content="60"> -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMUDA - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php include "master/header.php"?>
<?php include "master/side-menu.php"?>


<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo"<p align=center>Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i");
echo"| Pukul : <b>". $jam." "."</b>";
$a = date ("H");
if (($a>=6) && ($a<=10)){
echo "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo "Selamat Siang, Semangat Menjalankan Aktifitas !";}
else if (($a>15) && ($a<=18)){
echo "Selamat Sore";}
else { echo ", <b> Selamat Malam </b> </p>";}
?>  



		
	<div class="col-sm-8 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><b>Dashboard</b></li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h5><marquee><i><b>~Data Terupdate Secara Realtime Tiap 1 Menit~</i></b></marquee></h5> 
				<h2 class="page-header">Dashboard</h2>
			</div>
</div>
		<?php
				foreach($resultFilter as $result){
					$result['humidity'];
					$result['temperature'];
					$result['gas_dan_asap'];
					$result['co'];
					$result['amonia'];
					$result['hidrogen_sulfida'];
					$result['konsentrasi_debu'];
					$result['date'];
					
				}
			?>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Kelembaban Udara</h4>
						<div class="easypiechart" ><span class="percent"><?php echo "$result[humidity]";?></p></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Suhu Udara</h4>
						<div class="easypiechart" ><span class="percent"><?php echo "$result[temperature]";?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Gas LPG</h4>
						<div class="easypiechart" ><span class="percent"><?php echo "$result[gas_dan_asap]";?> Ppm</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Asap</h4>
						<div class="easypiechart" ><span class="percent"><?php echo "$result[gas_dan_asap]";?> Ppm</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Karbon Dioksida</h4>
						<div class="easypiechart"><span class="percent"><?php echo "$result[co]";?> Ppm</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Gas Amonia</h4>
						<div class="easypiechart"><span class="percent"><?php echo "$result[amonia]";?> Ppm</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Gas Hidrogen Sulfida</h4>
						<div class="easypiechart" ><span class="percent"><?php echo "$result[hidrogen_sulfida]";?> Ppm</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Konsentrasi Debu</h4>
						<div class="easypiechart"id="easypiechart-yellow"data-percent="0.05" ><span class="percent"><?php echo "$result[konsentrasi_debu]";?> µm </span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<?php include "master/footer.php"?>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>