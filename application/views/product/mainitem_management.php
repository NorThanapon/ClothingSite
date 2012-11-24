<!DOCTYPE html>
<?php echo form_open('admin/product/itemlist/'.$product->product_id); ?>
<h1>Main Item Management</h1>
<div class="report-items">
        <?php $this->load->view('common/table_pager');?>
	    <table class="tablesorter">
		<thead>
		    <tr>
			<th>&nbsp;</th>
			<!--<th>Product ID</th>-->
			<th>Item ID</th>
			<th>Product ID</th>
			<th>Size</th>
			<th>Color ID</th>
			<th>Quality</th>
			<th>Main Image</th>		
		    </tr>
		</thead>
		<tbody>
		
			<?php 
				for($i=0; $i< count($item_list); $i++) 
				{
            ?>
            <tr>
                <td><input type = "radio" <?php echo "name=\"rb_select_item\" value=\"".$item_list[$i]->item_id."\""?><?php if($product->main_item==$item_list[$i]->item_id){ echo "checked=\"checked\"";} ?>/></td>				
                <td><?php echo $item_list[$i]->item_id;?> </td>
				<td><?php echo $item_list[$i]->product_id;?></td>
				<td><?php echo $item_list[$i]->size;?></td>				
				<td><?php echo $item_list[$i]->color_id;?></td>
				<td><?php echo $item_list[$i]->quantity; ?></td>
				<td><img src="<?php echo asset_url().'db/products/'.$item_list[$i]->image_file_name;?>" /></td>								
				
            </tr>
            <?php
					
                }
			?>
		</tbody>
	    </table>
           
		</div>
		<div class="content-right form-action">
			<input class="button btn-submit" type = "submit" name="submit" value="Save and Return"/>	
	    </div>
	</form>	
<script type="text/javascript">		
	$(document).ready(function() {
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