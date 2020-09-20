<?php

$output = '';
if(isset($_POST['DB_vocab'])) {
	header('Location:index.php');
    $DB_vocab = $_POST['DB_vocab'];
    $DB_vocab = preg_replace('/[^a-zA-Z0-9]/', '',  $DB_vocab);
	
	// find the words from the database
    $DB_vocab_query=mysqli_query("SELECT * From `DB_vocab` WHERE `word` LIKE ('%$DB_vocab%')");
	$DB_vocab_rs=mysqli_fetch_assoc($DB_vocab_query);

    
    if($DB_vocab_rs == 0){
      $output = "There was no search results!";

    }else{

while (mysqli_fetch_array($DB_vocab_query)) {$DB_vocab;}
$output .= 'DB_vocab';}}
?>
<?php print ("$output"); ?>