	<div id="content-image">
	<?php $color_in_size; ?>
		<div class="main-image">
		<a href="<?php echo asset_url().'db/products/'.$product_detail->image_file_name; ?>" class="jqzoom" rel='gal1'  title=" " >
            <img src="<?php echo asset_url().'db/products/'.$product_detail->image_file_name; ?>"  title=" "  style="width:265px;height:345px;">
        </a>
			
		</div>

		<div id="product-sub">
		
		<div class="sub-image">
		 
		<ul id="thumblist" class="clearfix" >
			
		<?php
		foreach($sub_image as $item)
		{	
			
		?>		
			<li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo asset_url().'db/products/m_'.$item->image_file_name; ?>',largeimage: '<?php echo asset_url().'db/products/l_'.$item->image_file_name; ?>'}"><img src='<?php echo asset_url().'db/products/s_'.$item->image_file_name; ?>'></a></li>
			
		<?php
		}
		?>
		</ul>
		
		</div>
		
		</div>		
	</div>
	<div id="content-product" >
		<div id="product-particular">
			<div id="detail-name">
				<a href="<?php echo asset_url().'db/brands/'.$product_detail->logo; ?>"><img src="<?php echo asset_url().'db/brands/'.$product_detail->logo; ?>"></a>
				<br />
				<h1> <?php echo $product_detail->product_name_en ?> </h1>
					<input type="hidden" id="item_id" value="" />
					<div id="item-detail" value="item-detail">
						 
					</div>
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
				
				<a href="###" >Size Chart</a>
			</div>
			<div id="product-color">
			   
				<h2>Color:</h2>
				<div id="color-image">
					<?php
					
					if($color_in_size != NULL)
					{
					?>
						 <input type="hidden" value="<?php echo $color_in_size[0]->color_id; ?>" id="select-color" />
					<?php foreach($color_in_size as $item)
						{
						?>
							<div  id="<?php echo $item->color_file_name;?>">
							<img src="<?php echo asset_url().'db/colors/'.$item->color_file_name; ?>">
							</div>
						<?php
						} 
					}
						?>
					
				</div>
			</div>
		</div>
		<div id="product-quantity">
			<select id="ddl-product-quantity"> 
				<option value ="0"> ---Quantity--- </option>
			<?php for($q=1;$q<=10;$q++)
			{ 
			?>
				<option value="<?php echo $q; ?>"> <?php echo $q; ?> </option>
	  <?php } ?>
			</select>
			
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			</div>
			<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
			<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4fcdc647303bdb9e"></script>
			<!-- AddThis Button END -->
			</h2>
		</div>
		<div id="product-add">
			<input type="image" src="<?php echo asset_url().'img/addtobagbut.jpg'; ?>" value="Add to bag" id="add-to-cart" />
		</div>
		<div id="product-save">
			<input type="image" src="<?php echo asset_url().'img/savetowishlistbut.jpg'; ?>" value="Save to Wishist" id="add-to-wishlist" />
		</div>
	</div>
	
	<script type="text/javascript">
	
		$(document).ready(function() {
		$("#ddl-detail-size").change(function()
		{
			size = $(this).val();
			url = "<?php echo base_url('ajax/color_ajax/'.$product_detail->product_id);?>/"+size; // we will fix this later
			
			$.getJSON(url, function(data){
				var color_div = document.getElementById('color-image');
				color_div.innerHTML = "";
				$("#color-image").html("");
				for(i = 0; i<data.length;i++) {
					color = data[i];
					//alert(data);
					$("#color-image")
						.append($('<div></div>').attr('id',"div"+color.color_id)
							.append($('<img></img>')
								.attr('src','<?php echo asset_url().'db/colors/'; ?>'+color.color_file_name)
								.attr('id', color.color_id)
								
							)
						);
					
					$("#"+color.color_id).click(function() {
						$("#select-color").val(this.id)
						var color_id = this.id;
					
					var url_2 = "<?php echo base_url('ajax/item_ajax') . '/' . $product_detail->product_id; ?>/"+size+"/"+color_id;
					//alert(url_2);
					$.getJSON(url_2, function(data){
						$("#item-detail").html("ItemId: "+data.item_id);
						$("#item_id").val(data.item_id);
					});
					var url_3 = "<?php echo base_url('ajax/quantity_ajax') . '/' . $product_detail->product_id; ?>/"+size+"/"+color_id;
					$.getJSON(url_3, function(data){
						alert(data);
					});
						
					});
					
				}
			});
		}).change();
		
		$('#add-to-cart').click(function() {
			if($('#ddl-detail-size').val() == "" ){
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
				var temp = document.getElementById("item-detail");
				var item = $("#item_id").val(); //temp.innerHTML;
				$.ajax({
					
					type: 'POST',
					url: "<?php echo base_url('cart/add_to_cart');?>",
					data:  { item_id: item,
							 quantity: $('#ddl-product-quantity').val(),
						   },
					success: function( data ) {
						//alert(data);
						if(data == 'true')	{
							//alert(quantity);
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
		
				/*
		$('#ddl-detail-size').change(function() {
			$.ajax({
			type: 'POST',
			url: "<?php echo base_url('ajax/product_ajax/'.$product_detail->product_id);?>",
			data: "size=" + $('#ddl-detail-size').val() + "&action=change",
			success: function( data ) {
				if(data == '1')
					alert("1");
				else if(data == $('#ddl-detail-size').val())
					alert("size" + $('#ddl-detail-size').val());
				else
				{
						//alert(data);
					$.getJSON(url, function(data){
						for(i = 0; i<data.length;i++) 
						{
							color = data[i];
							alert(color);
							//display it somehow
						}
				}
			//window.location.reload();
			//alert($('#ddl-detail-size').val());
			
			}});
		});
		*/
		
		});
		
	$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
	});	

	</script>
				