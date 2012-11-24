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

	<div class="order-history-main">
		
		<?php echo form_open('orderhistory/detail'); ?>
		<div class="report-items">
			<table class="tablesorter">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>Order Date</th>
						<th>Item</th>
						<th>Price</th>
						<th>Status</th>
						<th>View payment slip</th>
						<th>View Order detail</th>
					</tr>
				</thead>
				<tbody>
				<?php								
				foreach($orders as $order)
				{
				?>	
					<tr>
						<td><?php echo $order->order_id; ?></td>
						<td><?php echo date("d/M/Y", $order->date_add); ?></td>
						<td><?php echo $order->item_number; ?></td>
						<td><?php echo number_format($order->total_price,2); ?></td>
						<td><?php echo $order->status; ?></td>
						<td>slip</td>
						<td><input class='image_view_icon' type='image' src='<?php echo asset_url()."img/view_icon.png"; ?>' alt='Submit' value='<?php echo $order->order_id; ?>' name='order_id' /></td>
					</tr>
				<?php
				}
				?>
				</tbody>				
			</table>
		</div>
		</form>
	</div>
</div>
<div class="table_page_order_history">
<?php $this->load->view('common/table_pager');?>
</div>
<script type="text/javascript">		
	$(document).ready(function() {	
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
				7:{sorter:false}
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