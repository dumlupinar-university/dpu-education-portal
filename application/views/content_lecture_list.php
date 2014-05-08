<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
<?php

	echo '<h2><em>'.$header.'</em></h2>';
	
	if ( !empty($results) )
	{ 
		foreach( $results as $row ){
			$id = $row->id;
			$name = $row->name;
			$course = $row->course;
			$description = $row->description;
			
		echo '<ul>';
		
		echo ' <li><a href='.site_url('lecture/get_lecture/'.$id.'').'>'.$name.' '.$description.'</a></li>';
		
		echo '</ul>';
		}

	}
	
	if ( $lecstatus == 3 )
	{
		if ( !empty($nonresults) )
		{
			echo '<h2><em>Not Confirmed Lessons List</em></h2>';
				
			foreach( $nonresults as $row ){
				$id = $row->id;
				$name = $row->name;
				$course = $row->course;
				$description = $row->description;
			
			echo '<ul>';
		
			echo ' <li><a href='.site_url('lecture/get_lecture/'.$id.'').'>'.$name.' '.$description.'</a></li>';
		
			echo '</ul>';
			}
				
		}
		echo '<p><a href='.site_url('lecture/add_lecture/'.$courseId.'').'><img src="'.base_url().'assets/design/btn-addnewlecture.gif" alt="" /></a></p>';
	}
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
