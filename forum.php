<?php

include_once("db_connect.php");


  $get_topics = 'SELECT * FROM topics';
  $result = mysqli_query($conn, $get_topics);
  $topics=array();
  while ($rows = mysqli_fetch_assoc($result)){
	array_push($topics,$rows);
  }
  


print ' 

		<div class="main">
		<h1>CRYPTO BLOG</h1>';
		if(isset($_SESSION["staff"])){
			print'
			<form action="add_topic.php">
			<input type="submit" style="background-color:#819dfc;" value="Add topic">
			</form>
			';
		}
		print'
		<br>


			<div class="forum">';
			foreach($topics as $top){
			print'
				<div class="topics">
					<h2>'.$top["name"].'</h2>
					<hr />
					<p>'.$top["description"].'
			</div>
			';
			if(isset($_SESSION["staff"])){
		print '
		
		<form action="topic_addition.php">
		<input type="hidden" name="topic_name" value="'.$top["name"].'">
		<input type="submit" name="edit" value="Edit">
		<input type="submit" style="background-color:#ff574d;" name="delete" value="Delete">
			</form>';}}
		
print '			
		</div>

	</div>';


?>