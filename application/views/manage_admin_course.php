
<div id=content>

<?php

	echo '<h2><em>'.$header.'</em></h2>';

	echo '<table>';

	foreach ( $list as $row )
	{
		$id = $row->idC;
		$teacherid = $row->idU;
		$name = $row->nameC;
		$teacher = $row->nameU;
		$teacherSurname = $row->surname;
		$status = $row->status;

	
		echo '<tr>
				<td>'.$id.'</td>
				<td>'.$name.'</td>
				<td><a href='.site_url('user/get_teacher/'.$teacherid.'').'>'.$teacher.''.$teacherSurname.'</td>
				<td>'.$status.'</td>
				<td><a href='.site_url('course/get_course/'.$id.'').'>Details</a></td>
				</tr>';
	
	}

	echo '</table>';
?>


</div>
