<?php

	// find the words from the database
	$DB_vocab_sql="SELECT * From `DB_topic WHERE `word` LIKE ('$DB_vocab')";
    $DB_vocab_query=mysqli_query($dbconnect, $DB_vocab_sql);
	$DB_vocab_rs=mysqli_fetch_assoc($DB_vocab_query);
    header('Location:admin.php?page=search_rs');

?>


    <form  method="post">
	    <input name="DB_vocab" value="" required/>
		<input type="submit" value="Search"/>
	</form>	