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
					<div id="content-history">	
					<a href="###" class="history-previous">Home > </a>					
					<a href="###" id="history-current"> New In: Clothing</a>
					</div>
					<div id="content-showing">
					<h2>Showing Items 0-10 of 10</h2>
					<a href="###">0</a>
					</div>
					<div id="product-list">
						<div class="sub-product">
						<a href="<?php echo asset_url().'img/product1.png'; ?>"><img src="<?php echo asset_url().'img/product1.png'; ?>"></a>
						<h2>Illusion Pencil Dress</h2>
							<div id="detail-price">
								<h3>was 4,000 THB</h3>
								<h2>2,000 THB</h2>
							</div>
						</div>
						<div class="sub-product">
						<a href="<?php echo asset_url().'img/product2.png'; ?>"><img src="<?php echo asset_url().'img/product2.png'; ?>"></a>
						<h2>V Neck Ponte Pencil Dress</h2>
							<div id="detail-price">
								<h3>was 4,000 THB</h3>
								<h2>2,000 THB</h2>
							</div>
						</div>
						<div class="sub-product">
						<a href="<?php echo asset_url().'img/product3.png'; ?>"><img src="<?php echo asset_url().'img/product3.png'; ?>"></a>
						<h2>Pink Ikat Bodycon Dress</h2>
							<div id="detail-price">
								<h3>was 4,000 THB</h3>
								<h2>2,000 THB</h2>
							</div>
						</div>
						<div class="sub-product">
						<a href="<?php echo asset_url().'img/product4.png'; ?>"><img src="<?php echo asset_url().'img/product4.png'; ?>"></a>
						<h2>Cord Zip Tunic by Boutique</h2>
							<div id="detail-price">
								<h3>was 4,000 THB</h3>
								<h2>2,000 THB</h2>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear-float"></div>
			</div><!-- content -->
			
            <?php $this->load->view('common/footer'); ?>
        </div>
    </body>
</html> 