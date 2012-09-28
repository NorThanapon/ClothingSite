	<?php echo form_open('admin/category/edit/'.$categories->cat_id); ?>
	    <h1>Edit Category</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Category Information</legend>
		    <input type="hidden" name="cat_id" value="<?php echo $categories->cat_id;?>" />
		    <label for="cat_name_th" >Name (Thai):</label>
		    <input id="cat_name_th" name="cat_name_th" type ="text" value="<?php if(isset($form_cat_name_th)) echo $form_cat_name_th; else echo $categories->cat_name_th; ?>" />*
		    <?php echo form_error('cat_name_th', '<span class="form-error-message">', '</span>'); ?>
			 <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="cat_name_en" >Name (English):</label>
		    <input id="cat_name_en" name ="cat_name_en" type ="text" value="<?php if(isset($form_cat_name_en)) echo $form_cat_name_en; else echo $categories->cat_name_en; ?>" />*
		    <?php echo form_error('cat_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />  
		    <label for="description_th" >Description (Thai):</label>
		    <textarea id="description_th" name ="description_th" ><?php if(isset($form_description_th)) echo $form_description_th; else echo $categories->description_th; ?></textarea>
		    <br />
		    <label for="description_en" >Description (English):</label>
		    <textarea id="description_en" name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; else echo $categories->description_en; ?></textarea>
		    <br />
		    <label for="cat_parent" >Under category:</label>
		    <select id="cat_parent" name="cat_parent">
			    <option value="">--None--</option>
			    <?php 
				
				if(isset($form_cat_parent))
				{
					foreach($allCat as $item)
					{  
						if($form_cat_parent == $item->cat_id)
						{
							echo "<option value=".$item->cat_id." selected='selected'>".$item->cat_name_en."</option>";
						}
						else
						{
							echo "<option value=".$item->cat_id.">".$item->cat_name_en."</option>";
						}
					}
				}
				else
				{
					$thisCat = $categories->cat_parent;
					
					foreach($allCat as $item)
					{	
						if($item->cat_id == $thisCat)
						{
							echo "<option value='".$item->cat_id."'  selected='selected'>".$item->cat_name_en."</option>";
						}
						if(!($item->cat_id == $categories->cat_id))
						{
							echo "<option value='".$item->cat_id."' >".$item->cat_name_en."</option>";
						}
					}	
				}
			    
			    ?>
		    </select>
			<br />
			<label for="is_active">Show :</label>
			<input id="is_active" name='is_active' type = 'checkbox' 
				<?php
				if(isset($form_is_active)){ 
					if($form_is_active){echo "checked"; }
				}
				else{
					if($categories->is_active){ echo "checked";}
				}?>  />
		
			<br />
		</fieldset>
	    </div>
	    <div class="form-action content-right">
		<?php echo anchor('admin/category','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
	    </div>
	</form>