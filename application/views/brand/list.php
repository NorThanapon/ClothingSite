<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	  
		<h1>Brand Management</h1>
		<div class="page-action">
			<a href="brand/add" class="button gradient">
				<img  src="<?php echo asset_url().'img/add-icon.png'?>" />
				Add New Brand
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
			<?php echo form_open_multipart('brand/list');?>
			<table  class="tablesorter" >
				<thead>
					<tr>
						<th>No.</th>
						<th>Logo</th>
						<th>Name</th>
						<th>Description</th>				
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i =1;
						foreach($brand_list as $item) 
						{
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><img width="120px" height="100px" src="<?php echo asset_url().'db/brands/'.$item->logo;?>" /></td>
						<td><?php echo $item->brand_name;?> </td>
						<td><?php echo $item->description;?> </td>
						<td>
							<?php echo anchor('brand/edit/'.$item->brand_name, ' ', array('title'=>"Edit Category",'class'=>'edit-button')); ?>
							<?php echo anchor('brand/delete/'.$item->brand_name, ' ', array('title'=>"Delete Category",'class'=>'delete-button')); ?>
						</td>
					</tr>
					<?php
							$i++;
						}?>
						
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
						4:{sorter:false}
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