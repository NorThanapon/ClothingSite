<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<?php echo form_open_multipart('admin/brand/edit/'.$brand->brand_name);?>
	<h1>Edit Brand</h1> 
	    <div>
		<input name="brand_name_key" type="hidden" value="<?php echo $brand->brand_name; ?>" />
		<label for="brand_name" >Brand Name</label>
		<input name="brand_name" type ="text" value="<?php if(isset($form_brand_name)) echo $form_brand_name; else echo $brand->brand_name; ?>" />*
		<?php echo form_error('brand_name', '<span class="form-error-message">', '</span>'); ?>
		<br />
		<label for="description" >Description</label>
		<textarea name ="description" ><?php if(isset($form_description)) echo $form_description; else echo $brand->description; ?></textarea>
		<br />
		<?php if ($brand->logo) { ?>
		<img id="img-logo" src="<?php echo asset_url().'db/brands/'.$brand->logo; ?>" />
		<br />
		<span class="btn-minor-action" id="btn-remove-logo">remove logo</span>
		<input type="hidden" name="remove_logo" id="hdn-remove-logo" value="" />
		<br />
		<?php } ?>
		<label for="logo" >Logo</label>
		<input name="logo" type ="file"/>
		<br />							
		<?php echo anchor('admin/brand','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
		<br />
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
	<script type="text/javascript">
	    $(document).ready(function() {
		$('#btn-remove-logo').click(function(){
		    $('#img-logo').hide();
		    $('#hdn-remove-logo').val("remove");
		    $('#btn-remove-logo').hide();
		});
	    });
	</script>
    </body>
</html>