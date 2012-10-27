	<div id="content-showing">
		<?php 
			  if($num_page == 0)
			  {
		?>
				<h2>Showing Items 0-0 of 0 </h2>
		<?php
			  }
			  for($i=1; $i<=$num_page; $i++)
			  {
				if($i == 1)
				{
				?>
					<h2><?php echo "Showing Items ".$show_start."-".$show_end." of ".$num_item; ?></h2>
				<?php
				}
				if($current_page == $i)
				{
					echo $i." ";
				}
				else
				{
					echo anchor($base_url.'\page\\'.$i.'\\'.$per_page,$i,array('id'=> 'showing-page'.$i ))." ";   
				}
			}
		?>
		<!--<a id="showing-page" href="#" >1</a>-->
		<select class="amount" id="amount-item"  >			 
			 <option value="20" <?php if($per_page == 20) echo "selected"; ?> >20</option>			
			 <option value="40" <?php if($per_page == 40) echo "selected"; ?> >40</option>
			 <option value="" <?php if($per_page !=20 && $per_page != 40) echo "selected"; ?> >All</option>
		</select>
	</div>
	<div id="product-list">
		
		<?php 
		
		//foreach($products as $item)
		for($i=$show_start-1; $i<$show_end; $i++)
		{	
			
			if($i < $num_item)
			{
			//echo $i.":".$num_item;
		?>
			<div class="sub-product">
				<?php echo anchor('productname', '<img src='.asset_url().'db/products/'.$products[$i]->image_file_name.' />', 'title="'.$products[$i]->image_file_name.'"'); ?>
				
				<!--<a  href="<?php //echo $current."/".$item->product_id;?>" title="<?php //echo $item->image_file_name; ?>">
				<img src="<?php //echo asset_url().'db/products/'.$item->image_file_name."";?>" alt="" />
				</a>	
				-->
					<h2><?php echo $products[$i]->product_name_en;?></h2>
					<div id="detail-price">
					<?php 
						if($products[$i]->on_sale==true)
						{
							echo "<h3> was ".$products[$i]->markup_price." THB</h3>";
							echo "<h2>".$products[$i]->markdown_price." THB</h2>";
						}
						else
						{
							echo "<h1>".$products[$i]->markup_price." THB</h1>";
							echo "<h2><br /></h2>";
						}
					?>
						
					</div>
			</div>
		<?php 
			}
		}
		?>
	</div><!-- product-list -->

	<script type="text/javascript">
	
	$(document).ready(function() {
	$("#amount-item").change(function(){
	    var url = document.URL;	
		if(url.indexOf('/page/') > -1)
		{
			url = url.substring(0,url.indexOf('/page/'));
		}
		if($('#amount-item').val() > <?php echo $num_item; ?>)
		{
			url = url+"/page/1/"+$('#amount-item').val();
		}
		else if($('#amount-item').val() == "")
		{
			url = url+"/page/1";
		}
		else{
			url = url+"/page/"+"<?php echo $current_page; ?>"+"/"+$('#amount-item').val();
		}
		//alert(url);
		window.location = url;	
	});
	});
	</script>