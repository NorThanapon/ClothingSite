<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Item Management</h1>  
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
		<input id="txt_product_name" type="text" name="product_name" value="<?php if(isset($search_product_name)) echo $search_product_name;?>" />
		<label for="txt_item_low">Amount:</label>
		<input type="text" class="amount" id="item_amount_low" value="<?php if(isset($search_item_amount_low)) echo $search_item_amount_low;?>" /> - 
		<input type="text" class="amount" id="item_amount_high" value="<?php if(isset($search_item_amount_high)) echo $search_item_amount_high;?>" />
		<input id="btn_filter" type="button" value="Search" />
	    </fieldset>
	</div>
	<div class="report-items">
		<?php $this->load->view('common/table_pager');?>
		<?php echo form_open_multipart('inventory/list');?>
	    <table  class="tablesorter" >
		<thead>
            <tr>
				<th width="100">Brand</th>
			    <th>Item Number</th>
				<th>Product's Name</th>
				<th>Size</th>
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
				<td><?php 
						foreach($product_list as $productItem)
						{
							if($item->product_id == $productItem->product_id)
							{
								echo $productItem->brand_name;
							}
						}
					?>
				</td>
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
				<?php 
						if($item->color_id == 0){
							echo "<td>-</td>";
						}
						else{
						
							foreach($colors as $color_item)
							{
								if($color_item->color_id == $item->color_id)
								{
									echo "<td>".$color_item->color_name."</td>";
								}
							}
						}
				?>
				
				<td><?php echo $item->quantity;?></td>
				<td>
					 <?php echo anchor('admin/inventory/edit/'.$item->item_id, ' ', array('title'=>"Edit Item",'class'=>'edit-button')); ?>
					 <?php echo anchor('admin/inventory/delete/'.$item->item_id, ' ', array('title'=>"Delete Item",'class'=>'delete-button')); ?>
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
		    url = url.substring(0, url.indexOf('/inventory') + 10);
			var product_name =  $('#txt_product_name').val();
			if($('#txt_product_name').val() == "" || $('#txt_product_name').val() ==" " || $('#txt_product_name').val() == false || $('#txt_product_name').val() == "-"){
				product_name = "-";
			}
			/*
			if($('#item_amount_low').val() != "" && !$('#item_amount_low').val().match('^(0|[1-9][0-9]*)$'))
			{
				//jAlert("Value in the Amount field must be numeric.", "ALERT")
				jAlert('This is a custom alert box');
				return false;
			}*/
			var amount_low =  $('#item_amount_low').val();
			if($('#item_amount_low').val() == "" || $('#item_amount_low').val() ==" " || $('#item_amount_low').val() == false || $('#item_amount_low').val() == "-"){
				amount_low = "-";
			}
			
			
			var amount_high = $('#item_amount_high').val()
			if($('#item_amount_high').val() == "" || $('#item_amount_high').val() ==" " || $('#item_amount_high').val() == false || $('#item_amount_high').val() == "-"){
				amount_high = "-";
			}
			
		    url = url + '/search/' +  product_name + '/' +amount_low+'/' + amount_high;
			window.location = url;
		});
		        
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
				//0:{sorter:false},
				6:{sorter:false}
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