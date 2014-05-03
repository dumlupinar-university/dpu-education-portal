<div id=content>

<?php

	echo '<h2><em>'.$header.'</em></h2>';
	 
	foreach( $list as $row ){
		$id = $row->id;
		$name = $row->name;
		$surname = $row->surname;
		$email = $row->email;
	
	echo '<ul>';
	
	echo '<li><a href='.site_url('user/get_teacher/'.$id.'').'/>'.$name.' '.$surname.'</a></li>';
	
	echo '</ul>';

	}
?>


</div>
