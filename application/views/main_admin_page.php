<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
		<?php $this->load->view('common/admin_header');?>
		<?php include($page.'.php'); ?>
		<?php $this->load->view('common/admin_footer');?>
	</body>
</html>