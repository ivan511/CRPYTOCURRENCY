<?php

if(isset($_SESSION["admin"])){

include_once("db_connect.php");

  	$query = "SELECT username,admin FROM users";
  	$result = mysqli_query($conn, $query);
	$users = array();
	while ($rows = mysqli_fetch_assoc($result)){
	array_push($users,$rows);
  }



print '

	<main>
	<div class="main">
		<h1> USER LIST </h1>
		<br>
		
		
		
		<div class="panel">
		
<table id=users>
  <tr>
    <th>UserName</th>
    <th>Role</th>
	<th>Action</th>
  </tr>';
  
 $roles=array("1"=>"Administrator","2"=>"Staff","3"=>"Guest"); 
 
foreach($users as $user){
	
	if($user["admin"]==1)
		$role_selected="Administrator";
	else if($user["admin"]==2)
		$role_selected="Staff";
	else
		$role_selected="Guest";
	
	echo '<tr>';

	echo '<td>'.$user["username"].'</td>';
	print '<td>';
	
	foreach($roles as $role){

		if($role_selected==$role){
		
		print $role;
		}
	}
	
	
	print '
			</td>
			<td>
				<form method="post" action="topic_addition.php">
				<input type="hidden" name="username" value="'.$user["username"].'">
				<input type="submit" name="edit_role" value="Edit Role">
				</form>
			</td>
			</tr>';
			
			

	
}
	echo '</table>';

print'
		

		</div>

	</div>';

}


else
	echo 'You have no admin rights for this page';

?>