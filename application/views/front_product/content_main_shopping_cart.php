<div id="content-Head_name_page">
<h2>MY SHOPPING CART</h2>
<h5>Stock reserved for 60 minutes only</h5>
</div>

<div id="content-item_bar">
	<span>ITEM DESCRIPTION</span>
	<span id="option">YOUR OPTION</span>
	<span id="price">PRICE</span>
</div>

<!-- ---------------------should be loop of product-------------------- -->
<div id="content-wish_list">
	<?php echo $cookie_name; ?>
	<div class="product">
		<div class="product-image">
			<?php echo anchor(asset_url().'img/product3.jpg',"<img src='".asset_url().'img/product3.jpg'."' />",'');	?>
		</div>
		<div class="product-name"><h2>Just Access Sisk Hand Harness</h2></div>
		<div class="product-link">
			<?php echo anchor('#','SAVE FOR LATER |', 'title="save_for_later"'); ?>
			<?php echo anchor('#','REMOVE', 'title="save_for_later"'); ?>
		</div>
	</div>
	<div class="option">
		<div>
		<span class="option-color">Color:</span>
		<span>Antique gold</span>
		</div>
		<div>
		<span class="option-size">Size:</span>
		<span>One Size</span>
		</div>
		<div>
		<span class="option-quantity">Quantity:</span>
		<span>1</span>
		</div>
		<div class="option-button">
			<?php echo anchor(asset_url().'img/change-detail.png',"<img src='".asset_url().'img/change-detail.png'."' />",'');	?>
		</div>
	</div>
	<div class="price">
		<div class="price-product">180$</div>
	</div>
</div>

<!-- ------------------------------------------------------------------- -->

<div id="content-footer_wish_list">
	<div id="footer-calculate">
		<span id="subtotal">
		<div class="font-footer">Subtotal before Delivery Charges</div>
		<div class="num-footer">1</div>
		</span>
		<br />
		<span id="delivery-charge">
		<div class="font-footer">Delivery Charges</div>
		<div class="num-footer">1</div>
		</span>
	</div>
	<div id="footer-total">
	<div class="total">Total cost</div>
	<div class="total-num">33.00</div>
	</div>
	<div id="footer-button">
		<?php 	echo anchor(asset_url().'img/paynow.png',"<img src='".asset_url().'img/paynow.png'."' />",'');	?>
	</div>
</div>
