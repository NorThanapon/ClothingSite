<?php echo form_open('admin/order/status'); ?>
	<div class="report-action">
	<input type ="hidden" name="order_id" value="<?php echo $order_id;?>" >
		<fieldset>
			<legend>Change Order Status</legend>
			<label>Change selected order status to</label>
			<select name = "change_status">
				<option value="New" <?php if($status == "New")echo "selected='selected'"?>>New</option>
				<option value="Paid" <?php if($status == "Paid")echo "selected='selected'"?>>Paid</option>
				<option value="Partially Paid" <?php if($status == "Partially Paid")echo "selected='selected'"?>>Partially Paid</option>
				<option value="Shipped" <?php if($status == "Shipped")echo "selected='selected'"?>>Shipped</option>
				<option value="Expired" <?php if($status == "Expired")echo "selected='selected'"?>>Expired</option>
			</select>
			<input type = "submit" value = "Update" name="btn_update_order_detail" />
		</fieldset>
	</div> 
</form>
<fieldset id="invoice">
<div id="main-step4">
	<div id="top-main-step4">
		<div id="customer-info">
			<div id="customer-head">
				<label class="head">Customer Information</label>
				<label class="sub-head">First name :</label>
				<label class="sub-head">Last name :</label>
				<label class="sub-head">Tel. :</label>
				<label class="sub-head">Moblie :</label>
				<label class="sub-head">Address :</label>
				<label class="sub-head">Postal code :</label>					
			</div>
			<div id="customer-detail">
				<label > &nbsp </label>
				<label class="sub-head" id="first_name_4"><?php echo $first_name;?></label>
				<label class="sub-head" id="last_name_4"><?php echo $last_name;?></label>
				<label class="sub-head" id="telephone_4"><?php echo $tel;?></label>
				<label class="sub-head" id="mobile_4"><?php echo $mobile;?></label>
				<label class="sub-head" id="address_4"><?php echo $address;?></label>
				<label class="sub-head" id="postcode_4"><?php echo $postcode;?></label>
			</div>
		</div>
		<div id="order-info">
			<div id="order-head">
				<label class="head">Order Information</label>
				<label class="sub-head">Order Number :</label>
				<label class="sub-head">Order date :</label>
				<label class="sub-head">Order expire date :</label>
				<label class="sub-head">Ship by :</label>
			</div>
			<div id="order-detail">
				<label> &nbsp </label>
				<label class="sub-head"><?php echo $order_id ;?></label>
				<label class="sub-head"><?php echo $order_date ;?></label>
				<label class="sub-head"><?php echo $order_expire ;?></label>
				<label class="sub-head">ground</label>
			</div>
		</div>					
	</div>				
	<div id="product-detail">
		
		<table id="product-detail-table_4">
			<tr><th>No.</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Unit Price (THB)</th>
			<th>Price (THB)</th>
			</tr>
			<?php
				$i=1;
				if(isset($products))
				foreach($products as $item)
				{
					echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td>".$item->item_id."</td>";
					echo "<td>".$item->product_name_en."</td>";
					echo "<td>".$item->quantity."</td>";
					echo "<td>".number_format( $item->unit_price , 2, '.', ',')."</td>";
					echo "<td>".number_format( ($item->unit_price*$item->quantity) , 2, '.', ',')."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	
	<div id="total-price">
		<div id="price-head">
			<label>Subtotal :</label>
			<label>Shipping :</label>
			<label>VAT :</label>
			<label class="text_bold" >Total :</label>					
		</div>
		<div id="price-detial">
			<label id="subtotal_4"  ><?php echo $subtotal;?></label>
			<label id="shipping_4"><?php echo $shipping;?></label>
			<label id="vat_4"><?php echo $vat;?></label>
			<label id="total_4" class="text_bold" ><?php echo $total;?></label>
		</div>
		
		
	</div>
	<div class="report-items photo-item">
		<?php 
		if($image_payment!="")
		{
		?>
			
				<a class="fancybox-button" rel="fancybox-button" href="<?php echo asset_url().'db/payment/'.$image_payment.""; ?>" title="transfer slip">
				<img src="<?php echo asset_url().'db/payment/'.$image_payment."";?>" alt="" />
				</a>
			
		<?php
		}
		else	
		{			
			echo "<p>Unupload Transfer Slip</p>";
		}
		?>
		
	</div>
	

</div>

</fieldset>
<div class="content-right form-action">
	<?php echo anchor('admin/order','Done' ,array('class' => 'button')); ?>
</div>
<script type="text/javascript"> 
$(document).ready(function() {
	$('.fancybox-button').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : false,
				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},
				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
	});
});
</script>