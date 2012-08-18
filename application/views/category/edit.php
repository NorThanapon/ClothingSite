<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
		<?php echo form_open_multipart('category/edit');?>
		<h1>Edit Category</h1> 
			<div>
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
				
					<?php 
					echo "<select>";
					$thisCat = $categories->cat_parent;
					//echo "<option value='".$categories->cat_id."' >".$categories->cat_id."</option>";
					foreach($allCat as $item)
					{	
						if($item->cat_id == $thisCat )
						{
							echo "<option value='".$item->cat_id."'  selected='selected'>".$item->cat_name_en."</option>";
							
						}
						else
						{
							echo "<option value='".$item->cat_id."' >".$item->cat_name_en."</option>";
						}
					}	
					echo "</select>";
					?>
				
				<br />
				
				<input type = "submit" name="submit" value="save"/>
				<br />
				
			</div>
		</form>
		<?php $this->load->view('common/admin_footer');?>
    </body>
</html>