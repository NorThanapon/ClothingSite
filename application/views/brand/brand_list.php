<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head');?>
    </head>
    <body>
		
		<table border="1">
			<tr>
				<td>No.</td>
				<td>Brand Name</td>
			</tr>
		<?php 
		$i =1;
		foreach($brand_list as $items)
		{		
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $items->brand_name."<br />";?></td>
			</tr>

		<?php
			$i++;
		}?>
		</table>
		
    </body>
</html>