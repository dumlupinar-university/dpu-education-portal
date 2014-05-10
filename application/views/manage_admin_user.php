<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

<?php

	echo '<h2><em>'.$header.'</em></h2>';

	echo '<table>';

	foreach ( $list as $row )
	{
		$id = $row->id;
		$name = $row->name;
		$surname = $row->surname;
		$email = $row->email;
		$authority = $row->authority;

	
		echo '<tr>
				<td>'.$id.'</td>
				<td>'.$name.'</td>
				<td>'.$surname.'</td>
				<td>'.$email.'</td>
				<td>'.$authority.'</td>
				<td><a href='.site_url('user/get_user/'.$id.'').'><img src="'.base_url().'assets/design/btn-details.gif" alt="" /></a></td>
				</tr>';
	
	}

	echo '</table>';
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
