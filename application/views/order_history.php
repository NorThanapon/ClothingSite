<div id="content-order-history">
	<div id="order-history-head">
		<?php echo anchor(base_url(), '<img src='.asset_url().'img/LOGO-bfashshop.png />', 'title="BfashShop"'); ?>
	    <span>Order History</span>
	</div>
	<div id="hr-shadow"></div>
	<div id="order-history-main">
	<table class="order-detail">
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
		foreach($orders as $order)
		{
			echo "<tr class='order-history-head-row' >";
			echo "<td>".$order->order_id."</td>";
			echo "<td>".$order->date_add."</td>";
			echo "<td>"."Item?"."</td>";
			echo "<td>".$order->total_price."</td>";
			echo "<td>".$order->status."</td>";
			echo "<td>"."slip"."</td>";
			echo "<td>"."order detail"."</td>";
			echo "</tr>";
		}
		?>
	</table>
	</div>
</div>