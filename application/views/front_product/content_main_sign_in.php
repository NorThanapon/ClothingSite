<!DOCTYPE html>
<html>
    <head>
        <?php include('common/head.php'); ?>
    </head>
    <body>
        <div class="wrapper">        
			<?php echo form_open('registration/sign_in'); ?>
				<div id="content-signin">	
					<h1>Registration</h1> 
					<label for="username">Username</label>
					<input type="text" name="username" />
					<br />
					<label for="password">Password</label>
					<input type="password" name="password" />
					<br />
					<input class="button btn-submit" type = "submit" name="submit" value="submit"/>
				</div>
			</form>
		</div>		
	</body>
</html>