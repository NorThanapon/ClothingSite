<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Product Management</h1>
        <div class="page-action">
            <a href="#" class="button gradient">
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
		<select>
			<option>All Categories</option>
			<option>Tees</option>
			<option>Polos</option>
			<option>Shirts</option>
			<option>Outerwear</option>
			<option>Shorts</option>
			<option>Pants</option>
			<option>Accessories</option>
		</select>
		<br />
		<label>Brands:</label>
		<select>
			<option>All Brands</option>
			<option>BASIC DE NUVO</option>
			<option>BECKY RUSSEL</option>
			<option>BSC WOMEN</option>
			<option>ELLE</option>
			<option>ITOKIN BOUTIQUE</option>
		</select>
		<label>Product Status:</label>
		<select>
			<option>Inactive</option>
			<option>Active</option>
		</select>
		<input type = "button" value = "Search" />
	    </fieldset>
        </div>
        <div class="report-items">
	    <table class="tablesorter">
		<thead>
		    <tr>
			<th>&nbsp;</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Total Quantity</th>
			<th>Status</th>
			<th>&nbsp;</th>
		    </tr>
		</thead>
		<tbody>
		    <tr>
			<td><input type = "checkbox" /></td>
			<td>000001</td>
			<td>IVY LEAVE POLO</td>
			<td>ELLE</td>
			<td>POLO</td>
			<td>10</td>
			<td>Active</td>
			<td><a href = "#">Detail</a> <a href = "#">Deactivate</a> <a href = "#">Delete</a></td>
		    </tr>
		    <tr>
			<td><input type = "checkbox" /></td>
			<td>000002</td>
			<td>COLD RIVER SHIRT</td>
			<td>BECKY RUSSEL</td>
			<td>Shirts</td>
			<td>10</td>
			<td>Active</td>
			<td><a href = "#">Detail</a> <a href = "#">Deactivate</a> <a href = "#">Delete</a></td>
		    </tr>
		    <tr>
			<td><input type = "checkbox" /></td>
			<td>000003</td>
			<td>BSC SKINNY PANTS</td>
			<td>BSC WOMEN</td>
			<td>Pants</td>
			<td>0</td>
			<td>Inactive</td>
			<td><a href = "#">Detail</a> <a href = "#">Activate</a> <a href = "#">Delete</a></td>
		    </tr>
		    <tr>
			<td><input type = "checkbox" /></td>
			<td>000004</td>
			<td>SPRING JACKET</td>
			<td>BASIC DE NUVO</td>
			<td>Outerwear</td>
			<td>0</td>
			<td>Inactive</td>
			<td><a href = "#">Detail</a> <a href = "#">Activate</a> <a href = "#">Delete</a></td>
		    </tr>
		    <tr>
			<td><input type = "checkbox" /></td>
			<td>000005</td>
			<td>JACKY SHIRT</td>
			<td>ITOKIN BOUTIQUE</td>
			<td>Shirts</td>
			<td>10</td>
			<td>Active</td>
			<td><a href = "#">Detail</a> <a href = "#">Deactivate</a> <a href = "#">Delete</a></td>
		    </tr>
		    <tr>
			<td><input type = "checkbox" /></td>
			<td>000006</td>
			<td>SUPER SKINNY SHORTS</td>
			<td>BSC WOMEN</td>
			<td>Shorts</td>
			<td>10</td>
			<td>Active</td>
			<td><a href = "#">Detail</a> <a href = "#">Deactivate</a> <a href = "#">Delete</a></td>
		    </tr>
		</tbody>
	    </table>
            <?php $this->load->view('common/table_pager');?>
	</div>
	<div class="report-action">
	    <fieldset>
		<legend>Update Product Status</legend>
		<label>Change all selected products to</label>
		<select>
		    <option>Inactive</option>
		    <option>Active</option>
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