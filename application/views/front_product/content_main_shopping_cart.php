<?php echo form_open('cart/check_path'); ?>
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
<?php 
	$total_price = 0;
	if($items == FALSE){
?>
		<div id="content-wish_list">
			<div class="empty" >
				<span>Your cart is currently empty.</span>
			</div>
		</div>
<?php
	}
	else{
		for($i=0; $i<count($items); $i++){ ?>
		<div id="content-wish_list">
			<div class="product">
				<div class="product-image">
					<?php echo anchor(asset_url().'db/products/'.$items[$i]->image_file_name.'',"<img src='".asset_url().'db/products/'.$items[$i]->image_file_name."' />",'');	?>
				</div>
				<div class="product-name"><h2><?php echo $items[$i]->product_name_en; ?></h2></div>
				<div class="product-link">
					<?php echo anchor('#','SAVE FOR LATER |', 'title="save_for_later"'); ?>
					<?php echo anchor('cart/remove_item/'.$items[$i]->item_id.'','REMOVE', array('title' => "Remove this item",'class' => "remove") ); ?>
				</div>
			</div>
			<div class="option">
				<div>
				<span class="option-color">Color:</span>
				<span><?php echo $items[$i]->color_name; ?></span>
				</div>
				<div>
				<span class="option-size">Size:</span>
				<span><?php echo $items[$i]->size; ?></span>
				</div>
				<div>
				<span class="option-quantity">Quantity:</span>
				<?php 
				$quantity = 0;
				for($k=0; $k<count($detail)-1; $k++){
					$str = explode(',',$detail[$k]);
					
					if($str[0] == $items[$i]->item_id ){
						$quantity = $str[1];
					}
				}	
				?>
				<span><?php echo $quantity; ?></span>
				</div>
				<div class="option-button" >
					<input type="submit" value="" />
				</div>
			</div>
			<div class="price">
				<div class="price-product"><?php	if($items[$i]->on_sale == 1){
														$price = $items[$i]->markdown_price * $quantity;
														echo number_format($price,2, '.', ',');
														$total_price += $price;
													}
													else{
														$price = $items[$i]->markup_price * $quantity;
														echo number_format($price,2, '.', ',');
														$total_price += $price;
													}
											?></div>
			</div>
		</div>
<?php 
		}
}
 ?>

<!-- ------------------------------------------------------------------- -->

<div id="content-footer_wish_list">
	<div id="footer-calculate">
		<span id="subtotal">
		<div class="font-footer">Subtotal before Delivery Charges</div>
		<div class="num-footer"><?php echo number_format($total_price,2, '.', ','); ?></div>
		</span>
		<br />
		<span id="delivery-charge">
		<div class="font-footer">Delivery Charges</div>
		<div class="num-footer"><?php $charge = 10;
									  if($items == FALSE){
										$charge = 0;
									  }
									  echo number_format($charge,2, '.', ',');
									  $total_price += $charge; ?>
		</div>
		</span>
	</div>
	<div id="footer-total">
	<div class="total"><b>Total cost</b></div>
	<div class="total-num"><?php echo number_format($total_price,2, '.', ','); ?></div>
	</div>
	<div class="footer-continue-button">
		<input type="submit" value=" " name="continue" />
	</div>
	<div class="footer-button">
		<input type="submit" value=" " name="pay" />
	</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function() {
	
	});
</script>