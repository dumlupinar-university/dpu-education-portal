<body>

<ul id ="menu">
		<li><a href="<?php echo site_url('home');?>">Home</a></li>
		<li><a href="<?php echo site_url('user/get_profile');?>">Profile</a></li>
		<li><a href="<?php echo site_url('manage');?>">Manage</a>
			<ul>
				<li><a href="<?php echo site_url('user/get_user_list');?>">Manage Users</a></li>
				<li><a href="">Manage Courses</a></li>
				<li><a href="">Manage Lectures</a></li>
			</ul>
		</li>
		<li><a href="<?php echo site_url('course');?>">Courses</a>
			<ul>
				<li><a href="<?php echo site_url('course/add_course');?>">Add Course</a></li>
			</ul>
		</li>
		<li><a href="<?php echo site_url('user/get_teacher_list');?>">Teachers</a></li>
		<li><a href="<?php echo site_url('home/logout');?>">Logout</a></li>
</ul>

