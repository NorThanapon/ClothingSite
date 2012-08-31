<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/category/edit/'.$categories->cat_id); ?>
	    <h1>Edit Category</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Category Information</legend>
		    <input type="hidden" name="cat_id" value="<?php echo $categories->cat_id;?>" />
		    <label for="cat_name_th" >Name (Thai):</label>
		    <input name="cat_name_th" type ="text" value="<?php if(isset($form_cat_name_th)) echo $form_cat_name_th; else echo $categories->cat_name_th; ?>" />*
		    <?php echo form_error('cat_name_th', '<span class="form-error-message">', '</span>'); ?>
			 <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="cat_name_en" >Name (English):</label>
		    <input name ="cat_name_en" type ="text" value="<?php if(isset($form_cat_name_en)) echo $form_cat_name_en; else echo $categories->cat_name_en; ?>" />*
		    <?php echo form_error('cat_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />  
		    <label for="description_th" >Description (Thai):</label>
		    <textarea name ="description_th" ><?php if(isset($form_description_th)) echo $form_description_th; else echo $categories->description_th; ?></textarea>
		    <br />
		    <label for="description_en" >Description (English):</label>
		    <textarea name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; else echo $categories->description_en; ?></textarea>
		    <br />
		    <label for="cat_parent" >Under category:</label>
		    <select name="cat_parent">
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
			<label for="isActive">Show :</label>
			<input name='isActive' type = 'checkbox' 
				<?php
				if(isset($form_isActive)){ 
					if($form_isActive==1){echo "checked"; }
				}
				else{
					if($categories->isActive==1){ echo "checked";}
				}?>  />
		
			<br />
		</fieldset>
	    </div>
	    <div class="form-action content-right">
		<?php echo anchor('admin/category','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>