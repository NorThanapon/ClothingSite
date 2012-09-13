<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	
	<!--<?php echo form_open('admin/product/delete_batch'); ?>-->
	    <h1>Photo of <?php echo $product->product_name_en; ?></h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Management</legend>			
			<br />
		</fieldset>
	    </div>
		<?php 
			//foreach()
			{
			
			}
		
		
		
		
		?>
		<?php echo form_open_multipart('admin/product/add_photo/'); ?>
		<div>
			<h1>Add Photo</h1>
			<br />
		    <label for="photo">Photo:</label>
		    <input name="photo" type ="file"/>
			<br />			
			
			<input type="hidden" name="product_id" value="<?php echo $product->product_id ?>"/>
			<input type = "submit" name="submit" value="Add photo" />
		</div>
	    <div class="content-right form-action">
		
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change" />
		<?php echo anchor('admin/product','Cancel' ,array('class' => 'button')); ?>
		
		
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>