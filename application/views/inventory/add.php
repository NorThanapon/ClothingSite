<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
    <?php $this->load->view('common/admin_header');?>
	<?php echo form_open('admin/inventory/add'); ?>
	    <h1>Add Item</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Item Information</legend>
			<label for="item_id">Item ID:</label>
			<input name="item_id" value="<?php if(isset($form_item_id)) echo $form_item_id; ?>" type="text" />*
			<?php echo form_error('item_id', '<span class="form-error-message">', '</span>'); ?>
		    
			<br />
		    <label for="product_id">Product Name:</label>
			<select name="product_id" > 
				<option value="">--Product Name--</option>
				<?php 
				foreach($products as $item)
				{  
					if(isset($form_product_id) && $form_product_id == $item->product_id)
					{
						echo "<option value=".$item->product_id." selected='selected'>".$item->product_id."</option>";
					}
					else
					{
						echo "<option value=".$item->product_id.">".$item->product_id."</option>";
					}
				}
				?>
		    </select>*
		    <?php echo form_error('product_id', '<span class="form-error-message">', '</span>'); ?>
		    
		    <br />
		    <label for="size">Size:</label>
		    <input name="size" value="<?php if(isset($form_size)) echo $form_size; ?>" type ="text"/>*
		    <?php echo form_error('size', '<span class="form-error-message">', '</span>'); ?>
		   
		    <br />
			<label for="color_id">Color:</label>
			<select name="color_id" > 
				<option value="">--Color--</option>
				<option value="1">1</option>
				<?php 
				foreach($colors as $item)
				{  
					if(isset($form_colors) && $form_colors == $item->color_id)
					{
						echo "<option value=".$item->color_id." selected='selected'>".$item->color_id."</option>";
					}
					else
					{
						echo "<option value=".$item->color_id.">".$item->color_id."</option>";
					}
				}
				?>
				<option>Add new Color</option>
		    </select>*
			<?php echo form_error('color_id', '<span class="form-error-message">', '</span>'); ?>
		    
			<br />
			<label for="quantiy">Quantity:</label>
			<input name="quantity" value="<?php if(isset($form_quantity)) echo $form_quantity; ?>" type ="text" />*
			<?php echo form_error('quantity', '<span class="form-error-message">', '</span>'); ?>
		   		   
		</fieldset>
	    </div>
	    <div class="content-right form-action">
		<?php echo anchor('admin/item','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Add this item"/>
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>