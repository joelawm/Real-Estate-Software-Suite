<!DOCTYPE html>
<html>
<head>
     <title>Management Panel</title>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/head.txt"); ?>
</head>
<body>
	<!--Header-->
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/managementheader.php"); ?>
	<div id="chart1"></div>
	<div class="container-fluid">
		<h1>Company financials</h1>
		  <h2>Dynamic Tabs</h2>
		  <br>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs">
		    <li class="nav-item">
		      <a class="nav-link active" href="#home">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#menu1">Menu 1</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#menu2">Menu 2</a>
		    </li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div id="home" class="container tab-pane active"><br>
		      <h3>HOME</h3>
		      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		    </div>
		    <div id="menu1" class="container tab-pane fade"><br>
		      <h3>Menu 1</h3>
		      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div>
		    <div id="menu2" class="container tab-pane fade" onload="myFunction()"><br>
			    <div class="row">
				    <div class="col-lg-6">
					    	<h3>Income categories</h3>
					    	<div id="chart"></div>
				    	</div>
				    <div class="col-lg-6">
					    <h3>Expense categories</h3>
					    <div id="chart2"></div>
				    </div>
			    </div>
		  </div>
		</div>

		<script>
		$(document).ready(function(){
		  $(".nav-tabs a").click(function()
		  {
		    $(this).tab('show');
		    if(getElementById("menu2"))
		    {
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
		    }
		  });
		});
		</script>
</body>
</html>
<!--Loads in the bar chart for anal-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>