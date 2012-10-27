<?php echo form_open('authen/login_member') ?>
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