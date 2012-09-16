<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	
	
	    <h1>Photo of <?php echo $product->product_name_en; ?></h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Management</legend>			
			<br />
		</fieldset>
	    </div>
		
		<?php 
			foreach($photos as $item)
			{
		?>
				<div class="report-items">
					<img src="<?php echo asset_url().'db/products/'.$item->image_file_name."";?> "width="160" height="180" />		
					<br />
					<label for="<?php echo $item->image_id;?>"> color </label>
					<img src="<?php echo asset_url().'db/colors/'.$item->color_file_name."";?> " />		
					<label for="color_name"> <?php echo $item->color_name; ?> </label>
					<br />
					 Select color:
                        <select class="color_picker" name="color_image" id="ddl-delete-color">
                            <option value="">-- Select a color --</option>
                            <?php
                                foreach ($all_colors as $color) {
                            ?>
                                <option value="<?php echo $color->color_id; ?>" title="<?php echo asset_url().'db/colors/'.$color->file_name; ?>">
                                    <?php echo $color->color_name; ?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
					<!--<?php echo anchor('admin/product/delete_photo/'.$item->image_id.'/'.$product->product_id, ' ', array('title'=>"Delete Photo",'class'=>'delete-button')); ?>-->
					<br />
					
				</div>
		<?php		
			}
		?>	
		
		<?php echo form_open_multipart('admin/product/add_photo/'); ?>
		<div>
			<h1>Add Photo</h1>
			<br />
		    <label for="photo">Photo:</label>
		    <input name="photo" type ="file"/>
			<br />	
			<label for="color">Color:</label>			
			<?php $this->load->view('common/color/color_picker');?>
			<br />
			
			<input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>" />
			<input type = "submit" name="submit" value="Add photo" />	
					
			
		</div>
		
	    <div class="content-right form-action">		
			<input class="button btn-submit" type = "submit" name="submit" value="Save Change" />
			<?php echo anchor('admin/product','Cancel' ,array('class' => 'button')); ?>	
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
	<?php $this->load->view('common/confirm_box');?>
	<?php $this->load->view('common/color/color_box');?>	
    </body>
</html>