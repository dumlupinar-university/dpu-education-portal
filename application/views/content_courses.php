<div id = "content">


<?php

	echo '<h2><em>Courses</em></h2>';
	 
	foreach( $results as $row ){
		
		$id = $row->id;
		$name = $row->name;
		
	echo '<ul>';
	
	echo ' <li><a href='.site_url('course/get_course/'.$id.'').'/>'.$name.'</a></li>';
	
	echo '</ul>';
	}

	
	
?>

</div>
