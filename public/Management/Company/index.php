<!DOCTYPE html>
<html>
<head>
     <title>Management Panel</title>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/head.txt"); ?>
</head>
<body>
	<!--Header-->
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/managementheader.php"); ?>
	<div class="container-fluid">
		<h1>Company financials</h1>
		<br>
	     <!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div id="home" class="container tab-pane active"><br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div id="menu1" class="container tab-pane fade"><br>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
			<div id="menu2" class="container tab-pane fade"><br>
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
	</div>
</body>
</html>
<!--Loads in the bar chart for analytics-->
<script src="/scripts/apexcharts.min.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Management/scripts/incomegraph.php"); ?>
