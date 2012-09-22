<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/tag/edit/'.$tags->tag_id); ?>
	    <h1>Edit Tag</h1> 
		<div class="page-action">
	    <span id="btn-add-tag" class="button gradient"><img  src="<?php echo asset_url().'img/add-icon.png';?>" />Add New Product</span>
		</div>
	    <div class="form-input">
		<fieldset>
		    <legend>Tag Information</legend>
		    <input type="hidden" name="tag_id" value="<?php echo $tags->tag_id;?>" />
		    <label for="tag_name_th">Name (Thai):</label>
		    <input name="tag_name_th" type ="text" value="<?php if(isset($form_tag_name_th)) echo $form_tag_name_th; else echo $tags->tag_name_th; ?>" />*
		    <?php echo form_error('tag_name_th', '<span class="form-error-message">', '</span>'); ?>
			 <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="tag_name_en" >Name (English):</label>
		    <input name ="tag_name_en" type ="text" value="<?php if(isset($form_tag_name_en)) echo $form_tag_name_en; else echo $tags->tag_name_en; ?>" />*
		    <?php echo form_error('tag_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />
		    <label for="description_en" >Description (English):</label>
		    <textarea name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; else echo $tags->description_en; ?></textarea>
		    <br />
			
		<div class="report-items">

			<table class="tablesorter">
			<thead>
				<tr>

				<th>Product ID</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Category</th>
				<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		
			<?php 
				foreach($product_in_tag as $item) 
				{
            ?>
            <tr>
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >--><?php echo $item->product_id;?><!--</a>--></td>
                <td><?php echo $item->product_name_en;?> </td>
				<td><?php echo $item->brand_name;?></td>
				<td><?php 
						foreach($category_list as $catItem)
						{
							if($item->cat_id == $tagItem->cat_id)
							{
								echo $tagItem->cat_name_en;
							}
						}
					?>
				</td>
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >Detail</a>-->
					<?php echo anchor('admin/tag/delete_product/'.$item->product_id, ' ', array('title'=>"Delete Product",'class'=>'delete-button')); ?>
				</td>
            </tr>
            <?php
					
                }
			?>
			</tbody>
			</table>
 
		</div>
			<br />
			<label for="isActive">Show :</label>
			<input name='isActive' type = 'checkbox' 
				<?php
				if(isset($form_isActive)){ 
					if($form_isActive){echo "checked"; }
				}
				else{
					if($tags->isActive){ echo "checked";}
				}?>  />
		
			<br />
		</fieldset>
	    </div>
	    <div class="form-action content-right">
		<?php echo anchor('admin/tag','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>