<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
<?php

	echo '<h2><em>'.$header.'</em></h2>';
	 
	foreach( $list as $row ){
		$id = $row->id;
		$name = $row->name;
		$surname = $row->surname;
		$email = $row->email;
	
	echo '<ul>';
	
	echo '<li><p><a href='.site_url('user/get_teacher/'.$id.'').'/>'.$name.' '.$surname.'</a></p></li>';
	
	echo '</ul>';

	}
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
