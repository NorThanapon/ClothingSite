<?php echo form_open_multipart('uploadslip/upload'); ?>
	<div id="content-upload-slip">
	<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
		<div id="upload-slip-head">
			<?php echo anchor(base_url(), '<img src='.asset_url().'img/LOGO-bfashshop.png />', 'title="BfashShop"'); ?>
			<span>Confirm Payment</span>
		</div>
		<div id="hr-shadow"></div>
		<div id="main-upload-slip">
			<div class="upload-slip-order">
				<label>Order ID</label>
				<label><?php echo $order_id; ?></label>
			</div>
			<div class="upload-slip-payslip">
				<label>Pay slip</label>					
				<input type="file" name="slip" value="browse" />
			</div>
			<input type="submit" value="Upload" class="button"/>
		</div>		
	</div>
</form>
