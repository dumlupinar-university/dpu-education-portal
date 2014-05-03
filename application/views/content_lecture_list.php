<div id = "content">


<?php

	echo '<h2><em>'.$header.'</em></h2>';
	 
	foreach( $results as $row ){
		$id = $row->id;
		$name = $row->name;
		$course = $row->course;
		$description = $row->description;
		
	echo '<ul>';
	
	echo ' <li><a href='.site_url('lecture/get_lecture/'.$id.'').'>'.$name.' '.$description.'</a></li>';
	
	echo '</ul>';
	}

	if ( $status == 3 )
	{
		echo '<p><a href='.site_url('lecture/add_lecture/'.$course.'').'>Click Here To Add New Lectures</a></p>';
	}
	
?>

</div>
