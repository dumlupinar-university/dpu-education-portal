<body>

<ul id="menu">
		<li><a href="<?php echo site_url('home');?>">Home</a></li>
		<li><a href="<?php echo site_url('user/get_profile');?>">Profile</a>
		<ul>
			<li><a href="<?php echo site_url('user/edit_profile');?>">Edit Profile</a></li>
		</ul></li>
		<li><a href="<?php echo site_url('course');?>">Courses</a>
		<ul>
			<li><a href="<?php echo site_url('course');?>">Course List</a>
			<li><a href="<?php echo site_url('course/purchased');?>">Purchased Courses</a></li>
		</ul></li>
		<li><a href="<?php echo site_url('user/get_teacher_list');?>">Teachers</a>
		<ul>
			<li><a href="<?php echo site_url('user/become_teacher');?>">Become A Teacher</a></li>
		</ul></li>
		<li><a href="<?php echo site_url('home/logout');?>">Logout</a></li>
</ul>
