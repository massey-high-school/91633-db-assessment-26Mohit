<?php

    $newtopic =preg_replace('/[^a-zA-Z0-9]/', '', ($_POST["topicName"]));
	
	// PUT new category into database
	$newtopic_sql="INSERT INTO `DB_topic` (topicName) VALUES ('$newtopic')";
	$newtopic_query=mysqli_query($dbconnect,$newtopic_sql);
	
	header('Location:admin.php?page=addtopicsuccess');
	
?>	