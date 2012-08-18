<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
		<?php echo form_open_multipart('brand/edit/'.$brand->brand_name);?>
		<h1>Edit Brand</h1> 
			<div>
				<input name="brand_name_key" type="hidden" value="<?php echo $brand->brand_name; ?>" />
				
				<label for="brand_name" >Brand Name</label>
				<input name="brand_name" type ="text" value="<?php echo $brand->brand_name; ?>" />
				<br />
		
				<label for="description" >Description</label>
				<textarea name ="description" ><?php echo $brand->description; ?></textarea>
				<br />  
				
				<label for="logo" >Logo</label>
				<img src="<?php echo asset_url().'db/brands/'.$brand->logo; ?>" />
				<input name="logo" type ="file"/>
				<br />
			
				<label for="size" >Size Chart</label>
				<img src="<?php echo asset_url().'db/brands/'.$brand->logo; ?>" />
				<input name="size" type ="file"/>	
				<br />
				
				<input type = "submit" name="submit" value="save"/>
				<br />
				
			</div>
		</form>
		<?php $this->load->view('common/admin_footer');?>
    </body>
</html>