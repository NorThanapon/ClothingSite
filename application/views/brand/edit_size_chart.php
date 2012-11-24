<?php echo form_open('admin/brand/edit_size_chart_text/'.$brand->brand_id.'/'.$filename); ?>
<h1>Size Chart</h1> 
<fieldset id="b_size_chart">
<legend><?php echo $brand->brand_name; ?></legend>
<textarea name="data" id="txtarea_size_chart" onkeydown="return catchTab(this,event)">
<?php
	$file = "assets\\size_chart\\".$filename.".txt";

	if (!file_exists($file))
	{
		echo "file not found";
	}
	else
	{
		echo file_get_contents($file);
	}
?>
</textarea><br />
</fieldset>
<div class="form-action content-right">
	<?php echo anchor('admin/brand/size_chart/'.$brand->brand_id,'Cancel' ,array('class' => 'button')); ?>
	<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
</div>

<script type="text/javascript">
function setSelectionRange(input, selectionStart, selectionEnd) {
  if (input.setSelectionRange) {
    input.focus();
    input.setSelectionRange(selectionStart, selectionEnd);
  }
  else if (input.createTextRange) {
    var range = input.createTextRange();
    range.collapse(true);
    range.moveEnd('character', selectionEnd);
    range.moveStart('character', selectionStart);
    range.select();
  }
}

function replaceSelection (input, replaceString) {
	if (input.setSelectionRange) {
		var selectionStart = input.selectionStart;
		var selectionEnd = input.selectionEnd;
		input.value = input.value.substring(0, selectionStart)+ replaceString + input.value.substring(selectionEnd);
    
		if (selectionStart != selectionEnd){ 
			setSelectionRange(input, selectionStart, selectionStart + 	replaceString.length);
		}else{
			setSelectionRange(input, selectionStart + replaceString.length, selectionStart + replaceString.length);
		}

	}else if (document.selection) {
		var range = document.selection.createRange();

		if (range.parentElement() == input) {
			var isCollapsed = range.text == '';
			range.text = replaceString;

			 if (!isCollapsed)  {
				range.moveStart('character', -replaceString.length);
				range.select();
			}
		}
	}
}

// We are going to catch the TAB key so that we can use it, Hooray!
function catchTab(item,e){
	if(navigator.userAgent.match("Gecko")){
		c=e.which;
	}else{
		c=e.keyCode;
	}
	if(c==9){
		replaceSelection(item,String.fromCharCode(9));
		setTimeout("document.getElementById('"+item.id+"').focus();",0);	
		return false;
	}		    
}
</script>


