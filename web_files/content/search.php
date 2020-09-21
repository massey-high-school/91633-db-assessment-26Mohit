<?php

    /* if(!isset($_REQUEST['topicID']))
    {
        header('Location:index.php');
    } */
    $DB_vocab = $_POST['DB_vocab'];
    $DB_vocab = preg_replace('/[^a-zA-Z0-9]/', '',  $DB_vocab);
    $vocab_sql="SELECT * FROM `DB_vocab` JOIN DB_topic ON  (DB_vocab.topicID=DB_topic.topicID) WHERE `word` LIKE '%$DB_vocab%'";
    $vocab_query=mysqli_query($dbconnect, $vocab_sql);
    $vocab_rs=mysqli_fetch_assoc($vocab_query);
	
	// count # of words found
	$count = mysqli_num_rows($vocab_query);

?>

<h3>
    <?php
        echo $vocab_rs['topicName'];
    ?>
</h3>

<?php
    if($count==0) {

?>

<p>Sorry there are no search results</p>

<?php
    } // end of no words if	

else {

?>	

<table class="results">

<?php
    
do{
    ?>
    
    <tr class="results">
        <td class="results">
            <a href="index.php?page=vocab&vocabID=<?php echo $vocab_rs
            ['vocabID'];?>">
                <?php echo $vocab_rs['word'];?>
            </a>
        
        </td>
        
        <td class="results">
        <b>L<?php echo $vocab_rs['level'];?></b>
        
        </td>
    
    </tr>
    
    <?php
    
}

while($vocab_rs=mysqli_fetch_assoc($vocab_query))
    
?>

</table>
<?php
} // end has words else
	?>