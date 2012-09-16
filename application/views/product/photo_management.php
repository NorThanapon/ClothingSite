<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	
	
	    <h1>Photos of <?php echo $product->product_name_en; ?></h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Add a photo</legend>			
			<?php echo form_open_multipart('admin/product/add_photo/', 'id="form-add-photo"'); ?>
		<div id="add-photo">
			<!--<div id="select-photo">-->
		    <label for="photo">Photo:</label>
		    <input name="photo" type ="file"/>
			
			<label for="color">Color:</label>			
			<div id="select-color"><?php $this->load->view('common/color/color_picker');?>
			
			
			<input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>" />
			<span class="button" id="btn-add-photo">Add Photo</span>
						
			
		</div>
		</fieldset>	
		</form>
	    <fieldset>
			<legend>Existing photos</legend>
			<?php 
			foreach($photos as $item)
			{
		?>
				<div class="report-items photo-item">
					<img src="<?php echo asset_url().'db/products/'.$item->image_file_name."";?>" />		
					<br />
					    <select class="color_picker" name="color_<?php echo $item->image_id ; ?>" id="ddl-color-<?php echo $item->image_id ; ?>" >
                            <option value="">-- Select a color --</option>
                            <?php
                                foreach ($all_colors as $color) 
								{ 
									if($color->color_id == $item->color_id)
									{
							?>
										<option selected="selected" value="<?php echo $color->color_id; ?>" title="<?php echo asset_url().'db/colors/'.$color->file_name; ?>">
											<?php echo $color->color_name; ?>
										</option>
							<?php
									}
									else
									{
                            ?>
										<option value="<?php echo $color->color_id; ?>" title="<?php echo asset_url().'db/colors/'.$color->file_name; ?>">
											<?php echo $color->color_name; ?>
										</option>
                            <?php
									}
                                }
                            ?>
                        </select>
					
					<?php echo anchor('admin/product/save_color/'.$item->image_id.'/'.$product->product_id, ' ', array('title'=>"Save Color",'class'=>'save-button')); ?>
					<?php echo anchor('admin/product/delete_photo/'.$item->image_id.'/'.$product->product_id, ' ', array('title'=>"Delete Photo",'class'=>'delete-button')); ?>
					<br />
					
				</div>
		<?php		
			}
		?>	
		</fieldset>
		</div>
	
		
		
	    <div class="content-right form-action">		

			<?php echo anchor('admin/product','Done' ,array('class' => 'button')); ?>	
	    </div>
	<?php $this->load->view('common/admin_footer');?>
	<?php $this->load->view('common/confirm_box');?>
	<?php $this->load->view('common/color/color_box');?>	
    </body>
	<script type="text/javascript">
	$("#btn-add-photo").click(function(){
		document.getElementById("form-add-photo").submit();
	});
	<?php
		foreach($photos as $item)
		{
	?>
			$("#ddl-color-<?php echo $item->image_id ; ?>").msDropDown();
	<?php
		}
		
	?>
	
	</script>
</html>