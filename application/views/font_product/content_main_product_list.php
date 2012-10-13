	<div id="content-showing">
		<h2>Showing Items 0-10 of 10</h2>
		<?php echo anchor('#','0','') ?>
	</div>
	<div id="product-list">
		<?php foreach($products as $item)
		{
		?>
			<div class="sub-product">
				<?php echo anchor(asset_url().'\assets\db\products\product1.png',"<img src='".asset_url().'img/product1.png'."' />",'');	?>
					<h2><?php echo $item->product_name_en;?></h2>
					<div id="detail-price">
						<h3><?php echo "was ".$item->markup_price." THB"?></h3>
						<h2><?php echo $item->markup_price." THB"?></h2>
					</div>
			</div>
		<?php }?>
	</div><!-- product-list -->
