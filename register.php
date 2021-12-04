<?php

include_once('db_connect.php');

print '

	<main>
	<div class="main">
		<h1> REGISTER </h1>
		<br>
		
		
		
		<div class="contact">
		
	<form method="post" action="process.php">
		<label for="fname">First Name</label>
		<input type="text" id="fname" name="fname" placeholder="Your name..">

		<label for="lname">Last Name</label>
		<input type="text" id="lname" name="lname" placeholder="Your last name..">
		
		<label for="lname">Birth Date</label>
		<input type="date" id="birth_date" name="birth_date" placeholder="Your birth date..">

		
		<label for="email">E-mail</label>
		<input type="text" id="email" name="email" placeholder="Your email..">

		<label for="username">User name</label>
		<input type="text" id="username" name="username" placeholder="Your username..">

		<label for="password">Password</label>
		<input type="password" id="password1" name="password1" placeholder="Your password..">
		
		<label for="password">Confirm Password</label>
		<input type="password" id="password2" name="password2" placeholder="Confirm your password..">

		
		<label for="address">Address</label>
		<input type="text" id="address" name="address" placeholder="Your address..">

		<label for="city">City</label>
		<input type="text" id="city" name="city" placeholder="Your city..">
		




		<label for="country">Country</label>
		
		<select id="country" name="country">';
		
		$sql = "SELECT country_name FROM countries";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo '<option value='.$row["country_name"].'>'.$row["country_name"].'</option>';
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();

		
		
		
		
		print'
		</select>

		<input type="submit" name="reg_user" value="Register">
  </form>


		</div>

	</div>';
	
	


?>