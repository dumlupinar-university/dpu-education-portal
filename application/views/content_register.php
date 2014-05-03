<div id ="content" >
	<center>
		<h2>Register</h2>
		<?php echo validation_errors(); ?>
		<?php echo form_open('verifyregister'); ?>
			<table>
				<tr>
					<td><label for="name">Name</label></td>
					<td>:<input type="text" size="20" id="name" name="name"/></td>
				</tr>
				<tr>
					<td><label for="surname">Surname</label></td>
					<td>:<input type="text" size="20" id="surname" name="surname"/></td>
				</tr>
				<tr>
					<td><label for="email">Email</label></td>
					<td>:<input type="text" size="20" id="email" name="email"/></td>
				</tr>
				<tr>
					<td><label for="con_email">Email Confirmation</label></td>
					<td>:<input type="text" size="20" id="con_email" name="con_email"/></td>
				</tr>
				<tr>
					<td><label for="password">Password</label></td>
					<td>:<input type="password" size="20" id="passowrd" name="password"/></td>
				</tr>
				<tr>
					<td><label for="con_password">Password Confirmation</label></td>
					<td>:<input type="password" size="20" id="con_passowrd" name="con_password"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Register"/></td>
				</tr>
			</table>
		</center>
	<?php echo form_close();?>
</div>
