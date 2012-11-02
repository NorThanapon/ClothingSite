	<?php echo form_open('admin/product/edit/'.$product->product_id); ?>
	    <h1>Product's detail</h1> 
	    <div class="form-input">
		<fieldset>
		    <legend>Product Information</legend>
			<label for="product_id">Product ID:</label>
			<label name="product_id"  ><?php echo $product->product_id; ?></label>
			<br />
		    <label for="product_name_th">Name (Thai):</label>
			<label name="product_name_th"  ><?php echo $product->product_name_th; ?></label>
		    <br />
		    <label for="product_name_en">Name (English):</label>
		    <label name="product_name_en"  ><?php echo $product->product_name_en; ?></label>
		    <br />
			<label for="brand_name">Brand:</label>
			<label name="brand_name"  ><?php echo $product->brand_name; ?></label>
			<br />
			<label for="cat_id">Category:</label>
			<label name="cat_id"  ><?php echo $product->cat_id; ?></label>
			<br />
			<label for="total_quantity">Total Quantity</label>
			<label name="total_quantity"  ><?php echo $product->total_quantity; ?></label>
			<br />
			<label for="markup_price">Markup Price</label>
			<label name="markup_price"  ><?php echo $product->markup_price; ?></label>
			<br />
			<label for="markdown_price">Markdown Price</label>
			<label name="markdown_price"  ><?php echo $product->markdown_price; ?></label>
			<br />
		    <label for="description_th">Description (Thai):</label>
		    <label name="description_th"  ><?php echo $product->description_th; ?></label>
		    <br />
		    <label for="description_en">Description (English):</label>
		    <label name="description_en"  ><?php echo $product->description_en; ?></label>
		    <br />
			<label for="material_th">Material (Thai):</label>
		    <label name="material_th"  ><?php echo $product->material_th; ?></label>
		    <br />
			<label for="material_en">Material (English):</label>
		    <label name="material_en"  ><?php echo $product->material_en; ?></label>
	   
		</fieldset>
	    </div>
	    <div class="content-right form-action">
		<?php echo anchor('admin/product','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit_detail" value="Edit this product"/>
	    </div>
	</form>
