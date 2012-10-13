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
					<div class="main-branner">
					<a href="<?php echo asset_url().'img/main-branner.jpg'; ?>"><img src="<?php echo asset_url().'img/main-branner.jpg'; ?>"></a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/product1.jpg'; ?>"><img src="<?php echo asset_url().'img/product1.jpg'; ?>"></a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/sub-branner2.jpg'; ?>"><img src="<?php echo asset_url().'img/sub-branner2.jpg'; ?>"></a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/sub-branner3.jpg'; ?>"><img src="<?php echo asset_url().'img/sub-branner3.jpg'; ?>"></a>
					</div>
				</div><!-- content-main -->
				<div class="clear-float"></div>
			</div><!-- content -->
			
            <?php $this->load->view('common/footer'); ?>
        </div>
    </body>
</html> 