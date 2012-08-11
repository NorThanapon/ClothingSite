<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	  
	
	    <table border="1">
            <tr>
                <td>No.</td>
				<td>Logo</td>
                <td>Name</td>
				<td>Description</td>
				<td>Size</td>
				<td>&nbsp;</td>
            </tr>
            <?php 
                $i =1;
                foreach($brand_list as $item) 
				{
            ?>
            <tr>
                <td><?php echo $i;?></td>
				<td><img width="100" height="100" src="<?php echo asset_url().'db/brands/'.$item->logo;?>" /></td>
                <td><?php echo $item->brand_name;?> </td>
				<td><?php echo $item->description;?></td>
				<td><?php echo $item->size_chart;?></td>
				<td>
					<input type="submit" name="submit" value="Edit" />
					<input type="submit" name="submit" value="Delete" />
				</td>
            </tr>
            <?php
					$i++;
                }?>
        </table>
	
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>