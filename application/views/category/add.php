	<?php echo form_open('admin/category/add'); ?>
	    <h1>Add Category</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Category Information</legend>
		    <label for="cat_name_th">Name (Thai):</label>
		    <input id="cat_name_th" name="cat_name_th" value="<?php if(isset($form_cat_name_th)) echo $form_cat_name_th; ?>" type ="text"/>*
		    <?php echo form_error('cat_name_th', '<span class="form-error-message">', '</span>'); ?>
		    <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="cat_name_en">Name (English):</label>
		    <input id="cat_name_en" name="cat_name_en" value="<?php if(isset($form_cat_name_en)) echo $form_cat_name_en; ?>" type ="text"/>*
		    <?php echo form_error('cat_name_en', '<span class="form-error-message">', '</span>'); ?>
		    <span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />
		    <label for="description_th">Description (Thai):</label>
		    <textarea id="description_th" name ="description_th" ><?php if(isset($form_description_th)) echo $form_description_th; ?></textarea>
		    <br />
		    <label for="description_en">Description (English):</label>
		    <textarea id="description_en" name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; ?></textarea>
		    <br />
		    <label for="cat_parent">Under Category:</label>
		    <select id="cat_parent" name="cat_parent" > 
				<option value="">--None--</option>
				<?php 
				foreach($categories as $item)
				{  
					echo "<option value=".$item->cat_id.">".$item->cat_name_en."</option>";
				}
				?>
		    </select>
			<br />
			<label for="is_active" >Show:</label>
			<input id="is_active" name="is_active" <?php if(!isset($form_is_active) || $form_is_active) echo " checked "?> type="checkbox"  />		
		</fieldset>
	    </div>
	    <div class="content-right form-action">
		<?php echo anchor('admin/category','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Add this category"/>
	    </div>
	</form>