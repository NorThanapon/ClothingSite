<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
		<?php echo form_open('authen/login_staff') ?>
			<table border="1">
				<tr>
					<td>Username:</td>
					<td><input type = "text" name = "username" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type = "password" name = "password" /></td>
				</tr>
				<tr>
					<td colspan = "2">
						<input type = "submit" value = "Login"/>
					</td>
				</tr>
			</table>
		</form>
	
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>