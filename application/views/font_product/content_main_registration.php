<?php echo form_open('member/add'); ?>
<h1>Registration</h1> 
<label for="name">E-mail</label>
<input type="text" name="e_mail" >
<br />
<label for="username">Username</label>
<input type="text" name="username" >
<br />
<label for="password">Password</label>
<input type="password" name="password" >
<br />
<label for="confirm_password">Confirm Password</label>
<input type="password" name="confirm_password" >
<br />
<input class="button btn-submit" type = "submit" name="submit" value="submit"/>
</form>