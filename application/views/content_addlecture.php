<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
	<center>
		<h1>Add Lecture</h1>
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('verifylecture')?>
		<table>
			<tr>
				<td><label for="course">Course :</label></td>
				<td><input type="text" id="course" name="course" value='<?php echo $course;?>'</td>
			</tr>	
			<tr>
				<td><label for="name">Name	:</label></td>
				<td><input type="text" size="20" id="name" name="name" value="<?php echo set_value('name') ?>"/></td>
			</tr>
			<tr>
				<td><label for="video">Video	:</label></td>
				<td><input type="file" id="video" name="video"/></td>
			</tr>
			<tr>
				<td><label for="description">Description	:</label></td>
				<td><textarea id="description" name="description" cols="30" rows="10" value="<?php echo set_value('description') ?>"></textarea></td>
			</tr>	
			<tr>
				<td></td>
				<td><input type="submit" value="Add Lecture"/></td>
			</tr>
		</table>
		<?php echo form_close();?>
	</center>
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
