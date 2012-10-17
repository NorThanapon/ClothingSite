	<div id="content-showing">
		<h2>Showing Items 0-10 of 10</h2>
		<?php //echo anchor('#','0','') ?>
		<a id="showing-page" href="#" >1</a>
		<select class="amount" id="amount-item" onchange="inFunction()" >			 
			 <option value="20" selected="selected">20</option>			
			 <option value="40">40</option>
			 <option value="all">all</option>
		</select>
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

	<script type="text/javascript">
	/*$(document).ready(function() {
	$("#amount-item").change(function(){
		//var url = document.URL;
		//var brand_name = <?php echo $re_name ?>;
		
		//url = url.substring(0, brandname);
		//window.alert(url);
		//window.location = url+'/page/'+$('#showing-page').text()+'/'+$('#amount-item').val();
		//$('#amount-item').val($('#amount-item').val());
		alert("in Function");
		
		
	});});*/
	function inFunction()
	{
	
		var url = <?php echo asset_url().'\brand\''.$rename.'\page\''; ?>
		//url = url+
		//if(url.contains("page"))
		{
		//	url = url.substring(0,url.indexOf('/page')+5);
		}
		
		url = url+$('#showing-page').text()+'/'+$('#amount-item').val();
		window.location = url;
		alert("in>>"+url);
	}
	</script>