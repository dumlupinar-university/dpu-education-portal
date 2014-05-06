<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

	<p>Course Has Been Done Bought Successfull :</p>
	<p>Validation Date :<?php echo $validate; ?></p>
	<p>Buying Date :<?php echo $buyingdate ?></p>
	<p>Prize :<?php echo $courseCredit ?></p>
	<p>Your Credit :<?php echo ($userCredit - $courseCredit) ?></p>


	<a href="<?php echo site_url('course/get_course/'.$course.'');?>">Click Here To Go To Course Page</a>
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
