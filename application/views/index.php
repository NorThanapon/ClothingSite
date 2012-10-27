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
					<section id="jms-slideshow" class="jms-slideshow">
						<div class="step" data-x="3000">					
							<a href="<?php echo asset_url().'img/770X360-ellegirl-1.jpg'; ?>"><img src="<?php echo asset_url().'img/770X360-ellegirl-1.jpg'; ?>" /></a>
						</div>
						<div class="step"data-x="3000">				
							<a href="<?php echo asset_url().'img/770X360-ELLEhomme-1.jpg'; ?>"><img src="<?php echo asset_url().'img/770X360-ELLEhomme-1.jpg'; ?>"  /></a>
						</div>
						<div class="step"  data-x="3000">					
							<a href="<?php echo asset_url().'img/770X360-SALE.jpg'; ?>"><img src="<?php echo asset_url().'img/770X360-SALE.jpg'; ?>"  /></a>
						</div>
						<div class="step"  data-x="3000">					
							<a href="<?php echo asset_url().'img/770X360-sale-1.jpg'; ?>"><img src="<?php echo asset_url().'img/770X360-sale-1.jpg'; ?>"  /></a>
						</div>				
					</section>
					<!-- <a href="<?php //echo asset_url().'img/main-branner.jpg'; ?>"><img src="<?php //echo asset_url().'img/main-branner.jpg'; ?>"></a> -->
					</div>
					<div class="text-branner">
						<a href="<?php echo asset_url().'img/####' ?>">text</a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/253x360-Becky.jpg'; ?>"><img src="<?php echo asset_url().'img/253x360-Becky.jpg'; ?>"></a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/253x360-ELLEgirl-W.jpg'; ?>"><img src="<?php echo asset_url().'img/253x360-ELLEgirl-W.jpg'; ?>"></a>
					</div>
					<div class="sub-branner">
					<a href="<?php echo asset_url().'img/253x360-ITOKIN.jpg'; ?>"><img src="<?php echo asset_url().'img/253x360-ITOKIN.jpg'; ?>"></a>
					</div>
				</div><!-- content-main -->
				<div class="clear-float"></div>
			</div><!-- content -->
			
            <?php $this->load->view('common/footer'); ?>
        </div>
		<script type="text/javascript">
			$(function() {
				
				var jmpressOpts	= {
					animation		: { transitionDuration : '0.8s' }
				};
				
				$( '#jms-slideshow' ).jmslideshow( $.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '0.8s',
					arrows		: false
				}));
				
			});
		</script>
    </body>
</html> 