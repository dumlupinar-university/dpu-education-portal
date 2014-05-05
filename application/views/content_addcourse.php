<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
	<center>
		<h1>Add Course</h1>
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('verifycourse')?>
		<table>
			<tr>
				<td><label for="name">Name	:</label></td>
				<td><input type="text" size="20" id="name" name="name" value="<?php echo set_value('name') ?>"/></td>
			</tr>
			<tr>
				<td><label for="picture">Picture	:</label></td>
				<td><input type="file" id="picture" name="picture"/></td>
			</tr>
			<tr>
				<td><label for="description">Description	:</label></td>
				<td><textarea id="description" name="description" cols="30" rows="10" value="<?php echo set_value('description') ?>"></textarea></td>
			</tr>
			<tr>
				<td><label for="creditforthree">CreditForThree	:</label></td>
				<td><input type="text" size="20" id="creditforthree" name="creditforthree" value="<?php echo set_value('creditforthree') ?>"/></td>
			</tr>
			<tr>	
				<td><label for="creditforsix">CreditForSix	:</label></td>
				<td><input type="text" size="20" id="creditforsix" name="creditforsix" value="<?php echo set_value('creditforsix') ?>"/></td>
			</tr>
			<tr>
				<td><label for="creditforyear">CreditForYear	:</label></td>
				<td><input type="text" size="20" id="creditforyear" name="creditforyear" value="<?php echo set_value('creditforyear') ?>"/></td>
			</tr>	
			<tr>
				<td></td>
				<td><input type="submit" value="Add Course"/></td>
			</tr>
		</table>
		<?php echo form_close();?>
	</center>
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
