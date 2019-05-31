<!DOCTYPE html>
<html>
<head>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/head.txt"); ?>
</head>
<body>
	<div class="col-lg-6">
		 <h3>Income categories</h3>
		 <div id="chart"></div>
	 </div>
	<div class="col-lg-6">
		<h3>Expense categories</h3>
		<div id="chart2"></div>
	</div>

</body>
</html>
<!--Loads in the bar chart for analytics-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Management/scripts/incomegraph.php"); ?>
