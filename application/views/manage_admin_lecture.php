
<div id=content>

<?php

	echo '<h2><em>'.$header.'</em></h2>';

	echo '<table>';

	foreach ( $list as $row )
	{
		$id = $row->id;
		$name = $row->nameL;
		$course = $row->nameC;
		$description = $row->description;
		$status = $row->status;
		$key = $row->key;

	
		echo '<tr>
				<td>'.$id.'</td>
				<td>'.$name.'</td>
				<td>'.$course.'</td>
				<td>'.$description.'</td>
				<td>'.$key.'</td>
				<td>'.$status.'</td>
				<td><a href='.site_url('lecture/get_lecture/'.$id.'').'>Details</a></td>
				</tr>';
	
	}

	echo '</table>';
?>


</div>
