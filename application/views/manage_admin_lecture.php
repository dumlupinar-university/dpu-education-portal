<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

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
				<td><a href='.site_url('lecture/get_lecture/'.$id.'').'><img src="'.base_url().'assets/design/btn-details.gif" alt="" /></a></td>';
				
				if ( $status == 1 )
				{
					echo '<td><a href='.site_url('manage/deactivate_lecture/'.$id.'').'><img src="'.base_url().'assets/design/btn-delete.gif" alt="" /></a></td>';
				}
				else
				{
					echo '<td><a href='.site_url('manage/activate_lecture/'.$id.'').'><img src="'.base_url().'assets/design/btn-confirm.gif" alt="" /></a></td>';
				}
				
				echo '</tr>';
	
	}

	echo '</table>';
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
