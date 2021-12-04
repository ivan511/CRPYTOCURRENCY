<?php
session_start();

print '<!DOCTYPE HTML>
<html>
	<head>
		<title>Programiranje web aplikacija</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Ivan Nikolić">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="style.css">


	</head>
	
<body>

	<header class="hero-image">
		<div class="hero-text">
			<h1>CRYPTO CURRENCY</h1>
				<p>Future of digital currencies</p>
			</div>
		</div>
		
		<nav class="crumbs">
		<ul>
			<li class="crumb"><a href="index.php?menu=1">Home</a></li>
			<li class="crumb"><a href="index.php?menu=2">News</a></li>
			<li class="crumb"><a href="index.php?menu=3">Contact</a></li>
			<li class="crumb"><a href="index.php?menu=4">About us</a></li>
			<li class="crumb"><a href="index.php?menu=5">Galery</a></li>
			<li class="crumb"><a href="index.php?menu=10">COIN API</a></li>';
			
			if(isset($_SESSION["admin"])){
				print'
				<li class="crumb"><a href="index.php?menu=9">Panel</a></li>';
			}
			
			
			
			if(!isset($_SESSION["loggedin"])){
				print'
				<li class="crumb"><a href="index.php?menu=6">Log in</a></li>
				<li class="crumb"><a href="index.php?menu=7">Register</a></li>';
			}
			
			
			
			else{
				print'
				<li class="crumb"><a href="index.php?menu=8">Blog</a></li>
				<li class="crumb"><a href="logout.php">Log out</a></li>';

			}
			print'
		</ul>
		</nav>
	</header>';
	
	if (!isset($_GET['menu']) || $_GET['menu'] == 1)
		include("home.php"); 
	
	# News
	else if ($_GET['menu'] == 2) 
		include("news.php");
	
	# Contact
	else if ($_GET['menu'] == 3)
		include("contact.php");
	
	# About us
	else if ($_GET['menu'] == 4)
		include("about.php");
	
	#Galery
	else if ($_GET['menu'] == 5)
		include("galery.php");
	
	else if ($_GET['menu'] == 6)
		include("login.php");

	else if ($_GET['menu'] == 7)
		include("register.php");
	
	else if ($_GET['menu'] == 8)
		include("forum.php");
	
	else if ($_GET['menu'] == 9)
		include("panel.php");
	
	else if ($_GET['menu'] == 10)
		include("coingecko_api.php");



	
	
	
	print '
	

	
	<footer>
		<p>Copyright &copy; 2021 Ivan Nikolić. <a href="https://github.com/ivan511?tab=repositories"></a></p>
	</footer>
	</main>

</body>
</html>';





?>