<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Tag Management</h1>  
	<div class="page-action">
	    <?php echo anchor('admin/tag/add', '<img  src='.asset_url().'img/add-icon.png'.' />Add New tag', 'class="button gradient"'); ?>
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
		<!--
		<tbody>           
		</tbody>
		-->
        </table>
		<?php $this->load->view('common/table_pager');?>
	</div>
	</form>
	</script>
    </body>
</html>