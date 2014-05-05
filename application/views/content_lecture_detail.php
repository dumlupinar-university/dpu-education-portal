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
	}
?>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
