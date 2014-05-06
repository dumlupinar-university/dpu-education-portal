<div id="col-top"></div>
<div id="col" class="box">
<div id="lastest-post">

	<center>
		<h2>Become A Teacher</h2>
		<?php echo validation_errors(); ?>
		<?php echo form_open('verifyteacher'); ?>
			<table>
				<tr>
					<td><label for="cv">Cv</label></td>
					<td>:<input type="file" id="cv" name="cv"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Become A Teacher"/></td>
				</tr>
			</table>
		<?php echo form_close();?>
	</center>
			
</div>
</div>

<div id="col-bottom"></div>
<hr class="noscreen" />
