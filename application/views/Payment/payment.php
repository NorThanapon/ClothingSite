	
		<form>
			<div id="payment-head">
			<span class="head-step">
				<h1>Step 1</h1>
				<h5>Sign In</h5>
			</span>
			<span class="head-step">
				<h1>Step 2</h1>
				<h5>Shipping</h5>
			</span>
			<span class="head-step">
				<h1>Step 3</h1>
				<h5>Payment</h5>
			</span>
			<span class="head-step">
				<h1>Step 4</h1>
				<h5>confirmation</h5>
			</span>
			</div>
						
			<fieldset id="step1">
				<legend>Sign In</legend>
				<div id="main-step1">
				<label>E-mail:</label> 
				<input name="email" type="text" />
				<label>Password:</label> 
				<input name="password" type="password" />
				<label>Confirm Password:</label> 
				<input name="con-password" type="password" />	
				<input type="submit" id="sign-in" name="signin" value="Sign In" />
				<input type="submit" id="register" name="register" value="Register" />			
				</div>
			</fieldset>
						
			<fieldset id="step2">
				<legend>Shipping</legend>
				<div id="main-step2">
					<div class="head-step2">
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
					
					<input type="submit" id="submit-step2" name="submit-step2" value="Submit" />
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
								<label class="sub-head">Test1</label>
								<label class="sub-head">Test2</label>
								<label class="sub-head">00000000</label>
								<label class="sub-head">00000000</label>
								<label class="sub-head">22 fsfsdfsdf</label>
								<label class="sub-head">0000</label>
							</div>
						</div>
						<div id="order-info">
							<div id="order-head">
								<label class="head">Order Info.</label>
								<label class="sub-head">Purchase ID :</label>
								<label class="sub-head">Ship by :</label>
							</div>
							<div id="order-detail">
								<label> &nbsp </label>
								<label class="sub-head">111111</label>
								<label class="sub-head">track</label>
							</div>
						</div>					
					</div>				
					<div id="product-detail">
						<label class="head">Products detail</label>
						<table id="product-detail-table">
							<tr>
								<th>Product ID</th>
								<th>Product Description</th>
								<th>Quantity</th>
								<th>Unit Price (THB)</th>
								<th>Price (THB)</th>
							</tr>
							<tr>
								<td>1</td>
								<td>shirst size s color black</td>
								<td>3</td>
								<td>200</td>
								<td>600</td>
							</tr>
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
							<label >600 THB</label>
							<label >30 THB</label>
							<label >5 THB</label>
							<label >635 THB</label>
						</div>
						<input type="submit" id="submit-step3" name="submit-step3" value="Confirm" />
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
								<label class="sub-head">Test1</label>
								<label class="sub-head">Test2</label>
								<label class="sub-head">00000000</label>
								<label class="sub-head">00000000</label>
								<label class="sub-head">22 fsfsdfsdf</label>
								<label class="sub-head">0000</label>
							</div>
						</div>
						<div id="order-info">
							<div id="order-head">
								<label class="head">Order Info.</label>
								<label class="sub-head">Purchase ID :</label>
								<label class="sub-head">Order date :</label>
								<label class="sub-head">Ship by :</label>
							</div>
							<div id="order-detail">
								<label> &nbsp </label>
								<label class="sub-head">111111</label>
								<label class="sub-head">21/12/12</label>
								<label class="sub-head">track</label>
							</div>
						</div>					
					</div>				
					<div id="product-detail">
						<label class="head">Products detail</label>
						<table id="product-detail-table">
							<tr>
								<th>Product ID</th>
								<th>Product Description</th>
								<th>Quantity</th>
								<th>Unit Price (TBH)</th>
								<th>Price (TBH)</th>
							</tr>
							<tr>
								<td>1</td>
								<td>shirst size s color black</td>
								<td>3</td>
								<td>200</td>
								<td>600</td>
							</tr>
						</table>
					</div>
					<div id="pay-attention">
						<label>* Please  transfer the total amount to Account Number ..................... <br />
						ICC International Public Company Limited, .... Bank.<br />
						<br />
						After the transfer, please upload your pay-in-slip<br /> 
						at ‘confirm payment ’ page or fax to 02-123-4567</label>
						</div>
					<div id="total-price">
						<div id="price-head">
							<label >Subtotal :</label>
							<label >Shipping :</label>
							<label >Tax :</label>
							<label >Total :</label>					
						</div>
						<div id="price-detial">
							<label >600 THB</label>
							<label >30 THB</label>
							<label >5 THB</label>
							<label >635 THB</label>
						</div>
						<input type="submit" id="submit-step4" name="submit-step4" value="Confirm" />
					</div>
					
				</div>
			</fieldset>		
		</form>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#sign-in').click(function(event){
					event.preventDefault();
					$('#step1').css('display','none');
					$('#step2').css('display','block');
					$('#step3').css('display','none');
					$('#step4').css('display','none');
				});
				
				$('#submit-step2').click(function(event){
					event.preventDefault();
					$('#step1').css('display','none');
					$('#step2').css('display','none');
					$('#step3').css('display','block');
					$('#step4').css('display','none');
				});
				
				$('#submit-step3').click(function(event){
					event.preventDefault();
					$('#step1').css('display','none');
					$('#step2').css('display','none');
					$('#step3').css('display','none');
					$('#step4').css('display','block');
				});
			});
		</script>
