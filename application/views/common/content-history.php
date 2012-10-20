		<?php
			$path = "";
			foreach($previous as $item)
			{
				if(strtolower($item) == "home"){
					//$path = site_url();
				}
				else
				{
					$path = $path.'/'.$item;
				}
		?>
				<span class="history-previous"><?php echo anchor($path, $item.' >', 'title="'.$item.'"'); ?></span>
		<?php	
			}
		?>
		<span id="history-current"><?php echo anchor(current_url(), $current, 'title="'.$current.'"'); ?></span>
		
		
		
