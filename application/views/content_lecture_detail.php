<div id = "content">


<?php

	echo '<h2>Lecture Name : '.$result->name.'</h2>';
	 
	echo '<p>Course Name : '.$result->course.'</p>';
	
	echo '<p>Lecture Description : '.$result->description.'</p>';
	
	echo '<video width="480" height="320" controls>
			<source src='.base_url(). 'videos/' .$result->key.' type="video/mp4">
		</video>';

?>

</div>
