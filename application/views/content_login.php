<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">
	<center>
		<h2>Login</h2>
		<?php echo validation_errors(); ?>
		<?php echo form_open('verifylogin'); ?>
		<table>
			<tr>
				<td><label for="email">Email</label></td>
				<td>:<input type="text" size="20" id="email" name="email"/></td>
			</tr>
		
			<tr>
				<td><label for="password">Password</label></td>
				<td>:<input type="password" size="20" id="password" name="password"/></td>
			</tr>
	
			<tr>
				<td></td>
				<td><input type="submit" value="Login"/></td>
			</tr>
		</table>
		</center>
	<?php echo form_close();?>
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
