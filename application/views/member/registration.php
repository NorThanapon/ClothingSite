<div id="content-signin">
	<?php echo form_open('member/add'); ?>
		<div id="head-register">
			
			<?php echo anchor(base_url(), '<img src='.asset_url().'img/bfashshop.jpg />', 'title="BfashShop"'); ?>
			<span>Register</span>
			
		</div>
		<div id="main-sigin-image">
		</div>
		<div id="main-signin">
		<label for="e_mail">E-mail</label>
		<input type="text" name="e_mail" value="<?php if(isset($form_e_mail)) echo $form_e_mail; ?>" />
		<?php if(isset($show_message_e_mail))echo "<h1>".$show_message_e_mail."</h1>";?>
		<br />
		<label for="confirm_e_mail">Confirm E-mail</label>
		<input type="text" name="confirm_e_mail" value="<?php if(isset($form_confirm_e_mail)) echo $form_confirm_e_mail; ?>" />
		<br />
		<!--<label for="username">Username</label>
		<input type="text" name="username" >
		<br />-->
		<label for="password">Password</label>
		<input type="password" name="password" />
		<?php if(isset($show_message_password))echo "<h1>".$show_message_password."</h1>";?>
		<br />
		<label for="confirm_password">Confirm Password</label>
		<input type="password" name="confirm_password" >
		<br />
		
		<input class="button btn-submit" type = "submit" name="register" value="Register"/>
		</div>
	</form>
</div>
