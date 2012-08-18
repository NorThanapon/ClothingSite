<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Category Management</h1>  
	<?php echo form_open_multipart('category/list');?>
	    <table border="1">
            <tr>
                <td>ID</td>
				<td>Name (Thai)</td>
                <td>Name (English)</td>
				<td>Description (Thai)</td>
				<td>Description (English)</td>
				<td>Parent</td>
				<td>&nbsp;</td>
            </tr>
            <?php 
                $i =1;
                foreach($cat_list as $item) 
				{
            ?>
            <tr>
                <td><?php echo $item->cat_id;?></td>
				<td><?php echo $item->cat_name_th?></td>
                <td><?php echo $item->cat_name_en;?> </td>
				<td><?php echo $item->description_th;?></td>
				<td><?php echo $item->description_en;?></td>
				<td><?php echo $item->cat_parent?></td>
				<td>
					 <?php echo anchor('category/edit/'.$item->cat_id, 'Edit', 'title="Edit Category"'); ?>
					 <?php echo anchor('category/delete/'.$item->cat_id, 'Delete', 'title="Delete Category"'); ?>
				</td>
            </tr>
            <?php
					
                }?>
        </table>
		</form>
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>