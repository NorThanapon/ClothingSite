<div id="content-side" >
	<div class="side-ad">
	<a href="<?php echo asset_url().'img/ad.jpg'; ?>"><img src="<?php echo asset_url().'img/ad.jpg'; ?>"></a>
	</div>
	<nav>
		<section class="side-navbox" id="side-navbox-newarrivals">
		<h2>NEW ARRIVALS</h2>
		<a href="###">Clothing</a><br />
		<a href="###">Shoes & Accs</a><br />
		<a href="###">Designer</a><br />		
		</section>
		<section class="side-navbox" id="side-navbox-brand">
		<h2>BRANDS</h2>
		<?php
		foreach($brand_list as $item)
		{
		?>
			<?php echo anchor('brand/catalog/'.$item->brand_id, $item->brand_name,'title="'.$item->brand_name.'"'); ?><br />
			
		<?php
		}
		?>
		</section>
		<!-- <section class="side-navbox" id="side-navbox-collection">
		<h2>COLLECTION</h2>
		<a href="###"><-Collection-></a><br />
		<a href="###"><-Collection-></a><br />
		<a href="###"><-Collection-></a><br />
		</section> -->
	</nav>
</div><!-- content-side -->