<div id = "content">


<?php

	echo'<p><em><h2>Course</h2></em></p>';
	if ( !empty($results) ) {
		
		foreach($results as $row){
		
			$id = $row->id;
			
		echo '<p><b>Name</b>			: '.$row->nameC.'</p>';
		
		echo '<p><b>Description</b>		: '.$row->description.'</p>';
		 
		echo '<p><b>Instructor</b>		: <a href='.site_url('user/get_teacher/'.$row->idU.'').'>'.$row->nameU.' '.$row->surname.'</a></p>';
		
		echo '<p><b>Create Date</b>		: '.$row->createddate.'</p>';
		
		echo '<p><b>Last Update</b>		: '.$row->updateddateI.'</p>';
		
		echo '<p><b>Photo</b>			: <img src='.base_url(). 'uploads/' .$row->picture.'></p>';

			
			if ( $status == 3 )
			{
				echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'>Click To Go Lectures</a></p></b>';
			}
			else if ( $status == 2 )
			{
				echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'>Click To Go Lectures</a></p></b>';
			}
			else if ( $status == 0 )
			{
				echo '<p><b><a href='.site_url('login').'>Click here to Login</a></b></p>';
			}
			else if ( $status == 1 )
			{
				if ( !empty($prizes) )
				{
					foreach($prizes as $row )
					{
						echo '<p><b><a href='.site_url('course/buy_course/'.$id.'/3').'>Click To Buy This Lecture For Three Months Only For '.$row->creditforthree.' Credits</a></b></p>';
						echo '<p><b><a href='.site_url('course/buy_course/'.$id.'/6').'>Click To Buy This Lecture For Six Months '.$row->creditforsix.' Credits</a></b></p>';
						echo '<p><b><a href='.site_url('course/buy_course/'.$id.'/12').'>Click To Buy This Lecture For Twelve Months '.$row->creditforyear.' Credits</a></b></p>';
					}
				}
			}
		
		}
	}

?>

</div>
