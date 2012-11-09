
<div id="content-upload-slip">

			<div id="upload-slip-head">
			<?php echo anchor(base_url(), '<img src='.asset_url().'img/LOGO-bfashshop.png />', 'title="BfashShop"'); ?>
		    <span>Confirm Payment</span>
			</div>
			<div id="hr-shadow"></div>
			<div id="main-upload-slip">
				<div class="upload-slip-order">
					<label>Order ID</label>
					<input type="text" />
				</div>
				<div class="upload-slip-payslip">
					<label>Pay slip</label>					
					<input type="file" value="browse" />
				</div>
				<input type="submit" value="Upload" class="button"/>
			</div>		
</div>
