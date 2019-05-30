<?php
$dataPoints = array(
	array("y" => 7,"label" => "March" ),
	array("y" => 12,"label" => "April" ),
	array("y" => 28,"label" => "May" ),
	array("y" => 18,"label" => "June" ),
	array("y" => 41,"label" => "July" )
);
?>
<script>
var options = {
	chart: {
		height: 350,
		type: 'bar',
	},
	plotOptions: {
		bar: {
			horizontal: true,
		}
	},
	dataLabels: {
		enabled: true
	},
	series: [{
		data: [
			400,
			430,
			448,
			470,
			540]
	}],
	xaxis: {
		categories: [
			'Management Income',
			'Late Fee Income',
			'Application Fee Income',
			'Convience Fees',
			'Laundry',],
	}
}
var chart = new ApexCharts(document.querySelector("#chart"),options);

chart.render();

var options = {
	chart: {
		height: 350,
		type: 'bar',
	},
	plotOptions: {
		bar: {
			horizontal: true,
		}
	},
	dataLabels: {
		enabled: true
	},
	series: [{
		data: [400, 430, 448, 470, 540]
	}],
	xaxis: {
		categories: [
			'Legal fees',
			'Utilities',
			'Cleaning and Maintenance',
			'Wages and Salaries',
			'Repairs',],
	}
}
var chart = new ApexCharts(document.querySelector("#chart2"),options);

chart.render();
</script>
