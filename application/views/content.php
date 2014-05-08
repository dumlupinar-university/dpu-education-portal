<?php
	echo '
		<div id="col-top"></div>
		<div id="col" class="box">
		<div id="ribbon"></div>
		<div id="latest-post" class="post">
			
		<div id="col-browser"><a href="#"><img src="'.base_url().'assets/tmp/browser.gif" width="255" height="177" alt="" /></a></div> 
			
		<div id="col-text">
				
		';
	 
	if ( $status == 4 )
	{ 
	echo '				
		<h2 id="slogan span"><span></span>Welcome To Education Portal Of Dumlupinar University !!</h2>
			
			<p>Learn whatever you want from a pro !</p>
					
			<p>This project aims to help anybody who wants to learn something. We - Dumlupinar Universitys Students - hope you will enjoy by learning new things.</p>
					
			<p>It is easy as long as sign-up to have this advantageous.</p>
					
			<p>If you are still searching for register button just <strong><a href='.site_url('register').'>Click Here</a></strong> :) !!</p>

			<p>If you are a member just <strong><a href='.site_url('login').'>Click Here</a></strong> to Login :) ..</p>
			
			<p id="btns">
				<a href='.site_url('login').'><img src="'.base_url().'assets/design/btn-login.gif" alt="" /></a>
				<a href='.site_url('register').'><img src="'.base_url().'assets/design/btn-register.gif" alt="" /></a>
			</p>
		';			
			
	
	}
	else if ( $status == 1 || $status == 2 || $status == 3 )
	{
		if ( !empty($name) && !empty($surname) )
		{
		echo '				
		<h2 id="slogan span"><span></span>Welcome To Education Portal Of Dumlupinar University !!</h2>
			
			<p>'.$name.' '.$surname.'!</p>
			
			<p>Learn whatever you want from a pro !</p>
					
			<p>This project aims to help anybody who wants to learn something. We - Dumlupinar Universitys Students - hope you will enjoy by learning new things.</p>
					
			<p>It is easy as long as sign-up to have this advantageous.</p>
					
			<p>Nice to see you again :) </p>
			
		';		
		}
	}
	else
	{
		die();
	}
	
	echo '	</div>
			</div>
			</div>
			<div id="col-bottom"></div>
			
			<hr class="noscreen" />
			
			<div id="cols3-top"></div>
			
			<div id="cols3" class="box">';
		
			$cols = array(
				'1' => 'col',
				'2' => 'col sec',
				'3' => 'col last'
				);
			
				if ( !empty($lastcourses) )
				{
					$i = 0;
					foreach ($lastcourses as $row)
					{
						$courseId = $row->idC;
						$courseName = $row->nameC;
						$description = $row->description;
						$teacherName = $row->nameU;
						$teacherSurname = $row->surname;
						$teacherId = $row->idU;
						$picture = $row->picture;
						$i++;
						

			 echo ' <div class="'.$cols["$i"].'">

					<h3><a href='.site_url('course/get_course/'.$courseId.'').'>'.$courseName.'</a></h3>
					
						<p class="nom t-center"><a href='.site_url('course/get_course/'.$courseId.'').'><img src="'.base_url().'images/course/'.$picture.'" alt="" /></a></p>

						<div class="col-text">

							<p>'.$description.'</p>
						
							
							<ul class="ul-01">
								<p> Instructors :</p>
								<li><a href='.site_url('user/get_teacher/'.$teacherId.'').'>'.$teacherName.' '.$teacherSurname.'</a></li>
							</ul>

						</div> <!-- /col-text -->

						<div class="col-more"><a href='.site_url('course/get_course/'.$courseId.'').'><img src="'.base_url().'assets/design/cols3-more.gif" alt="" /></a></div>

					</div> <!-- /col -->

					<hr class="noscreen" />';
       
					
				}
						
			}
			
			
		echo '<div id="cols3-bottom"></div>
		
				<hr class="noscreen" />';
?>
		
		
		
