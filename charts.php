<?php
include_once(__DIR__."./lib/udara.php");
include_once(__DIR__."./lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Sensor();
$format=new DataFormat();
$getAll=$sensor->getAll();
$resultAll= isset($getAll['data']) ? $getAll['data'] : [];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMUDA - Charts</title>
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

<?php
		$data_humidity = array();
		$data_asap = array();
		foreach($resultAll as $result){
			array_push($data_humidity, array(strtotime($result['date']) * 1000,(float) $result['humidity']));
			array_push($data_asap, array(strtotime($result['date']) * 1000,(float) $result['gas_dan_asap']));
			

		}
		// die (json_encode($data_asap));
		?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Suhu (°C)
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<!-- <div class="canvas-wrapper">
							<canvas class="chart" id="line-chart" ></canvas>
						</div> -->
						<div id="container1"></div>
					</div>
				</div>
			</div>

			<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Kelembapan Udara (°C)
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<!-- <div class="canvas-wrapper">
							<canvas class="chart" id="line-chart" ></canvas>
						</div> -->
						<!-- <div id="container1"></div> -->
					</div>
				</div>
			</div>
		
		








		</div>
	</div>
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/modules/data.js"></script>
	<script type="text/javascript" src="js/modules/exporting.js"></script>
	<script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/Chart.js"></script>
	<script type="text/javascript" src="js/Chart.bundle.js"></script>


		<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container1'
						},
						title: {
								text: 'Grafik Data Suhu'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								// <?php echo json_encode($data_asap);?>
						}]
				});
				</script>
	<script>
	window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc", 
	data : <?php echo json_encode($data_humidity);?>
	});



	});
};
	</script>	
</body>
</html>
