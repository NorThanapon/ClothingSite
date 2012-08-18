<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Category Management</h1>  
	<div class="page-action">
        <a href="category/add" class="button gradient">
		<img  src="<?php echo asset_url().'img/add-icon.png'?>" />
		Add New Category
	    </a>
    </div>
	<div class="report-filter">
        <fieldset>
		<legend>Search Options</legend>
		<label>Keyword:</label>
		<input type = "text" />
	    <input type = "button" value = "Search" />
		</fieldset>
    </div>
	<div class="report-items">
		<?php $this->load->view('common/table_pager');?>
		<?php echo form_open_multipart('category/list');?>
	    <table  class="tablesorter" >
		<thead>
            <tr>
                <th>ID</th>
				<th>Name (Thai)</th>
                <th>Name (English)</th>
				<th>Description (Thai)</th>
				<th>Description (English)</th>
				<th>Under-category</th>
				<th>&nbsp;</th>
            </tr>
		</thead>
		<tbody>
            <?php 
                $i =1;
				foreach($cat_list as $item) 
				{
            ?>
            <tr>
                
				<td><?php echo $item->cat_name_th?></td>
                <td><?php echo $item->cat_name_en;?> </td>
				<td><?php echo $item->description_th;?></td>
				<td><?php echo $item->description_en;?></td>
				
				<td><?php echo $item->cat_parent?></td>
				<td>
					 <?php echo anchor('category/edit/'.$item->cat_id, 'Edit', 'title="Edit Category"'); ?>
					 <?php echo anchor('category/delete/'.$item->cat_id, 'Delete', 'title="Delete Category"'); ?>
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
	<script type="text/javascript">
	    $(document).ready(function() {        
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