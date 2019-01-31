<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />

<script type="text/javascript" src="../../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../../extras/modernizr.2.5.3.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<style>
	body{
		background-color:#0a527e;
		font-family:arial;
	}
	h1{
		color:#fff;
		text-transform: uppercase;
	}
	.icono_back{
		padding-left:50px;
		color:#fff;
	}
</style>
<body>
<?php
$page = explode("*", $_POST["libro"]);
 ?>

 <center>
 <h1><?php echo $_POST["titulo"]; ?></h1>
 </center>

<div class="flipbook-viewport">
	<a href="javascript:history.back()" target="_blank"> <i class="icono_back fas fa-chevron-left fa-3x"> </i></a>
	<div class="container" style="padding-top:100px;">
		<div class="flipbook">
	<?php foreach($page as $key => $val){ ?>
		<div style="background-image:url(<?= $page[$key]; ?>)"></div>
	<?php  } ?>


		</div>
	</div>
</div>


<script type="text/javascript">

function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width

			width:922,

			// Height

			height:600,

			// Elevation

			elevation: 50,

			// Enable gradients

			gradients: true,

			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['../../lib/turn.js'],
	nope: ['../../lib/turn.html4.min.js'],
	both: ['css/basic.css'],
	complete: loadApp
});

</script>

</body>
</html>
