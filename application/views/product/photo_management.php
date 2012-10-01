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
				<?php echo form_open('admin/product/edit_color/'.$product->product_id); ?>	
				
				<a class="fancybox-button" rel="fancybox-button" href="<?php echo asset_url().'db/products/'.$item->image_file_name.""; ?>" title="<?php echo $item->image_file_name; ?>">
				<img src="<?php echo asset_url().'db/products/'.$item->image_file_name."";?>" alt="" />
				</a>
				<input type="hidden" name="image_id" value="<?php echo $item->image_id ; ?>">
				<br />
				
					    <select class="color_picker" name="color_change" id="ddl-color-<?php echo $item->image_id ; ?>" >
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
					    <input type="submit" name="submit_<?php echo $item->image_id ;?>" value="save" class='save-button' ">
					
					<?php echo anchor('admin/product/delete_photo/'.$item->image_id.'/'.$product->product_id, ' ', array('title'=>"Delete Photo",'class'=>'delete-button')); ?>
					<br />
					</form>
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

	
	<script type="text/javascript">
	
	$(document).ready(function() {
		
		$('.fancybox-button').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : false,
				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},
				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});

	});
	
	$(document).ready(function() {
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this image.',this.href, 'Delete'); 
		    return false;
	});
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
	});
	</script>
