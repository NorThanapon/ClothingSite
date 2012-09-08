<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Category Management</h1>  
	<div class="page-action">
	    <?php echo anchor('admin/category/add', '<img  src='.asset_url().'img/add-icon.png'.' />Add New Category', 'class="button gradient"'); ?>
	</div>
	<div class="clear-float"></div>
	<div class="report-filter">
	    <fieldset>
		<legend>Search Options</legend>
		<label>Name:</label>
		<input id="txt_cat_name" type="text" name="cat_name" value="<?php if(isset($search_name)) echo $search_name;  ?>"/>
		<label for="cat_parent">Under category</textarea>
		<select name="cat_parent" id="ddl_cat_parent"> 
		    <option value="0">--Any category--</option>
		    <?php foreach($cat_list as $item) {  ?>
			<option <?php if (isset($search_parent) && $item->cat_id == $search_parent) echo 'selected' ?> value="<?php echo $item->cat_id; ?>"><?php echo $item->cat_name_en; ?></option>
		    <?php } ?>
		</select>
		<input id="btn_filter" type="button" value="Search" />
	    </fieldset>
	</div>
	<div class="report-items">
		<?php $this->load->view('common/table_pager');?>
		<?php echo form_open_multipart('category/list');?>
	    <table  class="tablesorter" >
		<thead>
            <tr>
              
				
			    <th width="100">Name (English)</th>
				<th width="100">Name (Thai)</th>
				<th>Description (English)</th>
				<th>Description (Thai)</th>
				<th width="100">Under-category</th>
				<th width="64">show/hide</th>
				<th width="30">&nbsp;</th>
            </tr>
		</thead>
		<tbody>
            <?php 
                $i =1;
				foreach($cat_list as $item) 
				{
            ?>
            <tr>
                <td><?php echo $item->cat_name_en;?> </td>
                
				<td><?php echo $item->cat_name_th?></td>
				<td><?php echo $item->description_en;?></td>
				<td><?php echo $item->description_th;?></td>
				
				<td><?php echo $item->parent_name;?></td>
				<td><?php if($item->isActive == 1) echo "show"; else echo "hide"; ?></td>
				<td>
					 <?php echo anchor('admin/category/edit/'.$item->cat_id, ' ', array('title'=>"Edit Category",'class'=>'edit-button')); ?>
					 <?php echo anchor('admin/category/delete/'.$item->cat_id, ' ', array('title'=>"Delete Category",'class'=>'delete-button')); ?>
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
		    confirm('Confirm for deletion','Do you want to delete this category.',this.href, 'Delete'); 
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
				5:{sorter:false},
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