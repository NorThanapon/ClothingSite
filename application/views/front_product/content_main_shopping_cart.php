<?php echo form_open('cart/check_path'); ?>
<div id="content-Head_name_page">
<h2>MY SHOPPING CART</h2>
<!--<h5>Stock reserved for 60 minutes only</h5>-->
</div>

<div id="content-item_bar">
	<span><b>ITEM DESCRIPTION</b></span>
	<span id="option"><b>YOUR OPTION</b></span>
	<span id="price"><b>PRICE</b></span>
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
					<?php echo anchor(asset_url().'db/products/'.$items[$i]->file_name.'',"<img src='".asset_url().'db/products/'.$items[$i]->file_name."' />",'');	?>
				</div>
				<div class="product-name"><h2><?php echo $items[$i]->product_name_en; ?></h2></div>
				<!-- <div class="item_id"><h2><ITEM ID: <?php// echo $items[$i]->item_id; ?></h2></div>-->
				<div class="product-link">
					<?php //echo anchor('#','SAVE FOR LATER |', 'title="save_for_later"'); ?>
					<?php echo anchor('cart/remove_item/'.$items[$i]->item_id.'','REMOVE', array('title' => "Remove this item",'class' => "remove") ); ?>
				</div>
			</div>
			<div class="option" id="option<?php echo $i; ?>">
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
					<input type="submit" name="change-butt<?php echo $i; ?>" value="" />
				</div>
			</div>
			<!--
			<!-- CHANGE ITEM'S DETAILS 
			<div class="change-option" id="change<?php echo $i; ?>" >
				<div class="image-loading" >
					<img class="imgs<?php echo $i; ?>" src="<?php echo asset_url().'img/loading1.gif'; ?>" />
				</div>
				<div id="change-product-sizecolor">
					<div id="change-detail-size">
						<select id="ddl-detail-size">
							<option value="0"> ---Select Size--- </option>
							<?php 
							foreach($item_detail_size as $item)
							{
							?>
								<option value="<?php echo $item->size; ?>"> <?php echo $item->size; ?> </option>
							<?php
							}
							?>
						</select>
						<h2>Size:</h2>
						
					</div>
					<div id="change-product-color">
						<h2>Color:</h2>
						<div id="color-image">
							<?php
							
							//if($color_in_size != NULL)
							{
							?>
								 <input type="hidden" value="<?php //echo $color_in_size[0]->color_id; ?>" id="select-color" />
							<?php// foreach($color_in_size as $item)
								//{
								?>
									<div  id="<?php// echo $item->color_file_name;?>">
									<img src="<?php //echo asset_url().'db/colors/'.$item->color_file_name; ?>">
									</div>
								<?php
								//} 
							}
								?>
							
						</div>
					</div>
				</div>	
				<div id="change-product-quantity">
					<h2>Quantity:</h2>
					<select id="ddl-product-quantity"> 
					<?php for($q=1;$q<=10;$q++)
					{ 
					?>
						<option value="<?php echo $q; ?>"> <?php echo $q; ?> </option>
			  <?php } ?>
					</select>
				</div>
			</div>
			<!-- END ITEM'S DETAILS -->
			
			
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
		//$('.option').hide();
		//$('.option').show();
		/*
		$('.change-option').show();
		$('#option1')
		$('#change0').hide();
		$('.imgs1').hide();*/
		$()
		//$('.change-option').hide();
	});
</script>