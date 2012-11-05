		<!--<form>-->
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
				
				<a href="javascript:void(0)" class="forget_password" title="Thai">Forgotten Password</a>
				<input type="submit" id="sign-in" name="signin" value="Sign In" />
				
				<div id="forget_password_view" >
				<label for="e_mail" >Email</label>
				<input type = "text" name = "e_mail_send_password" class="input-text" id="e_mail_send_password"
				value="<?php if(isset($form_e_mail_send_password))echo $form_e_mail_send_password;?>" />
				<input type="submit" value="Send Password" class="button" id="send_email"/>
				</div>				
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
						
						<table id="product-detail-table_3">
							
							
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
						
						<table id="product-detail-table_4">
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
<?php $this->load->view('common/confirm_box_ok');?>
		<!--</form>-->
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
					//dataType: "json",
					url: "<?php echo base_url('payment/login_member_check_error');?>",//controller path; go function
					data:  {e_mail: $('#e_mail').val(), // set data variable and assign value from body
							password: $('#password').val()
							
						   },
					success: function( data ) { // if success do something ;data is returned
						
						if(data == 'true')
						{
							
							var url_2 = "<?php echo base_url('payment/get_member_profile') ?>";
							//alert(url_2);								
							$.getJSON(url_2, function(data){
							alert(data+"data sign in");												
							if(data !='' )
							{
								$('#step1').css('display','none');
								$('#step2').css('display','block');
								$('#step3').css('display','none');
								$('#step4').css('display','none');
								
								$('.head-step1').css('color','#A0A0A0');
								$('.head-step2').css('color','#353535');
								$('.head-step3').css('color','#A0A0A0');
								$('.head-step4').css('color','#A0A0A0');							
								
								$("#first_name").val(data.first_name);//assign value to html
								$("#last_name").val(data.last_name);
								$("#telephone").val(data.telephone);
								$("#mobile").val(data.mobile);
								$("#address").val(data.address);
								$("#postcode").val(data.postcode);
								
								
							}
							else
							{
								alert(data);
							}						
						
											
							});	
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
					dataType: "json",//for getJson
					url: "<?php echo base_url('payment/step_2');?>",//controller path; go to goal function
					data:  {e_mail: $('#e_mail').val(), // set data variable and assign value from body for $this->input->post('e_mail');
							first_name: $('#first_name').val(),
							last_name: $('#last_name').val(),
							telephone: $('#telephone').val(),
							mobile: $('#mobile').val(),
							address: $('#address').val(),
							postcode: $('#postcode').val()						
						   },
					success: function( data ) { // if success do something ;data is returned
									
						if(data !="" )
						{
							$("#first_name_3").html($('#first_name').val());//assign value to html
							$("#last_name_3").html($('#last_name').val());
							$("#telephone_3").html($('#telephone').val());
							$("#mobile_3").html($('#mobile').val());
							$("#address_3").html($('#address').val());
							$("#postcode_3").html($('#postcode').val());
							
							
							//show data step 3
							var table_head = "<tr>";
								table_head +="<th>Product ID</th>";
								table_head +="<th>Product Description</th>";
								table_head +="<th>Quantity</th>";
								table_head +="<th>Unit Price (THB)</th>";
								table_head +="<th>Price (THB)</th>";
								table_head +="</tr>";
							
							
							var url_2 = "<?php echo base_url('payment/step_2_get_items') ?>";
							//alert(url_2);						
							$.getJSON(url_2, function(data2){
							alert(data2+"data2");
							alert(data[0]+"data1");
							
							var detail ="";
							var i=0;
							var total_price=0.0;
							alert(data.length+"i="+i);
							while( i < data2.length)//items
							{
								
								detail +="<tr>";
								detail +="<td>"+data2[i].item_id+"</td>";//product_id
								detail +="<td>"+data2[i].description_en+"</td>";//product_detail
								detail +="<td>";//product_Quantity
								for(j=0;j<data.length;j++)
								{
									var temp = data[j].split(",");
									if(temp[0]== data2[i].item_id)
									{
										detail += temp[1];
										total_price = temp[1];
										break;
									}
								}
								detail +="</td>";
								detail +="<td>";//unit_price
								
								if(data2[i].on_sale == 0)
								{
									detail += data2[i].markup_price;
									total_price = total_price*data2[i].markup_price;
								}
								else
								{
									detail += data2[i].markdown_price;
									total_price = total_price*data2[i].markdown_price;
								}
								
								detail +="</td>";
								detail +="<td>"+total_price+"</td>";//total_price
								
								detail +="</tr>";
								alert(detail);
								i++;
							}
								
								//alert(detail);
							
							$("#product-detail-table_3").html(table_head+detail);	
								
								
							//show data step 3
							
							
							
							$('#step1').css('display','none');
							$('#step2').css('display','none');
							$('#step3').css('display','block');
							$('#step4').css('display','none');
							
							$('.head-step1').css('color','#A0A0A0');
							$('.head-step2').css('color','#A0A0A0');
							$('.head-step3').css('color','#353535');
							$('.head-step4').css('color','#A0A0A0');
							
							});
							
							
		
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
				$('a.forget_password').click(function() {			
					$("#forget_password_view").css("display","inline-block");	 			
				});
				 $('#send_email').click(function() {			
					 $.ajax({
							 type: 'POST',
							 url: "<?php echo base_url('member/forget_password');?>",//controller path; go function
							 data:  { e_mail_send_password:'e_mail',// $('#e_mail_send_password').val(), // set data variable and assign value from body
								    },
							 error: function(xhr,err){
									//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
									alert("error ::"+err.message);},
							 success: function( data ) { // if succes do something ;data is returned
													
								confirm('Please enter the information',data,this.href);
								return false;							
							}				
						 });	
				 });
				
			});
		</script>
