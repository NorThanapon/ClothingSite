
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
		<input type="hidden" name="count-item" value="<?php echo count($items);?>" />
		<div id="content-wish_list">
			<div class="product">
				<div class="product-image">
					<?php echo anchor(asset_url().'db/products/'.$items[$i]->file_name.'',"<img src='".asset_url().'db/products/'.$items[$i]->file_name."' />",'');	?>
				</div>
				<div class="product-name"><h2><?php echo $items[$i]->product_name_en; ?></h2></div>
				<div class="item-id" id="item-id<?php echo $items[$i]->item_id; ?>">ITEM ID: <?php echo $items[$i]->item_id; ?></div>
			
				<div class="product-link">
					<?php //echo anchor('#','SAVE FOR LATER |', 'title="save_for_later"'); ?>
					<?php echo anchor('cart/remove_item/'.$items[$i]->item_id.'','REMOVE', array('title' => "Remove this item",'class' => "remove") ); ?>
				</div>
			</div>
			<input type="hidden" id="sel-option" />
			<div class="option" id="option<?php echo $items[$i]->item_id; ?>">
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
				<input type="hidden" name="item-qty-<?php echo $items[$i]->item_id; ?>" value="<?php echo $quantity; ?>" />
				<span><?php echo $quantity; ?></span>
				</div>
				<div class="option-button" >
					<input type="submit" class="option-butt" name="<?php echo $items[$i]->item_id; ?>" value=" " />
				</div>
			</div>
			<!-- CHANGE ITEM'S DETAILS -->
			<input type="hidden" id="sel-change" />
			<img class="imgs-loading" id="loading<?php echo $items[$i]->item_id; ?>" src="<?php echo asset_url().'img/loading1.gif'; ?>" />
			
			<div class="change-option" id="change<?php echo $items[$i]->item_id; ?>" >
				
				<div id="change-product-sizecolor">
					<div id="change-detail-size">
						<select class="dll-size-item" name="dll-size-<?php echo $items[$i]->item_id; ?>">
							
						</select>
						<h2>Size:</h2>
					</div>
					<input type="hidden" name="sel-color" />
					<div id="change-product-color">
						<h2>Color:</h2>
						<div id="color-image<?php echo $items[$i]->item_id; ?>">
			
						</div>
					</div>
				</div>	
				<div class="change-quantity" id="change-product-quantity">
					<h2>Quantity:</h2>
					<select name="change-quantity<?php echo $items[$i]->item_id; ?>"> 
			 
					</select>
				</div>
				<div class="update-button" >
					<input type="submit" class="cancel-butt" name="cancel<?php echo $items[$i]->item_id; ?>" value=" " />
					<input type="submit" class="update-butt" name="update<?php echo $items[$i]->item_id; ?>" value=" " />
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
											?>
				</div>
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
<?php echo form_open('cart/check_path'); ?>
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
		$('.imgs-loading').hide();
		$('.change-option').hide();
		$('.option-butt').click(function (){
			
			$('.change-option').hide();
			var n = $(this).attr("name");
			
			$('#sel-option').val(n);
			
			$('#loading'+n).bind('ajaxStart', function () {
				$(this).show();
				$('#option'+n).hide();
			}).bind('ajaxStop', function () {
				$(this).hide();
			});
			
			var path = "<?php echo base_url('cart/load_value');?>";
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: path,
				data: {	item_id: n },
				error: function(data, textStatus, xhr){
					alert(xhr);
				},
				success: function(data){
					$('.option').show();
					$('#option'+n).hide();
					$('#change'+n).show();
					//$('.change-option').show();
					//set size
					for(i=0; i<data['item_detail_size'].length ;i++){
						var option = "<option value='"+data['item_detail_size'][i].size+"' > "+data['item_detail_size'][i].size+"</option>";
						if(data['item_detail_size'][i].size == data['item'].size){
							option = "<option value='"+data['item_detail_size'][i].size+"' selected > "+data['item_detail_size'][i].size+"</option>";
						}
						$('select[name=dll-size-'+n+']').append(option);
					}
					
					//set quantity			
					for(i=0; i<10 ; i++){
						var option_qty = "<option value="+i+"> "+i+" </option>";
						if(i == $('input[name=item-qty-'+n+']').val() ){
							option_qty = "<option value="+i+" selected > "+i+" </option>";
						}
						$('select[name=change-quantity'+n+']').append(option_qty);
					}					

					//set color
					var color_div = document.getElementById('color-image'+n);
					color_div.innerHTML = "";
					$("#color-image").html("");
					for(i = 0; i<data['color_in_size'].length;i++) {
						color = data['color_in_size'][i];
						
						//alert(data);
						$("#color-image"+n)
							.append($('<div></div>').attr('id',"div"+color.color_id)
								.append($('<img></img>')
									.attr('src','<?php echo asset_url().'db/colors/'; ?>'+color.color_file_name)
									.attr('id', color.color_id)
									.attr('class','div-color')
								)
							);
						if(data['color_in_size'][i].color_id == data['item'].color_id)
						{
							$("#"+color.color_id).css("border","1px solid #3A4F6C");
							$("input[name=sel-color]").val(color.color_id);
						}
						
						$("#"+color.color_id).click(function() {

							var color_id = this.id;
							alert(color_id);

							var c = $('input[name=sel-color]').val();
							$('#'+c).css("border","none");
							$('input[name=sel-color]').val(this.id);
							$(this).css("border","1px solid #3A4F6C");
						
							var url_2 = "<?php echo base_url('cart/get_item_id') ?>"+"/"+data['item'].size+"/"+$('input[name=sel-color]').val();
							$.getJSON(url_2, function(data){
								$("#item-id"+n).html("ITEM ID: "+data['item'].item_id);
							});
						});	
					}
					
					
				}
			});
			
		});
		//$('select[name=dll-size-'+n+']').change(function(){
		$('.dll-size-item').change(function(){
			var n = $(this).attr("name").substring(9);
			var size = $(this).val();
			var path_color = "<?php echo base_url('cart/get_color');?>"+"/"+n+"/"+size;
			//alert(path_color);
			$.getJSON(path_color, function(data){
				var color_div = document.getElementById('color-image'+n);
				color_div.innerHTML = "";
				$("#color-image").html("");
				for(i = 0; i<data['colors'].length;i++) {
					color = data['colors'][i];
					$("#color-image"+n)
						.append($('<div></div>').attr('id',"div"+color.color_id)
							.append($('<img></img>')
								.attr('src','<?php echo asset_url().'db/colors/'; ?>'+color.color_file_name)
								.attr('id', color.color_id)
								.attr('class','div-color')
									)
						);
					$("#"+color.color_id).click(function() {
						var color_id = this.id;
						//alert(color_id);
						var c = $('input[name=sel-color]').val();
						$('#'+c).css("border","none");
						$('input[name=sel-color]').val(this.id);
						$(this).css("border","1px solid #3A4F6C");
								
						var url_2 = "<?php echo base_url('cart/get_item_id') ?>"+"/"+size+"/"+$('input[name=sel-color]').val();
						//alert(url_2);
						$.getJSON(url_2, function(data){
							$("#item-id"+n).html("ITEM ID: "+data['item'].item_id);
						});
					});	
				}
			});
		});
		
		$('.update-butt').click(function(){
			var n = $(this).attr("name").substring(6);
			//alert(n);
			var size = $('select[name=dll-size-'+n+']').val();
			var color = $('input[name=sel-color]').val();
			var qty = $('select[name=change-quantity'+n+']').val();
			
			var s = $('input[name=first-id]').val();
			//alert(n+"  "+size+"  "+color+"  "+qty);
			var path = "<?php echo base_url('cart/update_cookie');?>";
			$.ajax({
				type: 'POST',
				url: path,
				data: {	item_id: n,
						item_size: size,
						item_color_id: color,
						item_qty: qty
				},
				error: function(data, textStatus, xhr){
					alert(xhr);
				},
				success: function(data){
					if(data = 'true'){
						window.location.href = "<?php echo base_url('cart');?>";
					}
					else{
						alert(data);
					}
				}
			});		
		});
		$('.cancel-butt').click(function(){
			var n = $(this).attr("name").substring(6);
			$('#change'+n).hide();
			$('#option'+n).show();
		});
		
});
</script>