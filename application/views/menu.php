<div id="tray">
	
	<?php
		if ( !empty($status) )
		{
			echo ' <li><a id="tray-active" href='.site_url('home').'>Home</a></li>';
			
			if ( $status == 4 )
			{
				echo ' 
				<li><a href='.site_url('course').'>Courses</a></li>
				<li><a href='.site_url('user/get_teacher_list').'>Teachers</a></li>
				<li><a href='.site_url('login').'>Login</a></li>
				<li><a href='.site_url('register').'>Register</a></li>';
			}
			else if ( $status == 1 )
			{
				echo ' 
				<li><a href='.site_url('user/get_profile').'>Profile</a>
				<ul>
					<li><a href='.site_url('user/edit_profile').'>Edit Profile</a></li>
				</ul></li>
				<li><a href='.site_url('course').'>Courses</a>
				<ul>
					<li><a href='.site_url('course').'>Course List</a>
					<li><a href='.site_url('course/purchased').'>Purchased Courses</a></li>
				</ul></li>
				<li><a href='.site_url('user/get_teacher_list').'>Teachers</a>
				<ul>
					<li><a href='.site_url('user/become_teacher').'>Become A Teacher</a></li>
				</ul></li>
				<li><a href='.site_url('home/logout').'>Logout</a></li>';
			}
			else if ( $status == 2 )
			{
				echo '
				<li><a href='.site_url('user/get_profile').'>Profile</a>
				<ul>
					<li><a href='.site_url('user/edit_profile').'>Edit Profile</a></li>
				</ul></li>
				<li><a href='.site_url('course').'>Courses</a>
				<ul>
					<li><a href='.site_url('course').'>Course List</a>
					<li><a href='.site_url('course/add_course').'>Add Course</a></li>
					<li><a href='.site_url('course/my_courses').'>My Courses</a></li>
					<li><a href='.site_url('course/purchased').'>Purchased Courses</a></li>
				</ul></li>
				<li><a href='.site_url('user/get_teacher_list').'>Teachers</a></li>
				<li><a href='.site_url('home/logout').'>Logout</a></li>';
			}
			else if ( $status == 3 )
			{
				echo ' 
				<li><a href='.site_url('user/get_profile').'>Profile</a>
				<ul>
					<li><a href='.site_url('user/edit_profile').'>Edit Profile</a></li>
				</ul></li>
				<li><a href='.site_url('manage').'>Manage</a>
				<ul>
					<li><a href='.site_url('manage/user_list').'>Manage Users</a></li>
					<li><a href='.site_url('manage/course_list').'>Manage Courses</a></li>
					<li><a href='.site_url('manage/lecture_list').'>Manage Lectures</a></li>
				</ul></li>
				<li><a href='.site_url('course').'>Courses</a></li>
				<li><a href='.site_url('user/get_teacher_list').'>Teachers</a></li>
				<li><a href='.site_url('home/logout').'>Logout</a></li>';
			}
			else
			{
				die();
			}
			
			echo '
				<div id="search" class="box">
					<form action="#" method="get">
						<div class="box">
							<div id="search-input"><span class="noscreen">Search:</span><input type="text" size="30" name="" value="Search" /></div>
							<div id="search-submit"><input type="image" src="'.base_url().'assets/design/search-submit.gif" value="OK" /></div>
						</div>
					</form>
				</div>	';
		}
	?>
	<hr class="noscreen" />
</div>

