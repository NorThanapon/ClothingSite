	<?php echo form_open_multipart('admin/brand/add');?>
	<h1>Add brand</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Brand Information</legend>
		    <label for="brand_name">Brand Name:</label>
		    <input name="brand_name" value="<?php if(isset($brand_name)) echo $brand_name; ?>" type ="text"/>*
		    <?php echo form_error('brand_name', '<span class="form-error-message">', '</span>'); ?>
		    <br />
		    <label for="description">Description:</label>
		    <textarea name ="description"  ><?php if(isset($form_description)) echo $form_description; ?></textarea>
		    <br />
		    <label for="logo">Logo:</label>
		    <input name="logo" type ="file"/>
			<br />
			<label for="is_active" >Show:</label>
			<input name="is_active" checked type="checkbox"  />			
		</fieldset>
	    </div>
	    <div class="form-action content-right">
		<?php echo anchor('admin/brand','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Add this brand"/>
	    </div>
	</form>	