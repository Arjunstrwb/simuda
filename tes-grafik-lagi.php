<?php
include_once(__DIR__."/lib/udara.php");
include_once(__DIR__."/lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Sensor();
$format=new DataFormat();
$getAll=$sensor->getAll();
$resultAll= isset($getAll['data']) ? $getAll['data'] : [];
?>
<html>
	<head>
		<title>Monitoring Suhu GGP</title>
		<link rel="stylesheet" href="./include/css/style.css">
		<link rel="stylesheet" href="./include/css/bootstrap.css">
		<link rel="stylesheet" href="./include/js/bootstrap.js">
		<link rel="stylesheet" href="./include/js/highchart.css">
		<link rel="stylesheet" href="./include/js/Chart.css">
	</head>
	<body>
	<?php include "master/header.php" ?>
	<br>
			<div class="row">
				<div class="col-md-2 col-md-offset-2">
					<div class="panel panel-primary">
  						<div class="panel-heading">
    					<h3 class="panel-title tengah">Log</h3>
  						</div>
  						<div class="panel-body" style="padding:0px;">
						  <?php include "master/side-menu.php" ?>
  					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div id="container1"></div>
				<div id="container2"></div>
				<div id="container3"></div>
				<div id="container4"></div>
			</div>
		</div>
	</body>
</html>

<script src="./assets/js/jquery-1.11.1.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/chart.min.js"></script>
	<script src="./assets/js/chart-data.js"></script>
	<script src="./assets/js/easypiechart.js"></script>
	<script src="./assets/js/easypiechart-data.js"></script>
	<script src="./assets/js/bootstrap-datepicker.js"></script>
	<script src="./assets/js/custom.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="./assets/js/modules/data.js"></script>
	<script src="./assets/js/modules/exporting.js"></script>
	<script src="./assets/js/highcharts.js"></script>
	<script src="./assets/js/bootstrap.js"></script>
	<script src="./assets/js/Chart.js"></script>
	<script src="./assets/js/Chart.bundle.js"></script>
	<?php
		$data_suhu = array();
		$data_kelembapanudara = array();
		$data_kelembapantanah = array();
		$data_ph = array();
		foreach($resultAll as $result){

			array_push($data_suhu, array(strtotime($result['waktu']) * 1000,(float) $result['suhu']));

		}
		// die (json_encode($data_suhu));
		?>

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
								<?php echo json_encode($data_suhu);?>
						}]
				});
				</script>