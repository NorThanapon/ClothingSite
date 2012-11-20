
<fieldset id="invoice">
<div id="payment-head">
	<div id="header-logo">
					<?php echo anchor(base_url(), '<img src='.asset_url().'img/bfashshop.jpg />', 'title="BfashShop"'); ?>
	</div>
	<div id="campany_contact_en" class="contact">
		<p class="text_bold">I.C.C. International Public Company Limited<br />
		Address: 530 Soi Sathupradit 58, Bangpongpang, Yannawa, Bangkok 10120<br />
		Tel. 02-293-9000,02-293-9300<br />
		Fax. 02-294-3024</p>
	</div>
	<div id="campany_contact_th" class="contact">
	
	</div>
</div>
<div id="main-step4">
	<div id="top-main-step4">
		<div id="customer-info">
			<div id="customer-head">
				<label class="head">Customer Info.</label>
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
				<label class="head">Order Info.</label>
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
	<div id="pay-attention">
		<label><font style="color:red;font-weight:bold">Note:</font> <br /><br />Please  transfer the total amount to:<br /> 
		<br /><font style="font-weight:bold">ICC International Public Company Limited</font>
		<br /><font style="font-weight:bold">Account Number:</font>  
		<br /><font style="font-weight:bold">Bank:</font> <br />
		<br />
		<label for="date_expire_payment" id="date_expire_payment"></label>
		Please make your payment by <?php echo $date_expire_full_month_name;?>  
		<br />After the transfer is completed, please upload your pay-in-slip<br />  
		information at the &lsquo;<a href="###">payment confirmation page</a>&rsquo; or fax to 02-123-4567</label>
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

</div>
</fieldset>	
<div id="invoice-page">	
<input type="button" value="Print this page" onclick="print()">	
<?php echo form_open(''); ?>
<input type="submit" name="btn_go_to_homepage" value="Continue Shopping" />
</form>
</div>
