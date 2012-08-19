<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open_multipart('brand/add');?>
	<h1>Add brand</h1> 
		<div>
			<label for="brand_name">Brand Name</label>
			<input name="brand_name" type ="text"/>
			<br />
			<label for="description">Description</label>
			<textarea name ="description"></textarea>
			<br />
		    <label for="logo">Logo</textarea>
			<input name="logo" type ="file"/>
			<br />
			<input type = "submit" name="submit" value="submit"/>
			<input type = "submit" name="cancel" value="Cancel" />
		</div>
		
		    
		
	  
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>