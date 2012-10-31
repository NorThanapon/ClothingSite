		<?php
			$path = "";
			foreach($previous as $item)
			{
				if(strtolower($item) == "home"){
					$path = site_url();
				}
				else
				{
					$path = $path;
				}
		?>
				<span class="history-previous"><?php echo anchor($path, $item.' >', 'title="'.$item.'"'); ?></span>
		<?php	
			}
		?>
		<span id="history-current"><?php echo anchor($base_url, $current, 'title="'.$current.'"'); ?></span>
		
		
		
