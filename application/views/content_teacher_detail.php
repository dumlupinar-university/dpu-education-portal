<div id = "content">


<?php

	foreach( $results as $row )
	{
		$name = $row->name;
		$surname = $row->surname;
		$email = $row->email;
	}

	echo '<p><h2><em>Instructor</em></h2></p>';
	
	echo '<p>Name : '.$name.'</p>';
	 
	echo '<p>Sunarme :'.$surname.'</p>';
	
	echo '<p>Email :'.$email.'</p>';

	echo '<p><h2><em>Instructors Courses</h2></em></p>';

	echo '<ul>';
	
	foreach( $courses as $row )
	{
		
		echo '<li><a href='.site_url('course/get_course/'.$row->id.'').'/>'.$row->name.'</a></li>';
		
	}
	
	echo'</ul>';
?>

</div>
