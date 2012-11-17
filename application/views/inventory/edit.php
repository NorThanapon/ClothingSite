<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/inventory/edit/'.$items->item_id); ?>
	    <h1>Edit Item</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Item Information</legend>
			<input name="item_id_key" type="hidden" value="<?php echo $items->item_id; ?>" />
			<label for="item_id">Item ID:</label>
			<input name="item_id" value="<?php if(isset($form_item_id)) echo $form_item_id; else echo $items->item_id; ?>" type="text" />*
			<?php echo form_error('item_id', '<span class="form-error-message">', '</span>'); ?>
		    
			<br />
		    <label for="product_id">Product Name:</label>
			<select name="product_id" > 
				<option value="">--Product Name--</option>
				<?php 
				foreach($products as $item)
				{  ?>
				
					<option value="<?php echo $item->product_id; ?>" <?php if(isset($form_product_id) && $form_product_id == $item->product_id || $item->product_id == $items->product_id) echo 'selected';?> ><?php echo $item->product_name_en; ?></option>
					
				<?php
				}
				?>
		    </select>*
		    <?php echo form_error('product_id', '<span class="form-error-message">', '</span>'); ?>
		    
		    <br />
		    <label for="size">Size:</label>
		    <input name="size" value="<?php if(isset($form_size)) echo $form_size; else echo $items->size;?>" type ="text"/>*
		    <?php echo form_error('size', '<span class="form-error-message">', '</span>'); ?>
		   
		    <br />
			<label for="<?php echo $picker_control_name; ?>">Color:</label>
			<?php $this->load->view('common/color/color_picker');?>*
			
			<?php echo form_error('color', '<span class="form-error-message">', '</span>'); ?>
		    
			<br />
			<label for="quantiy">Quantity:</label>
			<input name="quantity" value="<?php if(isset($form_quantity)) echo $form_quantity; else echo $items->quantity; ?>" type ="text" />*
			<?php echo form_error('quantity', '<span class="form-error-message">', '</span>'); ?>
		   		   
		</fieldset>
	    </div>
	    <div class="content-right form-action">
		<?php echo anchor('admin/item','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save and Return"/>
		<input class="button btn-submit" type = "submit" name="manage_photo" value="Save and Manage photo"/>
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
	<?php $this->load->view('common/confirm_box');?>
	<?php $this->load->view('common/color/color_box');?>
    </body>
</html>