<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Administration Login</h1>
	    <div class="login-message left">
		You need to login before accessing administration functions. Contact an authorized person to gain an account.
	    </div>
	    <div class="right login-box content-left box">		
		<?php echo form_open('authen/login_staff') ?>
		    <h2>Log In</h2>
		    <label for="username">Username</label>
		    <input type = "text" name = "username" class="input-text" />
		    <br />
		    <label for="password">Password</label>
		    <input type="password" name = "password" class="input-text" />
		    <br/>
		    <div class="content-left">
			<input type="submit" value="Log In" class="button"/>
			<span class="remember-password">&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="remember-password"/>&nbsp;
			Stay logged in</span>
		    </div>
		</form>
	    </div>
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>