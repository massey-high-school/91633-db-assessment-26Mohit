<div class="navigation">
		
        <?php
        $topic_sql="SELECT * FROM DB_topic"; // sets up query
        $topic_query=mysqli_query($dbconnect,$topic_sql); // runs query
        $topic_rs=mysqli_fetch_assoc($topic_query); // organises results

        // Loop to create dynamic topic links. Column heading from table is in square brackets (eg: 'word')

        do{?>
        
        <a class="nav" href="index.php?page=topic&topicID=<?php echo
        $topic_rs['topicID'];
           
                             
        ?>">
            
        <?php echo $topic_rs['topicName'];?></a> | 
    
        <?php

        }

        while($topic_rs=mysqli_fetch_assoc($topic_query))

        ?>
    
    
					
		<a class="nav" href="admin/admin.php">Admin</a>

		
	</div>	<!-- end navigation -->