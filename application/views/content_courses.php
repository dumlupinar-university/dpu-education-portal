<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
<?php

	echo '<h2><em>'.$header.'</em></h2>';
	
	if ( !empty($results) )
	{
		echo '<ul>';
		
		foreach( $results as $row )
		{
			$courseid = $row->idC;
			$coursename = $row->nameC;
			$teacherId = $row->idU;
			$teacherName = $row->nameU;
			$teacherSurname = $row->surname;
			$description = $row->description;
			$picture = $row->picture;
			
		
		
		echo ' <li><p><a href='.site_url('course/get_course/'.$courseid.'').'/>'.$coursename.'</a></p>
				   <p>Description : '.$description.'</p>
				   <p>Instructor : <a href='.site_url('user/get_teacher/'.$teacherId.'').'/>'.$teacherName.' '.$teacherSurname.'</a></p>
				</li>';
		
		
		}
		echo '</ul>';
		
	}
	
	if ( !empty($nonresults) )
	{
		echo '<h2><em>Not Confirmed Courses</em></h2>';
		
		echo '<ul>';
		
		foreach( $nonresults as $row )
		{
			$courseid = $row->idC;
			$coursename = $row->nameC;
			$teacherId = $row->idU;
			$teacherName = $row->nameU;
			$teacherSurname = $row->surname;
			$description = $row->description;
			$picture = $row->picture;
		
		echo ' <li><p><a href='.site_url('course/get_course/'.$courseid.'').'/>'.$coursename.'</a></p>
				   <p>Description : '.$description.'</p>
				   <p>Instructor : <a href='.site_url('user/get_teacher/'.$teacherId.'').'/>'.$teacherName.' '.$teacherSurname.'</a></p>
				</li>';
		
		
		}
		echo '</ul>';
		
	}
	
	
?>
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />





