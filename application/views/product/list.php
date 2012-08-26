<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Product Management</h1>
        <div class="page-action">
            <a href="product/add" class="button gradient">
		<img  src="<?php echo asset_url().'img/add-icon.png'?>" />
		Add New Product
	    </a>
        </div>
        <div class="report-filter">
            <fieldset>
		<legend>Search Options</legend>
		<label>Product Name:</label>
		<input type = "text" />
		
		<label>Product Category:</label>
		<select name='product_cat'>
			<option value="">All Categories</option>
			<?php
				foreach($category_list as $item)
				{
					echo "<option value='".$item->cat_id."'>".$item->cat_name_en."</option>";
				}
			?>
		</select>
		<br />
		<label>Brands:</label>
		<select name="product_brand">
			<option value="">All Brands</option>
			<?php
				foreach($brand_list as $item)
				{
					echo "<option value='".$item->brand_name."'>".$item->brand_name."</option>";
				}
			?>
		</select>
		<label>Product Status:</label>
		<select name="product_status">
			<option value="1">Show</option>
			<option value="0">Hide</option>
		</select>
		<input type = "button" value = "Search" />
	    </fieldset>
        </div>
        <div class="report-items">
            <?php $this->load->view('common/table_pager');?>
	    <table class="tablesorter">
		<thead>
		    <tr>
			<th>&nbsp;</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Total Quantity</th>
			<th>Show</th>
			<th>&nbsp;</th>
		    </tr>
		</thead>
		<tbody>
		
			<?php 
				foreach($product_list as $item) 
				{
            ?>
            <tr>
                <td><input type = "checkbox" /></td>
				<td><?php echo $item->product_id;?></td>
                <td><?php echo $item->product_name_en;?> </td>
				<td><?php echo $item->brand_name;?></td>
				<td><?php 
						foreach($category_list as $catItem)
						{
							if($item->cat_id == $catItem->cat_id)
							{
								echo $catItem->cat_name_en;
							}
						}
					?>
				</td>
				
				<td><?php echo $item->total_quantity?></td>
				<td>
					<?php 
						if($item->isActive == 1)
						{
							echo "<input type = 'checkbox' disabled='disabled' checked='checked'  />";
						}
						else
						{
							echo "<input type = 'checkbox' disabled='disabled'  />";
						}
					?>
				</td>
				<td><a href = "#">Detail</a>
					<?php echo anchor('admin/product/edit/'.$item->product_id, ' ', array('title'=>"Edit Product",'class'=>'edit-button')); ?>
					<?php echo anchor('admin/product/delete/'.$item->product_id, ' ', array('title'=>"Delete Product",'class'=>'delete-button')); ?>
				</td>
            </tr>
            <?php
					
                }
			?>
		</tbody>
	    </table>
            <?php $this->load->view('common/table_pager');?>
	</div>
	<div class="report-action">
	    <fieldset>
		<legend>Update Product Status</legend>
		<label>Change all selected products to</label>
		<select name="change_status">
		    <option value="1">Show</option>
		    <option value="2">Hide</option>
		</select>
		<input type = "button" value = "Update" />
	    </fieldset>
	</div>
        <?php $this->load->view('common/admin_footer');?>
	<script type="text/javascript">
	    $(document).ready(function() {        
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
			    0:{sorter:false},
				6:{sorter:false},
			    7:{sorter:false}
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