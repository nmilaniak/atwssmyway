<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>ATWSS</title>
		<meta name="description" content="Perspective Page View Navigation: Transforms the page in 3D to reveal a menu" />
		<meta name="keywords" content="3d page, menu, navigation, mobile, perspective, css transform, web development, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="img/favicon.png">
		<link rel="stylesheet" type="text/css" href="/css/default.css" />
		<link rel="stylesheet" type="text/css" href="/css/multilevelmenu.css" />
		<link rel="stylesheet" type="text/css" href="/css/component.css" />
		<link rel="stylesheet" type="text/css" href="/css/animations.css" />
		<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="/css/component2.css" />
		<link rel="stylesheet" href="/css/gallery.css">
		<link rel="stylesheet" href="/css/gallery2.css">
		<link rel="stylesheet" type="text/css" href="/engine1/style.css" />
		<script src="/js/modernizr.custom.25376.js"></script>
		<script src="/js/modernizr.custom.js"></script>
		<script type="text/javascript" src="engine1/jquery.js"></script>
	</head>
	<body>
		<div id="perspective" class="perspective effect-moveleft">
			<div class="container">
				<div class="wrapper"><!-- wrapper needed for scroll -->
					<!-- Top Navigation -->
					<div class="codrops-top clearfix">
						<a class="codrops-icon codrops-icon-prev" href="javascript:history.back(-1);">Previous Page</a>
						<span class="right"><a class="codrops-icon codrops-icon-drop" href="/index.html"><span>Main page</span></a></span>
					</div>
					<header class="codrops-header">
						<h1>ATLAS Experiment<span>ATWSS Project</span></h1>	
					</header>
					<div class="main clearfix">
						<div class="related" style="padding-left:20px;">
							<p><button id="showMenu">MENU</button></p>
							<p>Go to the navigation of the ATWSS system</p>
						</div>
						<div class = "wrapper"> 	<?php readfile('https://atlas.web.cern.ch/Atlas/TCOORD/CavCom/plot.php'.
        (array_key_exists('InterventionID', $_GET) ? '?InterventionID='.$_GET['InterventionID'] : '')); 
        ?>
</div>
<hr>
						<div class="related">
							<p>Brought to you by</p>
							<p><a href="mailto:nataliamilaniak@cern.ch">Natalia Milaniak</a></p><p> and </p>
							<p><a href="mailto:aleksandramieszkowska@cern.ch">Aleksandra Mieszkowska</a></p>
						</div>
					</div><!-- /main -->
				</div><!-- wrapper -->
			</div><!-- /container -->
			<nav class="outer-nav right vertical">
				<a href="/docs/overview" class="icon-home">Overview</a>
				<a href="/docs/cern/interventions" class="icon-lock">Interventions</a>
				<a href="/docs/cern/dosimeters" class="icon-lock">Dosimeters</a>
				<a href="/docs/group" class="icon-star">Group</a>
				<a href="/docs/people" class="icon-mail">People</a>
				<a href="/docs/companies" class="icon-lock">Companies</a>
				<a href="/docs/documentation" class="icon-lock">Documentation</a>
				<a href="/docs/ghdocumentation" class="icon-lock">Github Documentation</a>
				<a href="/docs/gallery" class="icon-image">Gallery</a>
			</nav>
		</diatwv><!-- /perspective -->
		<script src="/js/classie.js"></script>
		<script src="/js/menu.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.dlmenu.js"></script>
		<script src="js/pagetransitions.js"></script>
		<script type="text/javascript" src="/engine1/wowslider.js"></script>
		<script type="text/javascript" src="/engine1/script.js"></script>
	</body>
</html>