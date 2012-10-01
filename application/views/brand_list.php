	<div id="content-history">	
		<span class="history-previous"><?php echo anchor('#','Home >', 'title="Home"'); ?></span>
		<span class="history-previous"><?php echo anchor('#','brands >', 'title="Brand"'); ?></span>
		<span id="history-current"><?php echo anchor('#', $brands->brand_name, 'title="'.$brands->brand_name.'"'); ?></span>
	</div>
	<div id="content-showing">
		<h2>Showing Items 0-10 of 10</h2>
		<?php echo anchor('#','0','') ?>
	</div>
	<div id="product-list">
		<div class="sub-product">
			<?php foreach($products as $item)
			{
				echo anchor(asset_url().'img/product1.png',"<img src='".asset_url().'img/product1.png'."' />",'');	?>
				<h2><?php echo $item->brand_name;?></h2>
				<div id="detail-price">
					<h3><?php echo $item->markup_price;?></h3>
					<h2><?php echo $item->markup_price;?></h2>
				</div>
			<?php 
			}?>
		</div>
	</div><!-- product-list -->
