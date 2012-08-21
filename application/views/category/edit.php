<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
		<?php echo form_open('category/edit/'.$categories->cat_id); ?>
		<h1>Edit Category</h1> 
			<div>
				<input type="hidden" name="cat_id" value="<?php echo $categories->cat_id;?>" />
				
				<label for="cat_name_th" >Name (Thai)</label>
				<input name="cat_name_th" type ="text" value="<?php echo $categories->cat_name_th; ?>" />
				<br />
		
				<label for="cat_name_en" >Name (English)</label>
				<input name ="cat_name_en" type ="text" value="<?php echo $categories->cat_name_en; ?>" />
				<br />  
				
				<label for="description_th" >Description (Thai)</label>
				<input name ="description_th" type ="text" value="<?php echo $categories->description_th; ?>" />
				<br />
				
				<label for="description_en" >Description (English)</label>
				<input name ="description_en" type ="text" value="<?php echo $categories->description_en; ?>" />
				<br />
			
				<label for="cat_parent" >Parent</label>
				<select name="cat_parent">
					<option value="">--None--</option>
					<?php 
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
					
					?>
				</select>
				<br />
				
				<input class="button" type = "submit" name="submit" value="Save"/>
				<?php echo anchor('category','Cancel' ,'Cancel'); ?>
				<br />
				
			</div>
		</form>
		<?php $this->load->view('common/admin_footer');?>
    </body>
</html>