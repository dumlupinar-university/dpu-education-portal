<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
	<center>
		<h2>Edit Profile</h2>
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('verifyprofile'); ?>
			<table>
				<tr>
					<td><label for="Skype">Skype</label></td>
					<td>:<input type="text" size="20" id="skype" name="skype" value="<?php echo set_value('skype') ?>"/></td>
				</tr>
				<tr>
					<td><label for="Facebook">Facebook</label></td>
					<td>:<input type="text" size="20" id="facebook" name="facebook" value="<?php echo set_value('facebook') ?>"/></td>
				</tr>
				<tr>
					<td><label for="Phone">Phone</label></td>
					<td>:<input type="text" size="20" id="phone" name="phone" value="<?php echo set_value('phone') ?>"/></td>
				</tr>
				<tr>
					<td><label for="Birthday">Birthday</label></td>
					<td>:<input type="text" size="20" id="birthday" name="birthday" value="<?php echo set_value('birthday') ?>"/></td>
				</tr>
				<tr>
					<td><label for="Description">Description</label></td>
					<td>:<textarea id="description" name="description" cols="30" rows="10" value="<?php echo set_value('description') ?>"></textarea></td>
				</tr>
				<tr>
					<td><label for="Address">Address</label></td>
					<td>:<textarea id="address" name="address" cols="30" rows="10" value="<?php echo set_value('address') ?>"></textarea></td>
				</tr>
				<tr>
					<td><label for="Photo">Photo</label></td>
					<td>:<input type="file" id="photo" name="photo"/></td>
				</tr>
				<tr>
					<td><label for="Cv">Cv</label></td>
					<td>:<input type="file" id="cv" name="cv"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Edit Profile"/></td>
				</tr>
			</table>
		</center>
	<?php echo form_close();?>
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
