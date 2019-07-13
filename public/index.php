<html>
<head>
     <title>Meyer Realestate</title>
     <?php include("includes/head.txt"); ?>
</head>
<body>
	<!--Header-->
     <?php include("includes/header.php"); ?>
	<!--Carousel Wrapper-->
	<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-1z" data-slide-to="1"></li>
			<li data-target="#carousel-example-1z" data-slide-to="2"></li>
		</ol>
		<!--Slides-->
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active"><img class="d-block w-100 h-100" src="pictures/pic1.jpg" alt="First slide"></div>
			<div class="carousel-item"><img class="d-block w-100 h-100" src="pictures/pic2.jpg" alt="Second slide"></div>\
			<div class="carousel-item"><img class="d-block w-100 h-100" src="pictures/pic3.jpg" alt="Third slide"></div>
		</div>
		<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</body>
</html>
