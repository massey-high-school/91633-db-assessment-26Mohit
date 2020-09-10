<h1>Delete a Word - Confirm</h1>

<?php
    /* needed to show Word in confirmation message */
	$delvocab_sql="SELECT * FROM `DB_vocab` WHERE `vocabID`=".$_REQUEST['vocabID'];
    $delvocab_query=mysqli_query($dbconnect, $delvocab_sql);
    $delvocab_rs=mysqli_fetch_assoc($delvocab_query);

?>

<p>Do you really want to delete <?php echo $delvocab_rs['word']; ?> from the database?</p>

<p>
   <a href="admin.php?page=deletevocab&vocabID=<?php echo $_REQUEST['vocabID']?>">Yes, Delete it!</a>
   <a href="admin.php?page=adminpanel">No, Take me back.</a>
</p>