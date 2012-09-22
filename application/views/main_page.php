<!DOCTYPE html>
<html>
    <head>
        <?php include('common/head.php'); ?>
    </head>
    <body>
	 <div class="wrapper">
		 <?php include('common/header.php'); ?>
			<div id="content">
				<?php include('common/contentside.php'); ?>
				<div id="content-main">
					<?php include($page.'.php'); ?>
				</div><!-- content-main -->
				
				<div class="clear-float"></div>
			</div><!-- content -->
			
            <?php $this->load->view('common/footer'); ?>
        </div>
	</body>
</html>