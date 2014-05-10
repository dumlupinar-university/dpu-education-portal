<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

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
				<td><a href='.site_url('course/get_course/'.$id.'').'>Details</a></td>';
				if ( $status == 1 )
				{
					echo '<td><a href='.site_url('manage/deactivate_course/'.$id.'').'><img src="'.base_url().'assets/design/btn-delete.gif" alt="" /></a></td>';
				}
				else
				{
					echo '<td><a href='.site_url('manage/activate_course/'.$id.'').'><img src="'.base_url().'assets/design/btn-confirm.gif" alt="" /></a></td>';
				}
				echo '</tr>';
	
	}

	echo '</table>';
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
