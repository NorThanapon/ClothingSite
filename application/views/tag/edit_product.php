	<?php echo form_open('admin/tag/edit_product/'.$tags->tag_id); ?>
	    <h1>Product in Tag</h1> 		
		<div class="page-action">
			<span id="btn-add-product" class="button gradient"><img  src="<?php echo asset_url().'img/add-icon.png';?>" />Add Product</span>
		</div>
	    <div class="form-input">
		<fieldset>
		    <legend>Product Information</legend>
			<br />
		    <input type="hidden" name="tag_id" value="<?php echo $tags->tag_id;?>" />
		
		<div class="report-items">
			<?php $this->load->view('common/table_pager');?>
			<table class="tablesorter">
			<thead>
				<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Category</th>
				<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		
			<?php 
				foreach($product_in_tag as $item) 
				{
            ?>
            <tr>
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >--><?php echo $item->product_id;?><!--</a>--></td>
                <td><?php echo $item->product_name_en;?> </td>
				<td><?php echo $item->brand_name;?></td>
				<td><?php echo $item->cat_name_en;?></td>
				<td><?php echo anchor('admin/tag/delete_product/'.$tags->tag_id.'/'.$item->product_id, ' ', array('title'=>"Delete Product",'class'=>'delete-button')); ?></td>
			</tr>
            <?php					
                }
			?>
			</tbody>
			</table>
 
		</div>
		
		<?php $this->load->view('common/table_pager');?>
		</fieldset>
	    </div>		
	    <div class="form-action content-right">
			<?php echo anchor('admin/tag','Save Change' ,array('class' => 'button-savechange btn-savechange')); ?>
	    </div>
	</form>
	<?php $this->load->view('common/confirm_box');?>
	<?php $this->load->view('common/tag_product_box');?>
	<script type="text/javascript">
		 $(document).ready(function() {
		//add confirm event for delete button
		$('a.delete-button').click(function(e) { 			
		    confirm('Confirm for deletion','Do you want to delete this tag.',this.href, 'Delete'); 
		    return false;
		});

		$('#btn-add-product').click(function(){
			add_product_in_tag()
		});
		
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
				//0:{sorter:false},
				4:{sorter:false},
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