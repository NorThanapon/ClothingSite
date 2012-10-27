	<?php echo form_open('admin/product/edit/'.$product->product_id); ?>
	    <h1>Edit Product</h1> 
	    <div class="form-input">
		<fieldset>
			<input name="product_id_key" type="hidden" value="<?php echo $product->product_id; ?>" />
		    <legend>Product Information</legend>
			<!--<label for="product_id">Product ID</label>
			<input name="product_id" value="<?php if(isset($form_product_id)) echo $form_product_id; else echo $product->product_id;?>" type="text" />*
			<br />-->
		    <label for="product_name_th">Name (Thai):</label>
		    <input name="product_name_th" value="<?php if(isset($form_product_name_th)) echo $form_product_name_th; else echo $product->product_name_th;?>" type ="text"/>*
		    <?php echo form_error('product_name_th', '<span class="form-error-message">', '</span>'); ?>
		    <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="product_name_en">Name (English):</label>
		    <input name="product_name_en" value="<?php if(isset($form_product_name_en)) echo $form_product_name_en; else echo $product->product_name_en;?>" type ="text"/>*
		    <?php echo form_error('product_name_en', '<span class="form-error-message">', '</span>'); ?>
		    <span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />
			<label for="brand_name">Brand:</label>
			<select name="brand_id" > 
				<option value="">--None--</option>
				<?php 
				foreach($brand as $item)
				{  
					if(isset($form_brand_id))
					{
						if($form_brand_id == $item->brand_id)
						{
							echo "<option value=".$item->brand_id." selected='selected'>".$item->brand_name."</option>";
						}
						else
						{
							echo "<option value=".$item->brand_id.">".$item->brand_name."</option>";
						}
					}
					else
					{
						if($item->brand_id == $product->brand_id)
						{
							echo "<option value=".$item->brand_id." selected='selected'>".$item->brand_name."</option>";
						}
						else
						{
							echo "<option value=".$item->brand_id.">".$item->brand_name."</option>";
						}
					}
				}
				?>
		    </select>
			<br />
			<label for="cat_id">Category:</label>
			<select name="cat_id" > 
				<option value="">--None--</option>
				<?php 
				echo '<option value="" disabled >###### Women ######</option>';
				foreach($category as $item)
				{  
					if($item->cat_gender == "Women")
					{
						if(isset($form_cat_id))
						{
							if($form_cat_id == $item->cat_id)
							{
								echo "<option value=".$item->cat_id." selected='selected'>".$item->cat_name_en."</option>";
							}
							else
							{
								echo "<option value=".$item->cat_id.">".$item->cat_name_en."</option>";
							}
						}
						else
						{
							if($product->cat_id == $item->cat_id)
							{
								echo "<option value=".$item->cat_id." selected='selected'>".$item->cat_name_en."</option>";
							}
							else
							{
								echo "<option value=".$item->cat_id.">".$item->cat_name_en."</option>";
							}
						}
					}
				}
				echo '<option value="" disabled ></option>';
				echo '<option value=""  disabled >######## Men ########</option>';
				foreach($category as $item)
				{  
					if($item->cat_gender == "Men")
					{
						if(isset($form_cat_id))
						{
							if($form_cat_id == $item->cat_id)
							{
								echo "<option value=".$item->cat_id." selected='selected'>".$item->cat_name_en."</option>";
							}
							else
							{
								echo "<option value=".$item->cat_id.">".$item->cat_name_en."</option>";
							}
						}
						else
						{
							if($product->cat_id == $item->cat_id)
							{
								echo "<option value=".$item->cat_id." selected='selected'>".$item->cat_name_en."</option>";
							}
							else
							{
								echo "<option value=".$item->cat_id.">".$item->cat_name_en."</option>";
							}
						}
					}
				}
				?>
		    </select>
			<br />
			<label for="total_quantity">Total Quantity :</label>
			<input name="total_quantity" type="text" value="<?php echo $product->total_quantity; ?>" readonly="true" />
			<br />
			<label for="markup_price">Price :</label>
			<input name="markup_price" value="<?php if(isset($form_markup_price)) echo $form_markup_price; else echo $product->markup_price;?>" type="text" />*
			<br />
			<label for="markdown_price">Sale Price :</label>
			<input name="markdown_price" value="<?php if(isset($form_markdown_price)) echo $form_markdown_price; else echo $product->markdown_price; ?>" type="text"  type="text" />
			<br />
		    <label for="description_th">Description (Thai):</label>
		    <textarea name ="description_th" ><?php if(isset($form_description_th)) echo $form_description_th; else echo $product->product_description_th;  ?></textarea>
		    <br />
		    <label for="description_en">Description (English):</label>
		    <textarea name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; else echo $product->product_description_en;?></textarea>
		    <br />
			<label for="how_to_wash_th">How to Wash (Thai):</label>
		    <textarea name ="how_to_wash_th" ><?php if(isset($form_how_to_wash_th)) echo $form_how_to_wash_th; else echo $product->how_to_wash_th; ?></textarea>
		    <br />
			<label for="how_to_wash_en">How to Wash (English):</label>
		    <textarea name ="how_to_wash_en" ><?php if(isset($form_how_to_wash_en)) echo $form_how_to_wash_en; else echo $product->how_to_wash_en; ?></textarea>
		    <br/>
			<label for="on_sale">Sale :</label>
			<input name='on_sale' type = 'checkbox' 
				<?php
				if(isset($form_on_sale)){ 
					if($form_on_sale==1){echo "checked"; }
				}
				else{
					if($product->on_sale==1){ echo "checked";}
				}?>  />
		
			<br />
			<label for="is_active">Show :</label>
			<input name='is_active' type = 'checkbox' 
				<?php
				if(isset($form_is_active)){ 
					if($form_is_active==1){echo "checked"; }
				}
				else{
					if($product->product_is_active==1){ echo "checked";}
				}?>  />
		
			<br />
		</fieldset>
	    </div>
	    <div class="content-right form-action">
		<?php echo anchor('admin/product','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save and Return"/>
		<input class="button btn-submit" type = "submit" name="manage_photo" value="Save and Manage photo"/>
	    </div>
	</form>

