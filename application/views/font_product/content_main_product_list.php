	<div id="content-showing">
		<h2>Showing Items 0-10 of 10</h2>
		<?php //echo anchor('#','0','') ?>
		<a id="showing-page" href="#" >1</a>
		<select class="amount" id="amount-item" onchange="changepath()"  >			 
			 <option value="20" selected="selected">20</option>			
			 <option value="40">40</option>
			 <option value="all">All</option>
		</select>
	</div>
	<div id="product-list">
		
		<?php 
		
		foreach($products as $item)
		{	
			
		?>
			<div class="sub-product">
			
				<a  href="<?php echo $current."/".$item->product_id;?>" title="<?php echo $item->image_file_name; ?>">
				<img src="<?php echo asset_url().'db/products/'.$item->image_file_name."";?>" alt="" />
				</a>				
					<h2><?php echo $item->product_name_en;?></h2>
					<div id="detail-price">
					<?php 
						if($item->on_sale==true)
						{
							echo "<h3> was ".$item->markup_price." THB</h3>";
							echo "<h2>".$item->markdown_price." THB</h2>";
						}
						else
						{
							echo "<h1>".$item->markup_price." THB</h1>";
							echo "<h2><br /></h2>";
						}
					?>
						
					</div>
			</div>
		<?php 
		
		}
		?>
	</div><!-- product-list -->

	<script type="text/javascript">
	
	//$(document).ready(function() {
	//$("#amount-item").change(function(){
	//	var url = document.URL;
	//	window.alert(url);
	//	url = url.substring(0, url.indexOf('/brand/') + 7);
	//	<?php $new_name = str_replace(' ','_',$re_name); ?>	    
	//	url = url + "<?php echo $new_name ?>" + "/page/";
	//	url = url + $('#showing-page').text() + "/" + $('#amount-item').val();
		
	//	window.location = url;		
	//});
	//});
	
	function changepath()
	{
		var url = document.URL;		
		url = url.substring(0, url.indexOf('/brand/') + 7);
		<?php $new_name = str_replace(' ','_',$re_name); ?>	    
		url = url + "<?php echo $new_name ?>" + "/page/";
		url = url + $('#showing-page').text() + "/" + $('#amount-item').val();
		//window.alert(url);
		window.location = url;	
	}
	</script>