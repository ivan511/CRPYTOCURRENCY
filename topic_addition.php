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


	</head>';

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
include_once("db_connect.php");

// REGISTER USER
if (isset($_POST['add_topic'])) {
  // receive all input values from the form
  $topic_name = mysqli_real_escape_string($conn, $_POST['topic_name']);
  $topic_description = mysqli_real_escape_string($conn, $_POST['topic_description']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($topic_name)) { array_push($errors, "Username is required"); }
  if (empty($topic_description)) { array_push($errors, "Email is required"); }

  // first check the database to make sure 
  // a topic does not already exist with the same name
  $topic_check_query = "SELECT * FROM topics WHERE name='$topic_name' LIMIT 1";
  $result = mysqli_query($conn, $topic_check_query);
  $topic = mysqli_fetch_assoc($result);
  
  if ($topic) { // if user exists
    if ($topic['name'] === $topic_name) {
      array_push($errors, "Topic already exists");
    }
  }
    
  if (count($errors) == 0) {
	
  	$query = "INSERT INTO topics (name,description) 
  			  VALUES('$topic_name', '$topic_description')";
  	mysqli_query($conn, $query);
  	header('location: index.php?menu=8');
  }
  
  else{
	  foreach($errors as $err){
		  echo 'ERROR:'.$err.'<br>';
		  
  }
  
}
}


if (isset($_GET['delete'])) {

  // receive all input values from the form
  $topic_name = $_GET['topic_name'];
  #$topic_description = mysqli_real_escape_string($conn, $_POST['topic_description']);
    
  if (count($errors) == 0) {
	
  	$query = "DELETE FROM topics WHERE name='$topic_name'";
  	mysqli_query($conn, $query);
  	header('location: index.php?menu=8');
  }
  
  else{
	  foreach($errors as $err){
		  echo 'ERROR:'.$err.'<br>';
		  
		}
  
	}
}


if (isset($_GET['edit'])) {
	
	
	

  // receive all input values from the form
  $topic_name_old = $_GET['topic_name'];
  #$topic_description = mysqli_real_escape_string($conn, $_POST['topic_description']);
    
  if (count($errors) == 0) {
	
  	$query = "SELECT * FROM topics WHERE name='$topic_name_old'";
  	$result = mysqli_query($conn, $query);
	$topic = mysqli_fetch_assoc($result);
	
	
	$topic_name = $topic["name"];
	$topic_description = $topic["description"];
	
  }
  
  else{
	  foreach($errors as $err){
		  echo 'ERROR:'.$err.'<br>';
		  
		}
  
	}
	
	
	print '

	<main>
	<div class="main">
		<h1> EDIT TOPIC </h1>
		<br>
		
		
		
		<div class="topic">
		
	<form method="post" action="topic_addition.php">
	
		<input type="hidden" name="topic_name_old" value="'.$topic_name_old.'">

		<label for="topic_name">Topic Name</label>
		<input type="text" id="topic_name" name="topic_name" value="'.$topic_name.'">

		<label for="topic_description">Topic Description</label>
		<textarea rows="8" cols="50"  id="topic_description" name="topic_description">'.$topic_description.'</textarea>
		
		
		<input type="submit" name="edit_topic" value="Save">
  </form>


		</div>

	</div>';
	

	
}

if (isset($_POST['edit_topic'])) {
	
  $topic_name_old = $_POST['topic_name_old'];

  // receive all input values from the form
  $topic_name = mysqli_real_escape_string($conn, $_POST['topic_name']);
  $topic_description = mysqli_real_escape_string($conn, $_POST['topic_description']);
  
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($topic_name)) { array_push($errors, "Topic name is required"); }
  if (empty($topic_description)) { array_push($errors, "Topic description is required"); }

    
  if (count($errors) == 0) {
	
  	$query = 'UPDATE topics
			  SET name="'.$topic_name.'", description="'.$topic_description.'"
			  WHERE name = "'.$topic_name_old.'"';
		
  	mysqli_query($conn, $query);
  	header('location: index.php?menu=8');
  }
  
  else{
	  foreach($errors as $err){
		  echo 'ERROR:'.$err.'<br>';
		  
  }
  
}
}


if (isset($_POST['edit_role'])) {
	
// receive all input values from the form
  $username_old = $_POST['username'];
    
  if (count($errors) == 0) {
	
  	$query = "SELECT admin FROM users WHERE username='$username_old'";
  	$result = mysqli_query($conn, $query);
	$role = mysqli_fetch_assoc($result);
	
	
	$role_num = $role["admin"];


	$roles=array("1"=>"Administrator","2"=>"Staff","3"=>"Guest"); 

  }
  
  else{
	  foreach($errors as $err){
		  echo 'ERROR:'.$err.'<br>';
		  
		}
	}
	
	

	
	print '

	<main>
	<div class="main">
		<h1> EDIT ROLE </h1>
		<br>
		
		
		
		<div class="role_edit">
		
	<form method="post" action="topic_addition.php">
	
		<input type="hidden" name="username_old" value="'.$username_old.'">

		<label for="topic_name">User Name</label>
		<input type="text" id="username" name="username" value="'.$username_old.'" readonly>

		<label for="role">Role</label>
		<select id="role" name="role">
		
		';
		foreach($roles as $rol){
		
		echo '<option value='.$rol.'>'.$rol.'</option>';
		}
print'
		</select>
		
		
		<input type="submit" name="update_role" value="Save">
  </form>


		</div>

	</div>';
}

if (isset($_POST['update_role'])) {
	
	print_r($_POST);
	
	  $role = $_POST['role'];  
	  $username = $_POST['username'];
	  
	  if($role=="Administrator")
		  $role_num="1";
	  else if($role=="Staff")
		  $role_num="2";
	  else
		  $role_num="3";
	  
	  
  if (count($errors) == 0) {
	
  	$query = 'UPDATE users
			  SET admin="'.$role_num.'"
			  WHERE username = "'.$username.'"';
		
  	mysqli_query($conn, $query);
  	header('location: index.php?menu=9');
  }
  
  else{
	  foreach($errors as $err){
		  echo 'ERROR:'.$err.'<br>';
		  
  }
  

	
	
}
}