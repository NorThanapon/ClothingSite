<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('brand/add');?>
	<h1>Add brand</h1> 
		<div>
			<?php 
			$this->load->helper("form"); 
			echo form_error('brand_name', 
			                '<div id="error-box1" class="error-box"> <img id="error-close-button1" src="'.asset_url().'img/close_icon.gif" />
                                <h3>Notice: </h3>
								<p class="error-message">', '</p></div>'); 
			echo form_error('description', 
							'<div id="error-box2" class="error-box"> <img id="error-close-button2" src="'.asset_url().'img/close_icon.gif" />
                             <h3>Notice: </h3>
							 <p class="error-message">', '</p></div>'); 
			echo form_error('logo', 
							'<div id="error-box3" class="error-box"> <img id="error-close-button3" src="'.asset_url().'img/close_icon.gif" />
                             <h3>Notice: </h3>
							 <p class="error-message">', '</p></div>'); 
			?>
			<label for="brand_name">Brand Name</label>
			<input name="brand_name"  value="<?php echo set_value('brand_name'); ?>" type ="text"/>
			<br />
			<label for="description">Description</label>
			<textarea name ="description"  ><?php echo set_value('description'); ?></textarea>
			<br />
		    <label for="logo">Logo</textarea>
			<input name="logo"  value="<?php echo set_value('logo'); ?>" type ="file"/>
			<br />
			<input class="button" type = "submit" name="submit" value="Add this brand"/>
			<?php echo anchor('brand','Cancel' ,'Cancel'); ?>
		</div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>