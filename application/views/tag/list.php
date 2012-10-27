	<h1>Tag Management</h1>  
	<div class="page-action">
<!-- <<<<<<< HEAD -->
<!-- ======= -->
		<?php echo anchor('admin/tag/add', '<img  src='.asset_url().'img/add-icon.png'.' alt="" />Add New Tag', 'class="button gradient"'); ?>
<!-- >>>>>>> tag: delete, search -->
	</div>
	<div class="clear-float"></div>
	<div class="report-filter">
	    <fieldset>
		<legend>Search Options</legend>
		<label>Name:</label>
		<input id="txt_tag_name" type="text" name="tag_name" value="<?php if(isset($search_name)) echo $search_name;  ?>"/>		
		<input id="btn_filter" type="button" value="Search" />
	    </fieldset>
	</div>
	<div class="report-items">
		<?php $this->load->view('common/table_pager');?>
	    <table  class="tablesorter" >
		<thead>
            <tr>            				
			    <th width="100">Name (English)</th>
				<th width="100">Name (Thai)</th>
				<th width="100">Total Quantity</th>
				<th width="64">show/hide</th>
				<th width="30">&nbsp;</th>
            </tr>
		</thead>
		<tbody>
            <?php 
                $i =1;
				foreach($tag_list as $item) 
				{
			?>
			<tr>
				<td><?php echo $item->tag_name_en;?> </td>              
				<td><?php echo $item->tag_name_th?></td>				
				<td><?php echo $item->total_quantity?></td>	
				<td><?php if($item->is_active == 1) echo "show"; else echo "hide"; ?></td>
				<td>
					 <?php echo anchor('admin/tag/edit/'.$item->tag_id, ' ', array('title'=>"Edit Tag",'class'=>'edit-button')); ?>
					 <?php echo anchor('admin/tag/edit_product/'.$item->tag_id, ' ', array('title'=>"Edit Product In Tag",'class'=>'product-button')); ?>
					 <?php echo anchor('admin/tag/delete/'.$item->tag_id, ' ', array('title'=>"Delete Tag",'class'=>'delete-button')); ?>					 
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
	<?php $this->load->view('common/confirm_box');?>
	<script type="text/javascript">
		 $(document).ready(function() {
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this tag.',this.href, 'Delete'); 
		    return false;
		});
		$('#btn_filter').click(function() {
		    var url = document.URL;
		    url = url.substring(0, url.indexOf('/tag') + 4);
		    url = url + '/search/' + $('#txt_tag_name').val();
		    window.location = url;
		});

		//$("#btn-add-tag").click(function(){
		//	add_tag()
		//});

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
