<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
		
	<form id="brandName_form" action="brand_list.php"  method="post" >
	<table border="1">
            <tr>
                <td>No.</td>
                <td>Brand Name</td>
				<td></td>
            </tr>
            <?php 
                $i =1;
                foreach($brand_list as $items) {
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $items->brand_name;?> </td>
				<td><input type="submit" name="delBrand" value="Delete" />
					<input type="hidden" name="delSubmit" value="<?=$items->brand_name;?>" />
				</td>
            </tr>
            <?php
                $i++;
            }?>
        </table>	
    </body>
</html>