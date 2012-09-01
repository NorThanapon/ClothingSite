<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/product/photo_management/'.$product->product_id); ?>
	    <h1>Photo Management</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Management</legend>
			
			<br />
		</fieldset>
	    </div>
	    <div class="content-right form-action">
		<?php echo anchor('admin/product','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change/>
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>