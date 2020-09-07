<?php

$vocab_sql="SELECT * FROM `DB_vocab` JOIN DB_topic ON (DB_vocab.topicID=DB_topic.topicID) WHERE DB_vocab.vocabID=".$_REQUEST['vocabID'];


$vocab_query=mysqli_query($dbconnect, $vocab_sql);
$vocab_rs=mysqli_fetch_assoc($vocab_query);

?>

<!-- word information displayed below -->

<h3>
   <?php echo $vocab_rs['word']; ?>
    (L<?php echo $vocab_rs['level'];?>)
</h3>

<div class="photo">
    <img src="images/<?php echo $vocab_rs['photo'];?>" />

</div>

<p>Maori- <?php echo $vocab_rs[('maori')]; ?></p>

<p>Definition- <?php echo $vocab_rs['definition']; ?></p>