<div id="content-signin">
	<?php echo form_open('member/add'); ?>
		<div id="head-signin">
			<img src="<?php echo asset_url().'img/LOGO-bfashshop.png'; ?>" />
			<span>Register</span>
			
		</div>
		<div id="hr-shadow"></div>
		<div id="main-signin">
		<label for="e_mail">E-mail</label>
		<input type="text" name="e_mail" value="<?php if(isset($form_e_mail)) echo $form_e_mail; ?>" >
		<br />
		<!--<label for="username">Username</label>
		<input type="text" name="username" >
		<br />-->
		<label for="password">Password</label>
		<input type="password" name="password" >
		<br />
		<label for="confirm_password">Confirm Password</label>
		<input type="password" name="confirm_password" >
		<br />
		
		<input class="button btn-submit" type = "submit" name="register" value="Register"/>
		</div>
	</form>
</div>
