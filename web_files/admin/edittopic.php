<?php

//Edit Topic
$oldtopic = preg_replace('/[^a-zA-Z0-9 ]/', '', $_POST["oldtopic"]);
$newtopic = preg_replace('/[^a-zA-Z0-9 ]/', '', $_POST["newtopic"]);

$edittopic_sql="UPDATE `DB_topic` SET `topicName`='$newtopic' WHERE `topicName`='$oldtopic'";
$edittopic_query=mysqli_query($dbconnect,$edittopic_sql);

    header('Location:admin.php?page=edittopicsuccess');

?>