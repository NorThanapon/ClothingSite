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
				<select>
					<?php 
					$thisCat = $categories->cat_parent;
					foreach($cat as $item)
					{	
						if($cat->cat_id == $thiscat )
						{
							echo "<option value='".$cat->cat_id."'  selected='selected'>".$cat->cat_name_en."</option>";
							
						}
						else
						{
							echo "<option value='".$cat->cat_id."' >".$cat->cat_name_en."</option>";
						}
					}	?>
				</select>
				<br />
				
				<input type = "submit" name="submit" value="save"/>
				<br />
				
			</div>
		</form>
		<?php $this->load->view('common/admin_footer');?>
    </body>
</html>