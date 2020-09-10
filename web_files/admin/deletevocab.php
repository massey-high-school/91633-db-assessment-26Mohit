<?php

    $vocab_sql="SELECT * FROM `DB_vocab` WHERE vocabID=".$_REQUEST['vocabID'];
    $vocab_query=mysqli_query($dbconnect, $vocab_sql);
    $vocab_rs=mysqli_fetch_assoc($vocab_query);

    // Remove image if required
    if ($vocab_rs['photo'] != 'noimage.png')

    unlink (IMAGE_DIRECTORY."/".$vocab_rs['photo']);

    // Delete word
    $delvocab_sql="DELETE FROM `DB_vocab` WHERE `vocabID`=".$_REQUEST['vocabID'];
    $delvocab_query=mysqli_query($dbconnect, $delvocab_sql);

?> 

<h1>Word Deleted!</h1>

<p>The Word has been deleted.</p>

<?php
    include("adminlinks.php");
?>	