<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
	
	<h1>Lecture Has Been Done Successfully With Informations :</h1>
	<h2>Name    :<?php echo $name; ?></h1>
	<p>The Video:</p>
	<video width="480" height="320" controls>
		<source src="<?=base_url(). 'videos/' . $key;?>" type="video/mp4">
	</video>
	<h2>Description   :<?php echo $description; ?></h1>

</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
