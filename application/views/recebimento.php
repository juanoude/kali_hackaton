<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <meta charset="utf-8">
	<title>DashBoard de Troféis</title>
  <script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
    	theme: "light2", // "light1", "light2", "dark1", "dark2"
    	animationEnabled: true,
    	zoomEnabled: true,
      axisY:{
         maximum: 100,
      },
    	title: {
    		text: "Porcentagem do Acumulo de Lixo"
    	},
    	data: [{
    		type: "area",
    		dataPoints: <?php echo json_encode($grafico, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();

    }
  </script>
</head>
<body>
  <?php
    $page = $_SERVER['PHP_SELF'];
    $sec = "3";
    header("Refresh: $sec; url= $page");
   ?>

  <div class="container">
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

  </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>


</html>
