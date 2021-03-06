<?php

$word="";
$level=0;
$topicID=1;
$maori="";
$definition="";
$photo="noimage.png";
$WordErr=$LevelErr=$PhotoErr=$MaoriErr=$DefErr="";


// define variables and set to empty values...
$valid=true;
$uploadOk = 1;

// Code below excutes when the form is submitted...
if ($_SERVER["REQUEST_METHOD"] =="POST") {
      
    // sanitise all variables
    $word = test_input(mysqli_real_escape_string($dbconnect,$_POST["word"]));
    $level = test_input($_POST["level"]);
    $topicID = preg_replace('/[^0-9.]-/','',$_POST['topicID']);
    $maori = test_input(mysqli_real_escape_string($dbconnect,$_POST["maori"]));
    $definition = test_input(mysqli_real_escape_string($dbconnect,$_POST["definition"]));
    
    // Error checking...
    If (empty($word)) {
    $WordErr = "a Word is required";
    $valid=false;    
    }
    
    $level=preg_replace('/[^0-9.]-/','',$_POST['level']);
    if ($level<=0) {
    $LevelErr = "Enter a number greater than 0";
    $valid=false;    
    }
    
    if (empty($maori)) {
    $MaoriErr = "Please provide a Maori translation of the word";
    $valid=false;    
    }
    
    if (empty($definition)) {
    $DefErr = "Please provide a definition";
    $valid=false;
    }
    
    //Check Image...
    if ($_FILES['fileToUpload']['name']!="") {
        
    // Shifts images from temporary directory to target directory
        
    // use unique-id so each upload file is unique    
    $target_file = uniqid()."_". basename($_FILES["fileToUpload"]['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Allow .jpg, .png or gif only
    if($imageFileType !="jpg" && $imageFileType != "png" && $imageFileType != "gif" ){
    $PhotoErr= "Sorry, only JPG, JPEG, PNG & GIf files are allowed.";
    $uploadOk = 0;
    $valid=false;
    }   
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"]> 500000) {
    $PhotoErr= "Sorry, your file is too large.";
    $uploadOk = 0;
    $valid=false;    
    }    
        
    }
    
    
    // If everything is OK - show 'success message and update database
    if($valid){
    header('Location: admin.php?page=addvocab_success');
            
    // put entry into database
    if ($_FILES['fileToUpload']['name']!="")
        
        $addvocab_sql="INSERT INTO `DB_vocab` (word, topicID, level, photo, maori, definition) VALUES (
        '$word',
        '$topicID',
        '$level',
        '".$target_file."',
        '$maori',
        '$definition'
        )";
    
    else
         $addvocab_sql="INSERT INTO `DB_vocab` (word, topicID, level, photo, maori, definition) VALUES (
        '$word',
        '$topicID',
        '$level',
        '$photo',
        '$maori',
        '$definition'
        )";
        
    // Code below runs query and inputs data into database 
    $addvocab_query=mysqli_query($dbconnect,$addvocab_sql);    
    
    if ($uploadOk==1) {
        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], IMAGE_DIRECTORY.'/'.$target_file);
    }    
    }

}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=addvocab");?>" enctype="multipart/form-data">
    
    <h1>Add Vocab</h1>
    
    <p>
        <b>Word:</b>
        <input type="text" name="word" value="<?php echo $word;?>" />
        &nbsp;&nbsp; <span class="error"><?php echo $WordErr;?></span>
    </p>
    
    <p>
        <b>Level: </b>
        <input type="text" name="level" value="<?php echo $level;?>" size="2" />
        &nbsp;&nbsp; <span class="error"><?php echo $LevelErr;?></span>
    </p>

    
    <p>
        <b>Topic</b>    
        <select name="topicID">
            
        <?php
            
        $topic_sql="SELECT * FROM `DB_topic`";
        $topic_query=mysqli_query($dbconnect, $topic_sql);
            
         do {
			
			if ($topic_rs['topicID']==$topicID) {
				echo '<option value="'.$topic_rs['topicID'].'"
				selected';
				echo ">".$topic_rs['topicName']."</option>";
			}
			else {
            echo '<option value="'.$topic_rs['topicID'].'"';
            echo ">".$topic_rs['topicName']."<?option>";
            }
        }    
        
        while ($topic_rs=mysqli_fetch_assoc($topic_query)) 
			
        ?>    
        
        </select>    
    </p>

    <p>
        <b>Photo</b>
        <input type="file" name="fileToUpload" id="fileToUpload" value=""/>&nbsp;&nbsp; <span class="error"><?php echo $PhotoErr;?></span>    
    </p>

    <p>
        <b>Maori</b>    
        <input type="text" name="maori" value="<?php echo $maori; ?>" />
        &nbsp;&nbsp; <span class="error"><?php echo $MaoriErr;?></span>
    </p>
    
    <p>
        <b>Definition</b>&nbsp;&nbsp; <span class="error"><?php echo $DefErr;?></span>
    </p>
    <p>
        <textarea type="text" name="definition" cols="60" rows="7"><?php echo $definition; ?></textarea>   
    </p>
    
    <input type="submit" name="submit" value="Add Word" />
    
    

</form>