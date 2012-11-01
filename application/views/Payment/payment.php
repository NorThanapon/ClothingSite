		<form>
			<div id="payment-head">
			 <div id="header-logo">
				<?php echo anchor(base_url(), '<img src='.asset_url().'img/bfashshop.jpg />', 'title="BfashShop"'); ?>
			</div>
			<span class="head-step4">
				<h1>Step 4</h1>
				<h5>confirmation</h5>
			</span>
			<span class="head-step3">
				<h1>Step 3</h1>
				<h5>Payment</h5>
			</span>
			<span class="head-step2">
				<h1>Step 2</h1>
				<h5>Shipping</h5>
			</span>
			
			<span class="head-step1">
				<h1>Step 1</h1>
				<h5>Sign In</h5>
			</span>
			</div>
						
			<fieldset id="step1">
				<legend>Sign In</legend>
				<div id="main-step1">
				<label>E-mail</label> 
				<input name="e_mail" type="text" id="e_mail" />
				<label>Password</label> 
				<input name="password" type="password" id="password" />
				<label>Confirm Password</label> 
				<input name="confirm_password" type="password" id="confirm_password" />	
				<input type="submit" id="sign-in" name="signin" value="Sign In" />
				<input type="submit" id="register" name="register" value="Register" />			
				</div>
			</fieldset>
						
			<fieldset id="step2">
				<legend>Shipping</legend>
				<div id="main-step2">
					<!-- <div class="head-step2">
						<label>First name</label>
						<label>Last name</label>
						<label>Telephone</label>
						<label>Mobile</label>
						<label>Address</label>
						<label id="postal-code">Postal code</label>
					</div>
					<div class="input-step2">						
						<input type="text" />
						<input type="text" />
						<input type="text" class="phone-txt" />	
						<input type="text" class="phone-txt" />
						<textarea  type="text" ></textarea>
				
						<input type="text" class="post-code-txt" />
					</div>
					-->
					
					<table>
						<tr>
							<td><label>First name</label></td>
							<td><input type="text" value="<?php echo $first_name ;?>" id="first_name" /></td>							
						</tr>
						<tr>
							<td><label>Last name</label></td>
							<td><input type="text" value="<?php echo $last_name ;?>" id="last_name" /></td>							
						</tr>
						<tr>
							<td><label>Telephone</label></td>
							<td><input type="text" value="<?php echo $telephone ;?>" id="telephone" /></td>							
						</tr>
						<tr>
							<td><label>Mobile</label></td>
							<td><input type="text" value="<?php echo $mobile ;?>" id="mobile" /></td>							
						</tr>
						<tr>
							<td><label>Address</label></td>
							<td><textarea  type="text" value="<?php echo $address ;?>" id="address" ></textarea></td>							
						</tr>
						<tr>
							<td><label>Postal code</label></td>
							<td><input type="text" class="post-code-txt" value="<?php echo $postcode ;?>" id="postcode" /></td>							
						</tr>
					</table>
					<input type="submit" id="submit-step2" name="submit-step2" value="Submit" />
					<input type="submit" id="back-step2"   value="Back" />
				</div>
			</fieldset>
			
			<fieldset id="step3">
				<legend>Review your order</legend>
				<div id="main-step3">
					<div id="top-main-step3">
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
								<label class="sub-head" id="first_name_3"></label>
								<label class="sub-head" id="last_name_3"></label>
								<label class="sub-head" id="telephone_3"></label>
								<label class="sub-head" id="mobile_3"></label>
								<label class="sub-head" id="address_3"></label>
								<label class="sub-head" id="postcode_3"></label>
							</div>
						</div>
						<div id="order-info">
							<div id="order-head">
								<label class="head">Order Info.</label>
								<label class="sub-head">Order Number :</label>
								<label class="sub-head">Ship by :</label>
							</div>
							<div id="order-detail">
								<label> &nbsp </label>
								<label class="sub-head"><?php echo $order_number ;?></label>
								<label class="sub-head">ground</label>
							</div>
						</div>					
					</div>				
					<div id="product-detail">
						
						<table id="product-detail-table">
							<tr>
								<th>Product ID</th>
								<th>Product Description</th>
								<th>Quantity</th>
								<th>Unit Price (THB)</th>
								<th>Price (THB)</th>
							</tr>
							<?php 
							//for($i=0;$i<count($items_order);$i++)
							{
							
							echo "<tr>";
							//echo "<td id='item_id_3_".$i."'></td>";
							//echo "<td>".$items_order[$i]->product_descrption_en."</td>";
							//echo "<td>".$items_order[$i]->quantiity."</td>";
							//echo "<td>".$items_order[$i]->unit_price."</td>";
							//echo "<td>".$items_order[$i]->total_price."</td>";
							echo "</tr>";
							
							}
							?>
						</table>
					</div>
					<div id="total-price">
						<div id="price-head">
							<label >Subtotal :</label>
							<label >Shipping :</label>
							<label >Tax :</label>
							<label >Total :</label>					
						</div>
						<div id="price-detial">
							<label ><?php// echo $subtotal ;?>THB</label>
							<label ><?php// echo $shipping ;?> THB</label>
							<label ><?php// echo $vat ;?> THB</label>
							<label ><?php// echo $total ;?> THB</label>
						</div>
						<input type="submit" id="submit-step3" name="submit-step3" value="Confirm" />
						<input type="submit" id="back-step3"  value="Back" />
					</div>
					
				</div>
			</fieldset>
			
			<fieldset id="step4">
				<legend>Review your order</legend>
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
								<label class="sub-head" id="first_name_4"></label>
								<label class="sub-head" id="last_name_4"></label>
								<label class="sub-head" id="telephone_4"></label>
								<label class="sub-head" id="mobile_4"></label>
								<label class="sub-head" id="address_4"></label>
								<label class="sub-head" id="postcode_4"></label>
							</div>
						</div>
						<div id="order-info">
							<div id="order-head">
								<label class="head">Order Info.</label>
								<label class="sub-head">Order Number :</label>
								<label class="sub-head">Order date :</label>
								<label class="sub-head">Ship by :</label>
							</div>
							<div id="order-detail">
								<label> &nbsp </label>
								<label class="sub-head"><?php echo $order_number ;?></label>
								<label class="sub-head"><?php echo $order_date ;?></label>
								<label class="sub-head">ground</label>
							</div>
						</div>					
					</div>				
					<div id="product-detail">
						
						<table id="product-detail-table">
							<tr>
								<th>Product ID</th>
								<th>Product Description</th>
								<th>Quantity</th>
								<th>Unit Price (THB)</th>
								<th>Price (THB)</th>
							</tr>
							<?php 
							if(isset($items_order))
							{
							//foreach($items_order as $item)
							{
							
								echo "<tr>";
							//	echo "<td>".$item->item_id."</td>";
							//	echo "<td>".$item->product_descrption_en."</td>";
							//	echo "<td>";
							//	foreach($cookie_cart as $cart)
								{
									//if($cart[0] == $item->item_id )echo $cart[1];
								}
							//	echo "</td>";
							//	echo "<td>".$item->unit_price."</td>";
							//	echo "<td>".$item->total_price."</td>";
								echo "</tr>";
							
							}
							}
							?>
						</table>
					</div>
					<div id="pay-attention">
						<label>Please  transfer the total amount to Account Number ..................... <br />
						ICC International Public Company Limited, .... Bank.<br />
						<br />
						After the transfer, please upload your pay-in-slip<br /> 
						at &lsquo;confirm payment &rsquo; page or fax to 02-123-4567</label>
					</div>
					<div id="total-price">
						<div id="price-head">
							<label >Subtotal :</label>
							<label >Shipping :</label>
							<label >VAT :</label>
							<label >Total :</label>					
						</div>
						<div id="price-detial">
							<label ><?php //echo $subtotal ;?>THB</label>
							<label ><?php //echo $shipping ;?> THB</label>
							<label ><?php// echo $vat ;?> THB</label>
							<label ><?php// echo $total ;?> THB</label>
						</div>
						<input type="submit" id="submit-step4" name="submit-step4" value="Confirm" />
						<input type="submit" id="back-step4"   value="Back" />
					</div>
					
				</div>
			</fieldset>		
		</form>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#register').click(function(event){//register
					event.preventDefault();					
					$.ajax({
					type: 'POST',
					url: "<?php echo base_url('payment/register');?>",//controller path; go function
					data:  {e_mail: $('#e_mail').val(), // set data variable and assign value from body
							password: $('#password').val(),
							confirm_password: $('#confirm_password').val()
						   },
					success: function( data ) { // if success do something ;data is returned
						if( data == 'true' )
						{
							
						}
						else
						{
							alert(data);
						}						
					}				
					});	
				});
				$('#sign-in').click(function(event){//register
					event.preventDefault();					
					$.ajax({
					type: 'POST',
					url: "<?php echo base_url('payment/login_member');?>",//controller path; go function
					data:  {e_mail: $('#e_mail').val(), // set data variable and assign value from body
							password: $('#password').val()
							
						   },
					success: function( data ) { // if success do something ;data is returned
									
						if(data == 'true' )
						{
							$('#step1').css('display','none');
							$('#step2').css('display','block');
							$('#step3').css('display','none');
							$('#step4').css('display','none');
							
							$('.head-step1').css('color','#A0A0A0');
							$('.head-step2').css('color','#353535');
							$('.head-step3').css('color','#A0A0A0');
							$('.head-step4').css('color','#A0A0A0');
						}
						else
						{
							alert(data);
						}						
					}				
					});	
				});
				
				$('#submit-step2').click(function(event){
					event.preventDefault();					
					$.ajax({
					type: 'POST',
					url: "<?php echo base_url('payment/step_2');?>",//controller path; go function
					data:  {e_mail: $('#e_mail').val(), // set data variable and assign value from body
							first_name: $('#first_name').val(),
							last_name: $('#last_name').val(),
							telephone: $('#telephone').val(),
							mobile: $('#mobile').val(),
							address: $('#address').val(),
							postcode: $('#postcode').val()						
						   },
					success: function( data ) { // if success do something ;data is returned
									
						if(data == 'true' )
						{
							$("#first_name_3").html($('#first_name').val());
							$("#last_name_3").html($('#last_name').val());
							$("#telephone_3").html($('#telephone').val());
							$("#mobile_3").html($('#mobile').val());
							$("#address_3").html($('#address').val());
							$("#postcode_3").html($('#postcode').val());
							
							
							
							$('#step1').css('display','none');
							$('#step2').css('display','none');
							$('#step3').css('display','block');
							$('#step4').css('display','none');
							
							$('.head-step1').css('color','#A0A0A0');
							$('.head-step2').css('color','#A0A0A0');
							$('.head-step3').css('color','#353535');
							$('.head-step4').css('color','#A0A0A0');
							
		
						}
						else
						{
							alert(data);
						}						
					}				
					});	
					
				});
				
				$('#submit-step3').click(function(event){
					event.preventDefault();
					
					$("#first_name_4").html($('#first_name').val());
					$("#last_name_4").html($('#last_name').val());
					$("#telephone_4").html($('#telephone').val());
					$("#mobile_4").html($('#mobile').val());
					$("#address_4").html($('#address').val());
					$("#postcode_4").html($('#postcode').val());
							
					$('#step1').css('display','none');
					$('#step2').css('display','none');
					$('#step3').css('display','none');
					$('#step4').css('display','block');
					
					$('.head-step1').css('color','#A0A0A0');
					$('.head-step2').css('color','#A0A0A0');
					$('.head-step3').css('color','#A0A0A0');
					$('.head-step4').css('color','#353535');
				});
				
				$('#back-step2').click(function(event){
					event.preventDefault();
					$('#step1').css('display','block');
					$('#step2').css('display','none');
					$('#step3').css('display','none');
					$('#step4').css('display','none');
					
					$('.head-step1').css('color','#353535');
					$('.head-step2').css('color','#A0A0A0');
					$('.head-step3').css('color','#A0A0A0');
					$('.head-step4').css('color','#A0A0A0');					
					
				});
				
				$('#back-step3').click(function(event){
					event.preventDefault();
					$('#step1').css('display','none');
					$('#step2').css('display','block');
					$('#step3').css('display','none');
					$('#step4').css('display','none');
					
					$('.head-step1').css('color','#A0A0A0');
					$('.head-step2').css('color','#353535');
					$('.head-step3').css('color','#A0A0A0');
					$('.head-step4').css('color','#A0A0A0');
				});
				
				$('#back-step4').click(function(event){
					event.preventDefault();
					$('#step1').css('display','none');
					$('#step2').css('display','none');
					$('#step3').css('display','block');
					$('#step4').css('display','none');
					
					$('.head-step1').css('color','#A0A0A0');
					$('.head-step2').css('color','#A0A0A0');
					$('.head-step3').css('color','#353535');
					$('.head-step4').css('color','#A0A0A0');
				});
				
				$('.back-button').click(function(e){				
					history.back();
				});
			});
		</script>
