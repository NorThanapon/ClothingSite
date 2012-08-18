<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open_multipart('category/add');?>
	<h1>Add Category</h1> 
		<div>
			<label for="cat_name_th">Name (Thai)</label>
			<input name="cat_name_th" type ="text"/>
			<br />
			<label for="cat_name_en">Name (English)</label>
			<input name="cat_name_en" type ="text"/>
			<br />
		    <label for="description_th">Description (Thai)</label>
			<textarea name ="description_th" ></textarea>
			<br />
		    <label for="description_en">Description (English)</label>
			<textarea name ="description_en" ></textarea>
			<br />
			<label for="cat_parent">Parent</textarea>
			<select> 
				<?php foreach($categories as $item)
				{  ?>
				
					<option value="<?php echo $item->cat_id; ?>"><?php echo $item->cat_name_en; ?></option>
				<?php 
				}
				?>
			</select>
			<br />
			<input type = "submit" name="submit" value="submit"/>
		</div>	  
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>