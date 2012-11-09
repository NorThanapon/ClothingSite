<div id="content-signin">

			<div id="head-signin">
			<img src="<?php echo asset_url().'img/LOGO-bfashshop.png'; ?>" />
		    <span>Log In</span>
			</div>
			<div id="hr-shadow"></div>
			<div id="main-signin">
<?php echo form_open('authen/login_member') ?>
		    <label for="e_mail">Email</label>
		    <input type = "text" name = "e_mail" class="input-text" value="<?php if(isset($form_e_mail))echo $form_e_mail ;?>" />
		    <br />
		    <label for="password">Password</label>
		    <input type="password" name = "password" class="input-text" />
		    <br/>
		    <div class="content-left">
			<span class="remember-password">
			<input type="checkbox" name="remember-password"/>
			Stay logged in</span>
			<input type="submit" value="Log In" class="button"/>
			</div>
		  
			
</form>
	 
		
		
		<a href="javascript:void(0)" class="forget_password" title="Thai">Forgotten Password</a>
<!--<?php //echo form_open('member/forget_password') ?>	-->	
		<div id="forget_password_view" >
			<label for="e_mail" >Email</label>
		    <input type = "text" name = "e_mail_send_password" class="input-text" id="e_mail_send_password"
			value="<?php if(isset($form_e_mail_send_password))echo $form_e_mail_send_password;?>" />
		    <input type="submit" value="Send Password" class="button" id="send_email"/>
			</div>
		</div>
</div>
<!--</form>-->
<?php $this->load->view('common/confirm_box_ok');?>	 

<script type="text/javascript">
	$(document).ready(function() {
		//add confirm event for delete button
		$('a.forget_password').click(function() {			
			$("#forget_password_view").css("display","inline-block");	 			
		});
		$('#send_email').click(function() {			
			$.ajax({
					type: 'POST',
					url: "<?php echo base_url('member/forget_password');?>",//controller path; go function
					data:  { e_mail_send_password: $('#e_mail_send_password').val(), // set data variable and assign value from body
						   },
					success: function( data ) { // if succes do something ;data is returned
						//alert(data);						
						confirm('Please enter the information',data,this.href);
						return false;							
					}				
				});	
		});
		
		
	});
</script>