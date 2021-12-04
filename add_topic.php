<?php

include_once('db_connect.php');

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


	</head>';

print '

	<main>
	<div class="main">
		<h1> ADD TOPIC </h1>
		<br>
		
		
		
		<div class="topic">
		
	<form method="post" action="topic_addition.php">
		<label for="topic_name">Topic Name</label>
		<input type="text" id="topic_name" name="topic_name" placeholder="Enter topic name">

		<label for="topic_description">Topic Description</label>
		<textarea rows="8" cols="50" id="topic_description" name="topic_description" placeholder="Enter description"></textarea>
		
		
		<input type="submit" name="add_topic" value="Add">
  </form>


		</div>

	</div>';
	
	


?>