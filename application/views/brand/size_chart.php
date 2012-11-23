<h1>Size Chart</h1> 
<fieldset>
<legend><?php echo $brand->brand_name; ?></legend>
<input name="brand_id" type="hidden" value="<?php echo $brand->brand_id; ?>" />
<div class="report-items">
<br />
<?php echo anchor('admin/brand/edit_size_chart/'.$brand->brand_id.'/clothes', 'clothes', array('title'=>"Edit Clothes Size Chart")); ?><br /><br />
<?php echo anchor('admin/brand/edit_size_chart/'.$brand->brand_id.'/footwear', 'footwear', array('title'=>"Edit Footwear Size Chart")); ?><br />
</div>
</fieldset>
<div class="form-action content-right">
	<?php echo anchor('admin/brand','Back' ,array('class' => 'button-savechange btn-savechange')); ?>
</div>