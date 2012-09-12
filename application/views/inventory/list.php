<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Inventory Management</h1>  
	<div class="page-action">
	    <a href="inventory/add" class="button gradient">
		<img  src="<?php echo asset_url().'img/add-icon.png'?>" />
		Add New Item
	    </a>
	</div>
	<div class="clear-float"></div>
	<div class="report-filter">
	    <fieldset>
		<legend>Search Options</legend>
		<label>Product's Name:</label>
		<input id="txt_product_name" type="text" name="product_name" value="" />
		<label for="txt_item_amount">Amount:</label>
		<input type="text" name="item_amount_low" />-<input type="text" name="item_amount_high" />
		<input id="btn_filter" type="button" value="Search" />
	    </fieldset>
	</div>
	<div class="report-items">
		<?php $this->load->view('common/table_pager');?>
		<?php echo form_open_multipart('inventory/list');?>
	    <table  class="tablesorter" >
		<thead>
            <tr>
			    <th width="100">Item ID</th>
				<th>Product's Name</th>
				<th width="100">Size</th>
				<th>Color</th>
				<th>Quantity</th>
				<th>&nbsp;</th>	
            </tr>
		</thead>
		<tbody>
            <?php 
                $i =1;
				foreach($item_list as $item) 
				{
            ?>
            <tr>
                <td><?php echo $item->item_id;?> </td>
				<td><?php 
						foreach($product_list as $productItem)
						{
							if($item->product_id == $productItem->product_id)
							{
								echo $productItem->product_name_en;
							}
						}
					?>
				</td>
				<td><?php echo $item->size;?></td>
				<td><?php echo $item->color_id;?></td>
				<td><?php echo $item->quantity;?></td>
				<td>
					 <?php echo anchor('admin/item/edit/'.$item->item_id, ' ', array('title'=>"Edit Item",'class'=>'edit-button')); ?>
					 <?php echo anchor('admin/item/delete/'.$item->item_id, ' ', array('title'=>"Delete Item",'class'=>'delete-button')); ?>
				</td>
            </tr>
            <?php
					
                }
			?>
		</tbody>
        </table>
		<?php $this->load->view('common/table_pager');?>
	</div>
	</form>
    <?php $this->load->view('common/admin_footer');?>
	<?php $this->load->view('common/confirm_box');?>
	<script type="text/javascript">
	    $(document).ready(function() {
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this item.',this.href, 'Delete'); 
		    return false;
		});
		$('#btn_filter').click(function() {
		    var url = document.URL;
		    url = url.substring(0, url.indexOf('/category') + 9);
		    url = url + '/search/' + $('#ddl_cat_parent').val() + '/' + $('#txt_cat_name').val();
		    window.location = url;
		});
		        
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
				//0:{sorter:false},
				5:{sorter:false}
			}
		    })
		    .tablesorterPager({
			container: $(".table-pager"),
			positionFixed: false,
			size:20
		    });
		$(".tablesorter").on('sortEnd', function(){
		    //set striping color
		    $(".tablesorter").find('tr').removeClass('even');
		    $(".tablesorter").find("tr:even").addClass("even");
		});
	    }); 
		
	</script>
    </body>
</html>