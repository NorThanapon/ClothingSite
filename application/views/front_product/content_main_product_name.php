	<div id="content-image">
		<div class="main-image">
			<a href="<?php echo asset_url().'db/products/'.$product_detail->image_file_name; ?>"><img src="<?php echo asset_url().'db/products/'.$product_detail->image_file_name; ?>"></a>
		</div>

		<div id="product-sub">
		
		<?php 
		
		foreach($sub_image as $item)
		{	
			
		?>
			<div class="sub-image">
				<a href="<?php echo asset_url().'db/products/'.$item->image_file_name; ?>"><img src="<?php echo asset_url().'db/products/'.$item->image_file_name; ?>"></a>
			</div>
		<?php
		}
		?>
		</div>		
	</div>
	<div id="content-product" >
		<div id="product-particular">
			<div id="detail-name">
				<a href="<?php echo asset_url().'db/brands/'.$product_detail->logo; ?>"><img src="<?php echo asset_url().'db/brands/'.$product_detail->logo; ?>"></a>
				<br />
				<h1> <?php echo $product_detail->product_name_en ?> </h1>
				 ItemID: <?php echo $product_detail->item_id ?> 
				<br />
			</div>
			
			<div id="detail-price">
				<?php
					if($product_detail->on_sale==true)
					{	
						echo "<h3>".$product_detail->markup_price."THB</h3>";
						echo "<h2>".$product_detail->markdown_price."THB</h2>";
					}
					else
					{
						echo "<h1>".$product_detail->markup_price." THB</h1>";
						echo "<h2><br /></h2>";
					}
				?>	
				<br />
			</div>
			
			<div id="detail-product">
				<h2> <?php echo $product_detail->product_description_en ?> </h2>
			</div>
		</div>
		<div id="product-sizecolor">
			<div id="detail-size">
				<select name="ddl-size">
					<option value="Select Size">Select Size</option>
					<?php 
					foreach($item_detail_size as $item)
					{
					?>
						<option value="<?php echo $item->size; ?>"> <?php echo $item->size; ?> </option>
					<?php
					}
					?>
				</select>
				
				<a href="###" >Size Chart</a>
			</div>
			<div id="product-color">
				<h2>Color:</h2>
				<div id="color-image" >
					<input type="hidden" id="color_id" value="32"  />
					<?php
					foreach($item_detail_color as $item)
					{
					?>	
						<div id="<?php echo $item->color_file_name;?>">
						<a href="<?php echo asset_url().'db/colors/'.$item->color_file_name; ?>"><img src="<?php echo asset_url().'db/colors/'.$item->color_file_name; ?>"></a>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div id="product-quantity">
			<h2>
			Quantity:<input type="textbox" id="quantity"  />
				<a href="<?php echo asset_url().'img/facebook.jpg'; ?>"><img src="<?php echo asset_url().'img/facebook.jpg'; ?>"></a>
			</h2>
		</div>
		<div id="product-add">
			<input type="image" src="<?php echo asset_url().'img/addtobagbut.jpg'; ?>" value="Add to bag" id="add-to-cart" />
		</div>
		<div id="product-save">
			<input type="image" src="<?php echo asset_url().'img/savetowishlistbut.jpg'; ?>" value="Save to Wishist" id="add-to-wishlist" />
		</div>
		<input type="hidden" id="item_id" value="<?php echo $product_detail->item_id;?>" />
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
		$('#add-to-cart').click(function() {
			if($('input[name=ddl-size]').val() == "" ){
				alert("Please select size");
			}
			else if($('#color_id').val() == ""){
				alert("Please select color");
			}
			else if($('#quantity').val() == "" ){
				alert("Please insert quantity");
				return false;
			}
			else{
				$.ajax({
					type: 'POST',
					url: "<?php echo base_url('cart/add_to_cart');?>",
					data:  { item_id: $('#item_id').val(),
							 quantity: $('#quantity').val(),
							 size: $('input[name=ddl-size]').val(),
							 color: $('#color-image').val() 
						   },
					success: function( data ) {
						alert(data);
						if(data == 'true')	{
							window.location.href = "<?php echo base_url('cart');?>";
							
						}
						else if(data == 'false'){
							alert(data);
							//window.location.href = "<?php echo base_url();?>";
						}
						//return false;
					}
					
				});
			}
			
		});
		/*
		$('#add-to-wishlist').click(function() {
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('brand/product');?>",
				data: "lang=en",
				success: function( data ) {
					window.location.href = "<?php echo base_url();?>";
			}});
		});		
		*/
		});

	</script>
				