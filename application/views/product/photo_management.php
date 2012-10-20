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
		<?php echo form_open('admin/product/save_main_image'); ?>	
		<?php 
			$count =0;//_for_set_default_main_image
			foreach($photos as $item)
			{
		?>		
				
				<div class="report-items photo-item">					
				
				<a class="fancybox-button" rel="fancybox-button" href="<?php echo asset_url().'db/products/'.$item->image_file_name.""; ?>" title="<?php echo $item->image_file_name; ?>">
				<img src="<?php echo asset_url().'db/products/'.$item->image_file_name."";?>" alt="" />
				</a>
				<input type="hidden" name="image_id" value="<?php echo $item->image_id ; ?>" />
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
					<input type="button" name="submit_<?php echo $item->image_id ;?> " value="save" class='save-button' onclick="save_color(<?php echo $item->image_id ;?>)" />
					<?php echo anchor('admin/product/delete_photo/'.$item->image_id.'/'.$product->product_id, ' ', array('title'=>"Delete Photo",'class'=>'delete-button')); ?>
					<br />
					<div class="main_image_radio">
					<?php 
					if($product->main_image == $item->image_id ||($count==0 && $product->main_image==0 )) 
					{
					?>
						<input type="radio"  name="main_image" value="<?php echo $item->image_id ;?> " checked="true" />
					<?php 
					} 
					else 
					{
					?>
						<input type="radio" " name="main_image" value="<?php echo $item->image_id ;?>" />
					<?php 
					}
					?>
					
					<div class="label_main_image" for="main_image" >Main Image </div>
					</div>
					
				</div>
		<?php	
			$count++;
			}
		?>	
		</fieldset>
		
		</div>			
			<input type="hidden" name="product_id" value="<?php echo $product->product_id;?>" id= "product_id" />
			<div class="content-right form-action">		
			<input type="submit" name="save_form" value="save" class='button' >			
			<?php echo anchor('admin/product','Done' ,array('class' => 'button')); ?>	
	    </div>
		</form>
		<?php $this->load->view('common/admin_footer');?>
		<?php $this->load->view('common/confirm_box');?>
		<?php $this->load->view('common/color/color_box');?>	
	
	
	<script type="text/javascript"> 
	function save_color(image_id)
	{
		var color_id = document.getElementById("ddl-color-"+image_id).value;
		var product_id = document.getElementById("product_id").value;
		var url = document.URL;
		url = url.substring(0, url.indexOf('/product') + 8);
		url = url + '/edit_color/' + product_id+'/'+image_id+'/'+color_id;
		window.location = url;
		//alert(image_id +"color = "+color_id+" >"+url+"<<");

		
	}
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
