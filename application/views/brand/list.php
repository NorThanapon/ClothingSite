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
				<input id="txt_keyword" type="text" name="keyword" value="<?php if(isset($keyword)) echo $keyword;  ?>" />
				<input id="btn_search" type = "button" value = "Search" />
			</fieldset>
		</div>
	   	<div class="report-items">
			<?php $this->load->view('common/table_pager');?>
			<table  class="tablesorter" >
				<thead>
					<tr>
						<th width="200">Logo</th>
						<th width="150">Name</th>
						<th>Description</th>
						<th width="64">show/hide</th>
						<th width="30">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($brand_list as $item) 
						{
					?>
					<tr>
						<td><img src="<?php echo asset_url().'db/brands/'.$item->logo;?>" /></td>
						<td><?php echo $item->brand_name;?> </td>
						<td><?php echo $item->description;?> </td>
						<td class="content-center"><?php if($item->isActive == 1) echo "show"; else echo "hide"; ?></td>
						<td>
							<?php echo anchor('admin/brand/edit/'.$item->brand_name, ' ', array('title'=>"Edit this brand",'class'=>'edit-button')); ?>
							<?php echo anchor('admin/brand/delete/'.$item->brand_name, ' ', array('title'=>"Delete this category",'class'=>'delete-button')); ?>
						</td>
					</tr>
					<?php
						}?>
						
				</tbody>
			</table>
			<?php $this->load->view('common/table_pager');?>
		</div>
	    <?php $this->load->view('common/admin_footer');?>
	    <?php $this->load->view('common/confirm_box');?>
		<script type="text/javascript">
		    $(document).ready(function() {
		    //add sorter and pager
		    $(".tablesorter").find("tr:even").addClass("even");
		    $(".tablesorter")
			    .tablesorter({
				    headers: {
					    0:{sorter:false},
						//1:{sorter:false},
						4:{sorter:false},
					    //5:{sorter:false},
				    },
				     sortList: [[3,1]] 
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
			    confirm('Confirm for deletion','Do you want to delete this brand.',this.href, 'Delete'); 
				return false;
			    });
				
			//add confirm event for search button 
			$('#btn_search').click(function() {
		    var url = document.URL;
		    url = url.substring(0, url.indexOf('/brand') + 6);
		    url = url + '/search/' + $('#txt_keyword').val();
		    window.location = url;
		});
				
		    });
		</script>
    </body>
</html>