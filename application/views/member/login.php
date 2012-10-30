<?php echo form_open('authen/login_member') ?>
		    <h2>Log In</h2>
		    <label for="e_mail">Email</label>
		    <input type = "text" name = "e_mail" class="input-text" value="<?php if(isset($form_e_mail))echo $form_e_mail ;?>" />
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
			<?php if(isset($show_message_login))echo "<h1>".$show_message_login."</h1>";?>
		</form>
	    </div>
		<a href="javascript:void(0)" class="forget_password" title="Thai">Forgotten Password</a>
<?php echo form_open('member/forget_password') ?>		
		<div id="forget_password_view" style="visibility: hidden;" >
			<label for="e_mail">Email</label>
		    <input type = "text" name = "e_mail_send_password" class="input-text" 
			value="<?php if(isset($form_e_mail_send_password))echo $form_e_mail_send_password;?>" />
		    <input type="submit" value="Send Password" class="button"/>
			<?php if(isset($show_message))echo "<h1>".$show_message."</h1>";?>
		</div>
</form>

		 
<?php $this->load->view('common/admin_footer');?>
<script type="text/javascript">
	$(document).ready(function() {
		//add confirm event for delete button
		$('a.forget_password').click(function() {			
			$("#forget_password_view").css("visibility","visible");	 			
		});			
	});
</script>