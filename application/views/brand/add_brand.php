<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<?php echo form_open_multipart('brand/add');?>
	    <div style="border: thin solid #000000; margin: 10px; width: 460px;">
		<table>
		    <tr >
			<td>Brand Name</td>
			<td><input name="brand_name" type ="text"/></td>
		    </tr>
		</table>
		<table>
		    <tr>
			<td>Description</td>
			<td><textarea name ="description"></textarea></td>
		    </tr>
		</table>
		<table>
		    <tr>
			<td>Logo</td>
			<td><input name="logo" type ="file"/></td>
		    </tr>
		</table>
		<table>
		    <tr>
			<td>Size Chart</td>
			<td><input name="size" type ="file"/></td>
		    </tr>
		</table>
		<div>
		    <input type = "submit" name="submit" value="submit"/>
		</div>
	    </div>
	</form>
	<?php $this->load->view('common/admin_footer');?>
    </body>
</html>