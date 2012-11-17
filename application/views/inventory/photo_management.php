	    <h1>Photos of Item<?php echo ' '.$item->item_id; ?></h1> 
		<div class="photo-item-details">
			<label>Product's name: </label>
			<span><?php echo $product->product_name_en;?></span><br />
			<label>Size: </label>
			<span><?php echo $item->size; ?></span><br />
			<label>Color: </label>
			<span><?php foreach($all_colors as $color){
									if($color->color_id == $item->color_id){
									  echo '<img src='.asset_url().'db/colors/'.$color->file_name.' alt="" />  ';
									  echo $color->color_name;
									}
								}
						 ?>
			</span><br /><br />
		</div>
	    <div class="form-input">	
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
					<?php echo anchor('admin/product/delete_photo/'.$item->image_id.'/'.$item->product_id, ' ', array('title'=>"Delete Photo",'class'=>'delete-button')); ?>
					<br />					
				</div>
		<?php	
			$count++;
			}
		?>	
		</fieldset>
		
		</div>			
			<input type="hidden" name="product_id" value="<?php echo $item->product_id;?>" id= "product_id" />
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
			document.getElementById("form-add-photo").submit();
		});

	});
	</script>
