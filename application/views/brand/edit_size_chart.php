<?php echo form_open('admin/brand/edit_size_chart_text/'.$brand->brand_id.'/'.$filename); ?>
<h1>Size Chart</h1> 
<fieldset id="b_size_chart">
<legend><?php echo $brand->brand_name; ?></legend>
<textarea name="data">
<?php
	$file = "assets\\size_chart\\".$filename.".txt";
	//echo file_get_contents("assets\\size_chart\\elle_clothes.txt");
	if (!file_exists($file))
	{
		echo "file not found";
	}
	else
	{
		echo file_get_contents($file);
	}
	/*
	$file_handle = fopen($file, "r");
	while (!feof($file_handle)) {
		$line = fgets($file_handle);
		echo $line;
	}
	fclose($file_handle);*/
?>
</textarea><br />
</fieldset>
<div class="form-action content-right">
	<?php echo anchor('admin/brand/size_chart/'.$brand->brand_id,'Cancel' ,array('class' => 'button')); ?>
	<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
</div>

