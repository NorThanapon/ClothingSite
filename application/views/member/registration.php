<<<<<<< HEAD
<?php echo form_open('member/add'); ?>
<h1>Registration</h1> 
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
<input class="button btn-submit" type = "submit" name="submit" value="submit"/>
</form>
<?php echo "error:".$error;?>
=======
<!DOCTYPE html>
<html>
    <head>
        <?php include('common/head.php'); ?>
    </head>
    <body>
        <div class="wrapper">
			<?php echo form_open('member/add'); ?>
			<h1>Registration</h1> 
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
			<input class="button btn-submit" type = "submit" name="submit" value="submit"/>
			</form>
		</div>
	</body>
</html>
>>>>>>> CSS Register
