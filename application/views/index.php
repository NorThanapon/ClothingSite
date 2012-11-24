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
					<div id="slide-holder">
						<div id="slide-runner">
							<a href="<?php echo asset_url().'img/770X360-ellegirl-1.jpg'; ?>"><img id="slide-img-1" src="<?php echo asset_url().'img/770X360-ellegirl-1.jpg'; ?>" class="slide" alt=""/></a>
							<a href="<?php echo asset_url().'img/770X360-ELLEhomme-1.jpg'; ?>"><img id="slide-img-2" src="<?php echo asset_url().'img/770X360-ELLEhomme-1.jpg'; ?>" class="slide" alt="" /></a>
							<a href="<?php echo asset_url().'img/770X360-SALE.jpg'; ?>"><img id="slide-img-3" src="<?php echo asset_url().'img/770X360-SALE.jpg'; ?>" class="slide" alt="" /></a>
							<a href="<?php echo asset_url().'img/770X360-sale-1.jpg'; ?>"><img id="slide-img-4" src="<?php echo asset_url().'img/770X360-sale-1.jpg'; ?>" class="slide" alt="" /></a>
							<div id="slide-controls">    
								<p id="slide-nav"></p>
							</div>
						</div>	
					</div>	
					
					<!-- <a href="<?php //echo asset_url().'img/main-branner.jpg'; ?>"><img src="<?php //echo asset_url().'img/main-branner.jpg'; ?>"></a> -->
					</div>
					<div class="text-branner">
						<a href="<?php echo asset_url().'img/####' ?>">text</a>
					</div>
					<div class="main-subbranner">
					<div class="sub-branner1">
					<a href="<?php echo asset_url().'img/253x360-Becky.jpg'; ?>"><img src="<?php echo asset_url().'img/253x360-Becky.jpg'; ?>"></a>
					</div>
					<div class="sub-branner2">
					<a href="<?php echo asset_url().'img/253x360-ELLEgirl-W.jpg'; ?>"><img src="<?php echo asset_url().'img/253x360-ELLEgirl-W.jpg'; ?>"></a>
					</div>
					<div class="sub-branner3">
					<a href="<?php echo asset_url().'img/253x360-ITOKIN.jpg'; ?>"><img src="<?php echo asset_url().'img/253x360-ITOKIN.jpg'; ?>"></a>
					</div>
					</div>
				</div><!-- content-main -->
				<div class="clear-float"></div>
			</div><!-- content -->
			
            <?php $this->load->view('common/footer'); ?>
        </div>
		<script type="text/javascript">
			  if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"nature beauty","desc":"nature beauty photography"},{"id":"slide-img-2","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-3","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-4","client":"nature beauty","desc":"add your description here"}];
		</script>
    </body>
</html> 