<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head'); ?>
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view('common/header'); ?>
			<div id="content">
				<?php $this->load->view('common/contentside')?>
				<div id="content-main">
					<div class="main-branner">
					<a href="<?php echo asset_url().'img/main-branner.jpg'; ?>"><img src="<?php echo asset_url().'img/main-branner.jpg'; ?>"></a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/sub-branner1.jpg'; ?>"><img src="<?php echo asset_url().'img/sub-branner1.jpg'; ?>"></a>
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