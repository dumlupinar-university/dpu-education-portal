<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

<?php

	echo '<h2><em>Welcome To Admin Manage Panel</em></h2>';
	
	if ( !empty($courses) )
	{
		echo '<h2><em>Unconfirmed Courses</em></h2>';

		echo '<table>';

		foreach ( $courses as $row )
		{
			$id = $row->idC;
			$teacherid = $row->idU;
			$name = $row->nameC;
			$teacher = $row->nameU;
			$teacherSurname = $row->surname;
		
			echo '<tr>
					<td>'.$id.'</td>
					<td>'.$name.'</td>
					<td><a href='.site_url('user/get_teacher/'.$teacherid.'').'>'.$teacher.''.$teacherSurname.'</td>
					<td><a href='.site_url('course/get_course/'.$id.'').'><img src="'.base_url().'assets/design/btn-details.gif" alt="" /></a></td>
					<td><a href='.site_url('manage/activate_course/'.$id.'').'><img src="'.base_url().'assets/design/btn-confirm.gif" alt="" /></a></td>
					</tr>';
		
		}

		echo '</table>';
	}
	
	if ( !empty($lectures) )
	{
		echo '<h2><em>Unconfirmed Lectures</em></h2>';

		echo '<table>';

		foreach ( $lectures as $row )
		{
			$id = $row->idL;
			$name = $row->nameL;
			$course = $row->nameC;
			$idC = $row->idC;
			$description = $row->description;
			$key = $row->key;

	
			echo '<tr>
				<td>'.$id.'</td>
				<td>'.$name.'</td>
				<td>'.$course.'</td>
				<td>'.$description.'</td>
				<td>'.$key.'</td>
				<td><a href='.site_url('lecture/get_lecture/'.$id.'').'><img src="'.base_url().'assets/design/btn-details.gif" alt="" /></a></td>
				<td><a href='.site_url('manage/activate_lecture/'.$id.'').'><img src="'.base_url().'assets/design/btn-confirm.gif" alt="" /></a></td>
				</tr>';
		
		}

		echo '</table>';
	}
	
	if ( !empty($users) )
	{
		echo '<h2><em>Unconfirmed Teachers</em></h2>';

		echo '<table>';

		foreach ( $users as $row )
		{
			$id = $row->user;
			$cv = $row->cv;

	
			echo '<tr>
				<td>'.$id.'</td>
				<td>'.$cv.'</td>
				<td><a href='.site_url('user/get_user/'.$id.'').'><img src="'.base_url().'assets/design/btn-details.gif" alt="" /></a></td>
				<td><a href='.site_url('manage/activate_teacher/'.$id.'').'><img src="'.base_url().'assets/design/btn-confirm.gif" alt="" /></a></td>
				</tr>';

		}

		echo '</table>';
	}
	
	
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
