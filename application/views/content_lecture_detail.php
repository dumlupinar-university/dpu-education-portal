<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

<?php

	if ( !empty($result) )
	{

		echo '<h2>Lecture Name : '.$result->nameL.'</h2>';
		 
		echo '<p>Course Name : '.$result->nameC.'</p>';
		
		echo '<p>Lecture Description : '.$result->description.'</p>';
		
		echo '<center><video width="480" height="320" controls>
				<source src='.base_url(). 'videos/' .$result->key.' type="video/mp4">
			</video></center>';
	
	
	
	
	if ( $status == 3 )
	{
		echo '<p><a href='.site_url('manage/lecture_list/').'><img src="'.base_url().'assets/design/btn-back.gif" alt="" /></a></p>';
			
		if ( $result->status == 1 )
		{
			echo '<p><a href='.site_url('manage/deactivate_lecture/'.$result->idL.'').'><img src="'.base_url().'assets/design/btn-delete.gif" alt="" /></a></p>';
		}
		else
		{
			echo '<p><a href='.site_url('manage/activate_lecture/'.$result->idL.'').'><img src="'.base_url().'assets/design/btn-confirm.gif" alt="" /></a></p>';
		}
		
	}
	else
	{
		echo '<p><a href='.site_url('lecture/get_lecture_list/'.$result->idC.'').'><img src="'.base_url().'assets/design/btn-back.gif" alt="" /></a></p>';
	}
	
	}
	
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
