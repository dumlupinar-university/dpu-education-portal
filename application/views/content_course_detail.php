<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
<?php

	echo'<p><em><h2>Course</h2></em></p>';
	
	if ( !empty($results) ) {
		
		foreach($results as $row){
		
			$id = $row->id;
			
		echo '<div id="image"><img src='.base_url(). 'images/course/' .$row->picture.'></div>';
			
		echo '<p><b>Name</b>			: '.$row->nameC.'</p>';
		
		echo '<p><b>Description</b>		: '.$row->description.'</p>';
		 
		echo '<p><b>Instructor</b>		: <a href='.site_url('user/get_teacher/'.$row->idU.'').'>'.$row->nameU.' '.$row->surname.'</a></p>';
		
		echo '<p><b>Create Date</b>		: '.$row->createddate.'</p>';
		
		echo '<p><b>Last Update</b>		: '.$row->updateddateI.'</p>';
		
		
		if ( $status == 2 )
		{
			if ( !empty($pointofuser) )
			{
				echo '<p><b>You have rated the course with </b> : '.$pointofuser.' <b>points</b></p>';
			}
			else
			{
				echo '<p><b>You have not rated the course yet</b></p>';
			}
		}
		
		
			
			if ( $status == 3 )
			{
				echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'><img src="'.base_url().'assets/design/btn-gotolectures.gif" alt="" /></a></p></b>';
			}
			else if ( $status == 2 )
			{
				echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'><img src="'.base_url().'assets/design/btn-gotolectures.gif" alt="" /></a></p></b>';
			}
			else if ( $status == 4 )
			{
				echo '<p><b><a href='.site_url('login').'><img src="'.base_url().'assets/design/btn-login.gif" alt="" /></a></b></p>';
			}
			else if ( $status == 1 )
			{
				if ( !empty($prizes) )
				{
					foreach($prizes as $row )
					{
						echo '<p><b><a href='.site_url('course/buy_course/'.$id.'/3').'><img src="'.base_url().'assets/design/btn-buyfor3months.gif" alt="" /> Only '.$row->creditforthree.' Credits</a></b></p>';
						echo '<p><b><a href='.site_url('course/buy_course/'.$id.'/6').'><img src="'.base_url().'assets/design/btn-buyfor6months.gif" alt="" /> Only '.$row->creditforsix.' Credits</a></b></p>';
						echo '<p><b><a href='.site_url('course/buy_course/'.$id.'/12').'><img src="'.base_url().'assets/design/btn-buyforayear.gif" alt="" /> Only '.$row->creditforyear.' Credits</a></b></p>';
					}
				}
			}
		
		}
	}
	
	if ( $status == 3 )
	{
	
		if ( !empty($nonresults) )
		{
			foreach($nonresults as $row)
			{
				$id = $row->id;
				
				echo '<div id="image"><img src='.base_url(). 'images/course/' .$row->picture.'></div>';
				
				echo '<p><b>Name</b>			: '.$row->nameC.'</p>';
			
				echo '<p><b>Description</b>		: '.$row->description.'</p>';
				
				echo '<p><b>Instructor</b>		: <a href='.site_url('user/get_teacher/'.$row->idU.'').'>'.$row->nameU.' '.$row->surname.'</a></p>';
			
				echo '<p><b>Create Date</b>		: '.$row->createddate.'</p>';
			
				echo '<p><b>Last Update</b>		: '.$row->updateddateI.'</p>';
			
				
				if ( $status == 3 )
				{
					echo '<p><b><a href='.site_url('lecture/get_lecture_list/'.$row->id.'').'><img src="'.base_url().'assets/design/btn-gotolectures.gif" alt="" /></a></p></b>';
				}
			
			}
			
			
		}
	}
	
	echo'<p><em><h2>Comments</h2></em></p>';
	
	if ( !empty($comments) )
	{
		
		foreach($comments as $row)
		{
			
			echo '<p><b>Comment				: '.$row->comment.'</b></p>';
			
			echo '<p><b>Date</b>		: '.$row->date.'</p>';
			
			echo '<p><b>Author</b>			: '.$row->name.' '.$row->surname.'</p>';		
			
		}
			
		
	}
	
	if ( $status == 2 || $status == 3 )
	{
		echo '<p><b><a href='.site_url('course/add_comment/'.$courseId.'').'><img src="'.base_url().'assets/design/btn-addcomment.gif" alt="" /></a></b></p>';
	}

?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
