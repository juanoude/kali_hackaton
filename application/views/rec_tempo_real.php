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
    window.onload = function() {

    var dataPoints = [];

    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	theme: "light2",
    	zoomEnabled: true,
    	title: {
    		text: "Bitcoin Price - 2017"
    	},
    	axisY: {
    		title: "Price in USD",
    		titleFontSize: 24,
    		prefix: "$"
    	},
    	data: [{
    		type: "line",
    		yValueFormatString: "$#,##0.00",
    		dataPoints: dataPoints
    	}]
    });



    function addData(data) {
    	var dps = data;
    	dps (var i = 0; i < dps.length; i++) {
    		dataPoints.push({
    			x: dps[i]["x"],
    			y: dps[i]["y"]
    		});
    	}
    	chart.render();
    }

    $.getJSON(<?= ?>, addData);

}
</script>

</head>
<body>

  <div class="container">

    <?php
      print_r($teste);
    ?>



    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  </div>
  <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
  <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>


</html>
