<div id="content-order-history">
	<div id="order-history-head">
		<?php echo anchor(base_url(), '<img src='.asset_url().'img/LOGO-bfashshop.png />', 'title="BfashShop"'); ?>
	    <span>Order History</span>
	</div>
	<div id="hr-shadow"></div>
	
	<div id = "member_profile">
		<div id="customer-info">
			<div id="customer-head">
				<label class="head">Customer Infomation</label>
				<label class="sub-head">First name :</label>
				<label class="sub-head">Last name :</label>
				<label class="sub-head">Tel. :</label>
				<label class="sub-head">Moblie :</label>
				<label class="sub-head">Address :</label>
				<label class="sub-head">Postal code :</label>					
			</div>
			<div id="customer-detail">
				<label > &nbsp </label>
				<label class="sub-head" ><?php echo $first_name;?></label>
				<label class="sub-head" ><?php echo $last_name;?></label>
				<label class="sub-head" ><?php echo $telephone;?></label>
				<label class="sub-head" ><?php echo $mobile;?></label>
				<label class="sub-head" ><?php echo $address;?></label>
				<label class="sub-head" ><?php echo $postcode;?></label>
			</div>
		</div>
	</div>
	
	<div id="order-history-main">
		<?php echo form_open('orderhistory/detail'); ?>
			<table class="tablesorter">
				<tr class="order-history-head-row" >
					<th>Order ID</th>
					<th>Order Date</th>
					<th>Item</th>
					<th>Price</th>
					<th>Status</th>
					<th>View payment slip</th>
					<th>View Order detail</th>
				</tr>
				<?php
				$i=0;
				foreach($orders as $order)
				{
					echo "<tr class='order-history-head-row' >";
					echo "<td>".$order->order_id."</td>";
					echo "<td>".date("d/M/Y", $order->date_add)."</td>";
					echo "<td>".$order->item_number."</td>";
					echo "<td>".number_format($order->total_price,2)."</td>";
					echo "<td>".$order->status."</td>";
					echo "<td>"."slip"."</td>";
					echo "<td>"."<input class='image_view_icon' type='image' src='".asset_url()."img/view_icon.png' alt='Submit' value='".$order->order_id."' name='order_id'>"."</td>";
					echo "</tr>";
				}
				?>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">		
	$(document).ready(function() {	
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter").tablesorter({
			headers: {
			    0:{sorter:false},
			    8:{sorter:false}
			}
		    })
		    .tablesorterPager({
			container: $(".table-pager"),
			positionFixed: false,
			size:20
		    });
		$(".tablesorter").on('sortEnd', function(){
		    //set striping color
		    $(".tablesorter").find('tr').removeClass('even');
		    $(".tablesorter").find("tr:even").addClass("even");
		});
	}); 
	</script>