		<!DOCTYPE html>
		<h1>Product Management</h1>
        <div class="page-action">
		<?php echo anchor('admin/product/add', '<img src='.asset_url().'img/add-icon.png'.' />Add New Product', 'class="button gradient"'); ?>
           
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
			<?php echo '<option value="" disabled >###### Women ######</option>'; ?>;
			<?php
			foreach($category_list as $item)
				{  
					if($item->cat_gender == "Women")
					{
						if(isset($form_cat_id)&&$form_cat_id==$item->cat_id)
						{
							
							echo '<option value="'.$item->cat_id.'" selected="selected">'.$item->cat_name_en.'</option>';
						}
						else
						{
							echo '<option value="'.$item->cat_id.'">'.$item->cat_name_en.'</option>';
						}
					}
				}
				echo '<option value="" disabled ></option>';
				echo '<option value=""  disabled >######## Men ########</option>';
				foreach($category_list as $item)
				{  
					if($item->cat_gender == "Men")
					{
						if(isset($form_cat_id)&&$form_cat_id==$item->cat_id)
						{
							echo '<option value="'.$item->cat_id.'" selected="selected">'.$item->cat_name_en.'</option>';
						}
						else
						{
							echo '<option value="'.$item->cat_id.'">'.$item->cat_name_en.''.$item->cat_gender.'</option>';
						}
					}
				}
				?>
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
		<!--<?php// echo form_open('admin/product/delete_batch'); ?>-->
		<?php echo form_open('admin/product/update_status'); ?>
		
        <div class="report-items">
            <?php $this->load->view('common/table_pager');?>
	    <table class="tablesorter">
		<thead>
		    <tr>
			<th>&nbsp;</th>
			<!--<th>Product ID</th>-->
			<th>Product Name</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Total Quantity</th>
			<th>Date Add</th>
			<th>On Sale</th>
			<th>Show</th>			
			<th width="40" >&nbsp;</th>
		    </tr>
		</thead>
		<tbody>
		
			<?php 
				foreach($product_list as $item) 
				{
            ?>
            <tr>
                <td><input type = "checkbox" <?php echo "name=\"chb_select_product[]\" value=\"".$item->product_id."\"" ;?> "/></td>
				
                <td><?php echo $item->product_name_en;?> </td>
				<td><?php echo $item->brand_name;?></td>
				<td><?php echo $item->cat_name_en;?></td>				
				<td><?php echo $item->total_quantity?></td>
				<td><?php echo $item->date_add; ?></td>
				<td><?php if($item->on_sale == 1) echo "yes"; else echo "no"; ?></td>	
				<td><?php if($item->product_is_active == 1) echo "show"; else echo "hide"; ?></td>				
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >Detail</a>-->
					<?php echo anchor('admin/product/edit/'.$item->product_id, ' ', array('title'=>"Edit Product",'class'=>'edit-button')); ?>
					<?php echo anchor('admin/product/itemlist/'.$item->product_id, ' ', array('title'=>"Item List",'class'=>'itemlist-button')); ?>
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
				<option value="3">Sale</option>
				<option value="4">Normal</option>
			</select>
			<input type = "submit" value = "Update" name="btn_update" />
			<!--<input type = "submit" value = "Delete" name="btn_delete" id="btn_delete_button" />-->
			</fieldset>
		</form>
		<?php $this->load->view('common/confirm_box');?>
		
	<script type="text/javascript">		
	$(document).ready(function() {
	$('a.delete-button').click(function() { 
		confirm('Confirm for deletion','Do you want to delete this product.',this.href, 'Delete'); 
		return false;
	});	
	$('#btn_delete_button').click(function() { 
		confirm('Confirm for deletion','Do you want to delete products.',this.href, 'Delete'); 
		return false;
	});	
	
	$('#btn_filter').click(function() {
			
		    var url = document.URL;
		    url = url.substring(0, url.indexOf('/product') + 8);
		    url = url + '/search/' + $('#ddl_product_cat').val() + '/' + $('#ddl_brand').val()+ '/' + $('#ddl_status').val()+ '/' + $('#txt_product_name').val();
		    window.location = url;
		});
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter").tablesorter({
			headers: {
			    0:{sorter:false},
			    8:{sorter:false}
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
