<?php
	for($i=0; $i<count($breadcrumbs)-1; $i++)
	{
?>
		<span class="history-previous"><?php echo anchor($link[$i], $breadcrumbs[$i].' >', 'title="'.$breadcrumbs[$i].'"'); ?></span>
<?php	
	}
?>
<span id="history-current"><?php echo anchor($link[$i], $breadcrumbs[$i], 'title="'.$breadcrumbs[$i].'"'); ?></span>
		
		
		
