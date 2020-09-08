<?php

$delimage_sql="SELECT * FROM `DB_vocab` WHERE topicID=".$_REQUEST['topicID'];
$delimage_query=mysqli_query($dbconnect, $delimage_sql);
$delimage_rs=mysqli_fetch_assoc($delimage_query);
$count=mysqli_num_rows($delimage_query);

// remove unwanted images 
if ($count>0)
{
	do{
	if ($delimage_rs['photo']!='noimage.png' and $delimage_rs['photo']!='')
    /* deletes image */
    unlink(IMAGE_DIRECTORY."/".$delimage_rs['photo']);
	}
	
	while ($delimage_rs=mysqli_fetch_assoc($delimage_query));
	
	// delete unwanted words
	$deltopic_sql="DELETE FROM `DB_vocab` WHERE topicID=".$_REQUEST['topicID'];
	$deltopic_query=mysqli_query($dbconnect, $deltopic_sql);
}

// delete unwanted topicID
$deltopic_sql="DELETE FROM `DB_topic` WHERE topicID=".$_REQUEST['topicID'];
$deltopic_query=mysqli_query($dbconnect, $deltopic_sql);

header('Location:admin.php?page=deletetopicsuccess');

?>