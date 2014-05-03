<body>

<ul id ="menu">
		<li><a href="<?php echo site_url('home');?>">Home</a></li>
		<li><a href="<?php echo site_url('user/get_profile');?>">Profile</a>
		<ul>
			<li><a href="<?php echo site_url('user/edit_profile');?>">Edit Profile</a></li>
		</ul></li>
		<li><a href="<?php echo site_url('manage');?>">Manage</a>
			<ul>
				<li><a href="<?php echo site_url('manage/user_list');?>">Manage Users</a></li>
				<li><a href="<?php echo site_url('manage/course_list');?>">Manage Courses</a></li>
				<li><a href="<?php echo site_url('manage/lecture_list');?>">Manage Lectures</a></li>
			</ul>
		</li>
		<li><a href="<?php echo site_url('course');?>">Courses</a></li>
		<li><a href="<?php echo site_url('user/get_teacher_list');?>">Teachers</a></li>
		<li><a href="<?php echo site_url('home/logout');?>">Logout</a></li>
</ul>

