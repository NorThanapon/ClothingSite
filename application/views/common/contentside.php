<div id="content-side" >
	<div class="side-ad">
	<a href="<?php echo base_url().'tag/UpTo70/4'; ?>" class="ad" ><img src="<?php echo asset_url().'img/ad.jpg'; ?>"></a>
	</div>
	<nav>
		<section class="side-navbox" id="side-navbox-newarrivals">
		<h2><?php echo $this->lang->line('new arrivals') ?><img src="<?php echo asset_url().'img/new.gif'; ?>" /> </h2>
		<a href="###">Clothing</a><br />
		<a href="###">Shoes & Accs</a><br />
		<a href="###">Designer</a><br />		
		</section>
		<section class="side-navbox" id="side-navbox-brand">
		<h2><?php echo $this->lang->line('brands') ?></h2>
		<?php
		foreach($brand_list as $item)
		{
		?>
		    
			<?php 
			//$re_brand_name = str_replace(' ','_',$item->brand_name);
			$re_brand_name = preg_replace('~[^a-z0-9._]+~i', '-', $item->brand_name);
			echo anchor('brand/'.$re_brand_name.'/'.$item->brand_id, $item->brand_name,'title="'.$item->brand_name.'"'); ?><br />
			
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
<script type="text/javascript">
	$(document).ready(function() {
		$('a.ad').click(function() { 
		
		});
	});
</script>