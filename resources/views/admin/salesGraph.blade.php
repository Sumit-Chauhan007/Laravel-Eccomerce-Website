<!DOCTYPE HTML>
<html>
<head>
    <style>
        .canvasjs-chart-credit{
            display: none;
        }
    </style>
<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: true, // change to true
	title:{
		text: "Sales Chart"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
            @foreach ($usermcount as $key => $value)
			{ label: "{{$key}}",  y: {{$value}}  },
            @endforeach
		]
	}
	]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"> </script>
</body>
</html>
