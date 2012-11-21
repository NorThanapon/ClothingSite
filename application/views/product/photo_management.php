	    <h1>Photos of <?php echo $product->product_name_en; ?></h1> 
		
	    <div class="form-input">
		<fieldset>
		    <legend>Add a photo</legend>			
			<?php echo form_open_multipart('admin/product/add_photo/', 'id="form-add-photo"'); ?>
				<div id="add-photo">
				
					<label for="photo">Photo:</label>
					
					<input name="photo[]" type="file" multiple="multiple" accept="png|jpg"  size="60" id="photo"/>	
					<input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>" />
					<span class="button" id="btn-add-photo">Add Photo</span>

				</div>
			</form>
		</fieldset>	
		
		
	    <fieldset>
		<legend>Existing photos</legend>
		<?php 
			$count =0;//_for_set_default_main_image
			foreach($photos as $item)
			{
		?>		
				<div class="report-items photo-item">					
				
				<a class="fancybox-button" rel="fancybox-button" href="<?php echo asset_url().'db/products/'.$item->file_name.""; ?>" title="<?php echo $item->file_name; ?>">
				<img src="<?php echo asset_url().'db/products/'.$item->file_name."";?>" alt="" />
				</a>
				<input type="hidden" name="image_id" value="<?php echo $item->image_id ; ?>" />
				<br />
					<?php echo anchor('admin/product/delete_photo/'.$item->image_id.'/'.$product->product_id, ' ', array('title'=>"Delete Photo",'class'=>'delete-button')); ?>
				<br />					
				</div>
		<?php	
			$count++;
			}
		?>	
		</fieldset>
		
		</div>			
			<input type="hidden" name="product_id" value="<?php echo $product->product_id;?>" id= "product_id" />
			<div class="content-right form-action">			
			<?php echo anchor('admin/product','Done' ,array('class' => 'button')); ?>	
			</div>
		</form>
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
			//document.write("test1");
			var fileInput = document.getElementById ("photo");
			if ('files' in fileInput) {
                if (fileInput.files.length == 0) {
                    message = "Please browse for one or more files.";
                } 
				else {
					
					document.getElementById("form-add-photo").submit();
				}
			}
		});
	});
	</script>
