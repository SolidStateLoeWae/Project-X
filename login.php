<?php
include("config.php");
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="lv">
<head>
	<meta charset="UTF-8">
	<script src="./lib/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="./css/html5-reset.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="./lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="./lib/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="./lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/css.css">

	<title>Galerija1</title>
	 <link rel="shortcut icon" href="images/logo/favicon.ico">
</head>
<body>
	<section class = "container">
	<header class = "row">
		<div class = "col-sm-12 col-md-12 col-lg-12"><img src="./images/backgrounds/header.jpg" alt="" class="header"></div>
	</header>
		<div class = "row">
			<div class = "col-sm-12 col-md-12 col-lg-12">
				<nav class="navbar navbar-inverse">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#izvelne">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>                        
				      </button>
				      <a class="navbar-brand" href="index.php"><img src="./images/logo/logo.png" alt="" class="logo"></a>
				    </div>
				    <div class="collapse navbar-collapse" id="izvelne">
				      <ul class="nav navbar-nav navbar-right">
				        <li class="active"><a href="index.php">Sākums</a></li>

				        <li class="dropdown">
				             <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Galerija <b class="caret"></b></a>

				             <ul class="dropdown-menu">
						          <li><a href="galerija1.php">Tīģeriši</a></li>
						          <li><a href="galerija2.php">Vilki</a></li>
						          <li><a href="galerija3.php">Lauvas</a></li>
						          <li><a href="galerija4.php">Leopardi</a></li>
						          <li><a href="video.php">Video</a></li>
						   </ul>

						     <li><a href="login.php">Login</a></li>
						      <li><a href="aptauja.php">Aptauja</a></li>
				      </li>
				    
				</ul>
				    </div>
				</nav>
			</div>
		</div>
		<section class = "row">
			<aside class = "col-sm-2 col-md-2 col-lg-2">
				<h1 >Reklāmas</h1>
		</aside>
		<main class="col-sm-8 col-md-8 col-lg-8">

		<article class="reg">
	<form method = "post" action = "login.php">
		<table>
		<tr><td class = "t_tabula">Lietotājvārds:</td><td><input type = "text"  name = "lietotajvards" required></td></tr>
		<tr><td class = "t_tabula">Parole:</td><td><input type = "password" name = "parole" required /></td></tr>
		<tr><td colspan = "2" class = "t_tabula"><input type = "submit" name = "pieslegties" value = "Pieslēgties"/></td></tr>
		<tr><td colspan = "2" class = "t_tabula"><a href = "register.php" />Reģistrēties</a></td></tr>
		</table>
	</form>
	   <?php
	   include ("dbconfig.php");
	
	         if(isset($_POST["pieslegties"])){
	 	    $lalei = new database();
			$lalei->login($_POST["lietotajvards"],$_POST["parole"]);

	            }
	?>
	</article>

		 
			</main>
			<aside class="col-sm-2 col-md-2 col-lg-2">
			<h1>Reklāmas</h1>
			
		</aside>
		</section>
	<div>
	<div class = "row">
	<footer class="col-sm-12 col-md-12 col-lg-12">

	   <div class="navbar navbar-default">

	      <div class="container" style="background-color: #004811;" >
	      	  
	      	   <p class="navbar-text"><b style="color: #ffffff">Animals</b></p>

	      </div>

	   </div>
		


	</footer>
	</div>	
</section>
</body>
</html>