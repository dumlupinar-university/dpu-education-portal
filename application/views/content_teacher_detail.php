<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

<?php
	if ( !empty($results) )
	{

		foreach( $results as $row )
		{
			$name = $row->name;
			$surname = $row->surname;
			$email = $row->email;
			$photo = $row->photo;
		}
	
		echo '<div id="image"><img src='.base_url(). 'images/profile/' .$photo.'></div>';
		
		echo '<p><h2><em>Instructor</em></h2></p>';
		
		echo '<p>Name : '.$name.'</p>';
		 
		echo '<p>Surname :'.$surname.'</p>';
		
		echo '<p>Email :'.$email.'</p>';

		echo '<p><h2><em>Instructors Courses</h2></em></p>';

		echo '<ul>';
	
	}
	
	if ( !empty($courses) )
	{
		foreach( $courses as $row )
		{
			
			echo '<li><a href='.site_url('course/get_course/'.$row->idC.'').'/>'.$row->nameC.'</a></li>';
			
		}
		
		echo'</ul>';
		
	}
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
