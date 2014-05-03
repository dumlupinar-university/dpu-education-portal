<div id = "content">


<?php

	echo'<p><em><h2>Course</h2></em></p>';

	foreach($results as $row){
		
	echo '<p><b>Name</b>			: '.$row->nameC.'</p>';
	
	echo '<p><b>Description</b>		: '.$row->description.'</p>';
	 
	echo '<p><b>Instructor</b>		: <a href='.site_url('user/get_teacher/'.$row->idU.'').'>'.$row->nameU.' '.$row->surname.'</a></p>';
	
	echo '<p><b>Create Date</b>		: '.$row->createddate.'</p>';
	
	echo '<p><b>Last Update</b>		: '.$row->updateddateI.'</p>';
	
	echo '<p><b>Photo</b>			: <img src='.base_url(). 'uploads/' .$row->picture.'></p>';

	
	if ( $status == 3 )
		echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'>Click To Go Lectures</a></p></b>';
	else if ( $status == 2 )
		echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'>Click To Go Lectures</a></p></b>';
	else if ( $status == 0 )
		echo 'You have to login';
	else if ( $status == 1 )
		echo 'You have to buy this course to see the lectures';
	
	}

?>

</div>
