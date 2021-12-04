<?php
session_start();

// connect to the database
include_once("db_connect.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  
  if ($user) { // if user exists
    if ($user['password'] === md5($password)) {
		  $user_check_staff = "SELECT admin FROM users WHERE username='$username'";
		  		  
		  $result = mysqli_query($conn, $user_check_staff);
		  $staff = mysqli_fetch_assoc($result);
		  
		  
		  if($staff["admin"]=="1"){
			$_SESSION['admin'] = true;
		  }
		  
		  if($staff["admin"]=="1" || $staff["admin"]=="2"){
			$_SESSION['staff'] = true;
		  }

		$_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
    }
	
	else print "WRONG USERNAME OR PASSWORD";

  }
  
}