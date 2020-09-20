<h3>Topics</h3>

    <form action="admin.php?page=addtopic" method="post">
	    <input name="topicName" value="" required/>
		<input type="submit" value="Add Topic"/>
	</form>	
	
	<br />
	
	<form action="admin.php?page=edittopic" method="post">
	    <select name="oldtopic">
		
		    <option value="" disabled>
			    Choose...
			</option>	
		
		    <?php
			    $topic_sql="SELECT * FROM `DB_topic`";
				$topic_query=mysqli_query($dbconnect, $topic_sql);
				$topic_rs=mysqli_fetch_assoc($topic_query);
				
				do{
				// value sent to query that edits the topic
				echo "<option value='";
				echo $topic_rs['topicName'];
				echo "'>";
				
				// what the user sees in the drop down menu
				echo $topic_rs['topicName'];
				echo "</option>";
				}
				
				while($topic_rs=mysqli_fetch_assoc($topic_query))
			?>
			
		</select>
		&nbsp; &nbsp; Change to... <input name="newtopic" required value=""/>
		<input type="submit" value="Update Topic"/>
		
    </form>

	<br/>
	
	<form action="admin.php?page=deletetopic" method="post">
	<select name="deltopic">
		
		    <option value="" disabled>
			    Choose...
			</option>	
		
		    <?php
			    $deltopic_sql="SELECT * FROM `DB_topic`";
				$deltopic_query=mysqli_query($dbconnect, $deltopic_sql);
				$deltopic_rs=mysqli_fetch_assoc($deltopic_query);
				
				do{
				// value sent to query that edits the topic
				echo "<option value='";
				echo $deltopic_rs['topicID'];
				echo "'>";
				
				// what the user sees in the drop down menu
				echo $deltopic_rs['topicName'];
				echo "</option>";
				}
				
				while($deltopic_rs=mysqli_fetch_assoc($deltopic_query))
			?>
			
		</select>
		<input type="submit" value="Delete Topic"/>
	</form>


<h3>Words</h3>

<p>
    <a href="admin.php?page=addvocab">Add a Word</a><br />
    <a href="admin.php?page=showall">Edit / Delete a Word</a><br />
</p>

<p>
    <a href="admin.php?page=logout">Logout</a><br />
</p>
 
