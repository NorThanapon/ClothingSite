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
		<input id="txt_product_name" type = "text" value="<?php if(isset($search_name)) echo $search_name;  ?>" />
		
		<label>Product Category:</label>
		<select id='ddl_product_cat' name='product_cat'>
			<option value="0">All Categories</option>
			<?php foreach($category_list as $item){?>
				<option <?php if (isset($search_product_cat) && $item->cat_id == $search_product_cat) echo 'selected' ?>  value="<?php echo $item->cat_id;?>" ><?php echo $item->cat_name_en;?></option>
			<?php } ?>
		</select>
		<br />
		<label>Brands:</label>
		<select id='ddl_brand' name="product_brand">
			<option value="0">All Brands</option>
			<?php foreach($brand_list as $item)	{ ?>
					<option <?php if (isset($search_brand) && $item->brand_name == $search_brand) echo 'selected' ?> value="<?php echo $item->brand_name;?>" ><?php echo $item->brand_name;?></option>
			<?php }	?>
		</select>
		<label>Product Status:</label>
		<select id='ddl_status' name="product_status">
			<option value="1" <?php if(isset($search_status) && $search_status == '1') echo 'selected'  ?> >Show</option>
			<option value="0" <?php if(isset($search_status) && $search_status == '0') echo 'selected'  ?> >Hide</option>
			<option value="2" <?php if(isset($search_status) && $search_status == '2') echo 'selected'  ?> >All</option>
		</select>
		<input id="btn_filter" type="button" value="Search" />
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
				<td><a href ="<?php echo "product/detail/".$item->product_id;?>" ><?php echo $item->product_id;?></a></td>
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
				<td><?php if($item->isActive == 1) echo "show"; else echo "hide"; ?></td>
				<td><a href ="<?php echo "product/detail/".$item->product_id;?>" >Detail</a>
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
		<?php $this->load->view('common/confirm_box');?>
	<script type="text/javascript">
	    $(document).ready(function() { 
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this category.',this.href, 'Delete'); 
		    return false;
		});
		$('#btn_filter').click(function() {
		    var url = document.URL;
		    url = url.substring(0, url.indexOf('/product') + 9);
		    url = url + '/search/' + $('#ddl_product_cat').val() + '/' + $('#ddl_brand').val()+ '/' + $('#ddl_status').val()+ '/' + $('#txt_product_name').val();
		    window.location = url;
		});
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
			    0:{sorter:false},
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