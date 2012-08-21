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
			<?php 
			
			$this->load->helper("form"); 
			
			?>
			<label for="brand_name">Brand Name</label>
			<input name="brand_name" readonly="true" value="<?php echo set_value('brand_name'); ?>" type ="text"/>
			<?php
			echo form_error('brand_name', 
			                '<div class="error-box"> <img id="error-close-button" src="'.asset_url().'img/close_icon.gif" />
							 <span class="error-message">', '</span></div>'); 
			?>
			<br />
			<label for="description">Description</label>
			<textarea name ="description"  ><?php echo set_value('description'); ?></textarea>
			<br />
		    <label for="logo">Logo</textarea>
			<input name="logo"  value="<?php echo set_value('logo'); ?>" type ="file"/>
			<br />
			<?php echo anchor('brand','Cancel' ,'Cancel',array('class' => 'button')); ?>
			<input class="button btn-submit" type = "submit" name="submit" value="Add this brand"/>
			
		</div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>