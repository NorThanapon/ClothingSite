		<?php
			foreach($previous as $item)
			{
		?>
				<span class="history-previous"><?php echo anchor('#', $item.' >', 'title="'.$item.'"'); ?></span>
		<?php	
			}
		?>
		<span id="history-current"><?php echo anchor($current, $brands->brand_name, 'title="'.$brands->brand_name.'"'); ?></span>
		
		
		
