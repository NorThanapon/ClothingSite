	<!--<div id="content-history">	
		<a href="###" class="history-previous">Home > </a>					
		<a href="###" class="history-previous">Women ></a>
		<a href="###" class="history-previous">ELLE ></a>
		<a href="###" id="history-current">Product's Name</a>
	</div> -->
<?php echo form_open('shoppingcart'); ?>
	<div id="content-image">
		<div class="main-image">
			<a href="<?php echo asset_url().'db/products/129_photo.jpg'; ?>"><img src="<?php echo asset_url().'db/products/129_photo.jpg'; ?>"></a>
		</div>
		<div id="product-sub">
			<div class="sub-image">
				<a href="<?php echo asset_url().'db/products/129_photo.jpg'; ?>"><img src="<?php echo asset_url().'db/products/129_photo.jpg'; ?>"></a>
			</div>
			<div class="sub-image">
				<a href="<?php echo asset_url().'db/products/130_photo.jpg'; ?>"><img src="<?php echo asset_url().'db/products/130_photo.jpg'; ?>"></a>
			</div>
			<div class="sub-image">
				<a href="<?php echo asset_url().'db/products/131_photo.jpg'; ?>"><img src="<?php echo asset_url().'db/products/131_photo.jpg'; ?>"></a>
			</div> 
			<div class="sub-image">
				<a href="<?php echo asset_url().'db/products/132_photo.jpg'; ?>"><img src="<?php echo asset_url().'db/products/132_photo.jpg'; ?>"></a>
			</div> 
		</div>		
	</div>
	<div id="content-product" >
		<div id="product-particular">
			<div id="detail-name">
				<a href="<?php echo asset_url().'img/productname-brandname.jpg'; ?>"><img src="<?php echo asset_url().'img/productname-brandname.jpg'; ?>"></a>
			</div>
			<div id="detail-price">
				<h3>2,500 THB</h3>
				<h2>1,300 THB</h2>
			</div>
			<div id="detail-product">
				<h2>ELLE targets confident, modern, career-minded women.<br />
				This SOPHISTICATED line feature ELEGANT clothes made ir <br />
				high quality materials associated to refined manufacturing,<br />
				details & finishing. This feminine and contemporary <br />
				range is chiv yet very wearable and accessible.A perfect<br />
				stylish collection for independent women
				</h2>
			</div>
		</div>
		<div id="product-sizecolor">
			<div id="detail-size">
				<select>
					<option value="Select Size">Select Size</option>
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="L">L</option>
					<option value="XL">XL</option>
					<option value="XXL">XXL</option>
				</select>
				<a href="###" >Size Chart</a>
			</div>
			<div id="product-color">
				<h2>Color:</h2>
				<div id="color-image">
					<a href="<?php echo asset_url().'img/productname-color1.jpg'; ?>"><img src="<?php echo asset_url().'img/productname-color1.jpg'; ?>"></a>
					<a href="<?php echo asset_url().'img/productname-color2.jpg'; ?>"><img src="<?php echo asset_url().'img/productname-color2.jpg'; ?>"></a>
				</div>
			</div>
		</div>
		<div id="product-quantity">
			<h2>
			Quantity:<input type="textbox" id="quantity" />
				<a href="<?php echo asset_url().'img/facebook.jpg'; ?>"><img src="<?php echo asset_url().'img/facebook.jpg'; ?>"></a>
			</h2>
		</div>
		<div id="product-add">
			<input type="image" src="<?php echo asset_url().'img/addtobagbut.jpg'; ?>" value="Add to bag" />
		</div>
		<div id="product-save">
			<input type="image" src="<?php echo asset_url().'img/savetowishlistbut.jpg'; ?>" value="Save to Wishist" />
		</div>
	</div>
</form>