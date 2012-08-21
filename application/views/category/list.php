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
		<label>Name:</label>
		<input type = "text" name="cat_name"/>
		<label for="cat_parent">Under category</textarea>
		<select name="cat_parent" > 
		    <option value="">--Any category--</option>
		    <?php foreach($cat_list as $item) {  ?>
			<option value="<?php echo $item->cat_id; ?>"><?php echo $item->cat_name_en; ?></option>
		    <?php } ?>
		</select>
		<input type="button" value="Search" />
	    </fieldset>
    </div>
	<div class="report-items">
		<?php $this->load->view('common/table_pager');?>
		<?php echo form_open_multipart('category/list');?>
	    <table  class="tablesorter" >
		<thead>
            <tr>
              
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
				
				<td><?php echo $item->parent_name?></td>
				<td>
					 <?php echo anchor('category/edit/'.$item->cat_id, ' ', array('title'=>"Edit Category",'class'=>'edit-button')); ?>
					 <?php echo anchor('category/delete/'.$item->cat_id, ' ', array('title'=>"Delete Category",'class'=>'delete-button')); ?>
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
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
			.tablesorter({
				headers: {
					//0:{sorter:false},
					5:{sorter:false}
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
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
			confirm('Confirm for deletion','Do you want to delete this category.',this.href, 'Delete'); 
			return false;
		});
		
	    }); 
		
	</script>
    </body>
</html>