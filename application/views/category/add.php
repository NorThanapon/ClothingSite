<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/category/add'); ?>
	<h1>Add Category</h1> 
		<div>
			<?php $this->load->helper("form"); ?>
			<label for="cat_name_th">Name (Thai)</label>
			<input name="cat_name_th" value="<?php if(isset($form_cat_name_th)) echo $form_cat_name_th; ?>" type ="text"/>*
			<?php echo form_error('cat_name_th', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_th;?></span>
			<br />
			<label for="cat_name_en">Name (English)</label>
			<input name="cat_name_en" value="<?php if(isset($form_cat_name_en)) echo $form_cat_name_en; ?>" type ="text"/>*
			<?php echo form_error('cat_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
			<br />
		    <label for="description_th">Description (Thai)</label>
			<textarea name ="description_th" ><?php if(isset($description_th)) echo $description_th; ?></textarea>
			<br />
		    <label for="description_en">Description (English)</label>
			<textarea name ="description_en" ><?php if(isset($description_en)) echo $description_en; ?></textarea>
			<br />
			<label for="cat_parent">Parent</textarea>
			<select name="cat_parent" > 
				<option value="">--None--</option>
				<?php foreach($categories as $item)
				{  ?>
				
					<option value="<?php echo $item->cat_id; ?>"><?php echo $item->cat_name_en; ?></option>
				<?php 
				}
				?>
			</select>
			<br />
			<?php echo anchor('admin/category','Cancel' ,array('class' => 'button')); ?>
			<input class="button btn-submit" type = "submit" name="submit" value="Add this category"/>	
		</div>	  
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>