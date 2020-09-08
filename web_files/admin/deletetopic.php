<?php

//Delete Topic
$deltopicID = preg_replace('/[^0-9]/', '', $_POST["deltopic"]);

$deltopic_sql="SELECT * FROM `DB_topic` WHERE topicID=".$deltopicID;
$deltopic_query=mysqli_query($dbconnect,$deltopic_sql);
$deltopic_rs=mysqli_fetch_assoc($deltopic_query);

// check if topic has words in it
$check_sql="SELECT * FROM `DB_topic` WHERE topicID=$deltopicID";
$check_query=mysqli_query($dbconnect, $check_sql);
$count=mysqli_num_rows($check_query);

if ($count>0) {?>
<div class="warning"><p>Warning there are <?php echo $count; ?> words in the <?php echo $deltopic_rs['topicName'];?> topic. If you delete this topic, those words will be removed from the database.</div>

<?php

}

?>

<p>
<a href="admin.php?page=deletetopicconfirm&topicID=<?php echo $deltopic_rs['topicID']?>">Yes, delete it!</a> |
<a href="admin.php?page=adminpanel">No, go back</a>
</p>

<p>Do you really want to delete topic #<?php echo $deltopicID ?> ie: the <?php echo $deltopic_rs['topicName'];?></p>