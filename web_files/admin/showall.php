<?php

   $vocab_sql="SELECT*FROM `DB_vocab` ORDER BY `DB_vocab`.`word` ASC ";
   $vocab_query=mysqli_query($dbconnect, $vocab_sql);
   $vocab_rs=mysqli_fetch_assoc($vocab_query);

?>

  
   <h3>
       Edit / Delete Word
   </h3>

   <table class="results">
       
   <?php do {?>
       <tr class="results">
           <td class="results"><a href="../index.php?page=vocab&vocabID=<?php echo $vocab_rs['vocabID']; ?>"><?php echo $vocab_rs['word']; ?></a></td>
           <td class="results"><b>L <?php echo $vocab_rs['level']; ?></b></td>
           <td class="results"><a href="admin.php?page=editvocab&vocabID=<?php echo $vocab_rs['vocabID']; ?>">Edit</a></td>
           <td class="results"><a href="admin.php?page=deleteword_confirm&vocabID=<?php echo $vocab_rs['vocabID']; ?>">Delete</a></td>
       </tr>
    <?php
        }
       
        while ($vocab_rs=mysqli_fetch_assoc($vocab_query))
    ?>        
    
</table>