<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/tag/edit/'.$tags->tag_id); ?>
	    <h1>Edit Tag</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Tag Information</legend>
		    <input type="hidden" name="cat_id" value="<?php echo $tags->tag_id;?>" />
		    <label for="tag_name_th">Name (Thai):</label>
		    <input name="tag_name_th" type ="text" value="<?php if(isset($form_tag_name_th)) echo $form_tag_name_th; else echo $tags->tag_name_th; ?>" />*
		    <?php echo form_error('tag_name_th', '<span class="form-error-message">', '</span>'); ?>
			 <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="tag_name_en" >Name (English):</label>
		    <input name ="tag_name_en" type ="text" value="<?php if(isset($form_tag_name_en)) echo $form_tag_name_en; else echo $tags->tag_name_en; ?>" />*
		    <?php echo form_error('cat_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />
		    <label for="description_en" >Description (English):</label>
		    <textarea name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; else echo $tags->description_en; ?></textarea>
		    <br />
			
		<div class="report-items">
            <?php $this->load->view('common/table_pager');?>
			<table class="tablesorter">
			<thead>
				<tr>
				<th>&nbsp;</th>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Category</th>
				<th>Total Quantity</th>
				<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		
			<?php 
				foreach($product_list_tag as $item) 
				{
            ?>
            <tr>
                <td><input type = "checkbox" <?php echo "name=\"chb_select_product[]\" value=\"".$item->product_id."\"" ;?>"/></td>
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >--><?php echo $item->product_id;?><!--</a>--></td>
                <td><?php echo $item->product_name_en;?> </td>
				<td><?php echo $item->brand_name;?></td>
				<td><?php 
						foreach($tag_list as $tagItem)
						{
							if($item->tag_id == $tagItem->tag_id)
							{
								echo $tagItem->tag_name_en;
							}
						}
					?>
				</td>
				<td><?php echo $item->total_quantity?></td>
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >Detail</a>-->
					<?php echo anchor('admin/product/delete/'.$item->product_id, ' ', array('title'=>"Delete Product",'class'=>'delete-button')); ?>
				</td>
            </tr>
            <?php
					
                }
			?>
			</tbody>
			</table>
            <?php $this->load->view('common/table_pager');?>
		</div>
------------------------------------------------------------------------------------------------------		
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