<header>
    <div id="header-topmenu">
        <?php echo anchor('#','Sign in', 'title="Sign in"'); ?><!-- first,where link ,word,-->
        <?php echo anchor('#','Join us', 'title="Register"'); ?>
        <input type="text" placeholder="Enter product name or code" name="product_search"/>
        <input type="button" value="GO"/>
        <span class="lang-link">
            <?php echo anchor('#','<img src="'.asset_url().'img/Thailandlogo.png" />TH', array("title"=>"Register")); ?>/
			<span class="lang-link"><a href="###"><img src="<?php echo asset_url().'img/USAlogo.png'; ?>" />EN</a></span>
        </span>
    </div> <!-- end #header-menu -->
    <div id="header-logo">
        <?php echo anchor('main','<h1>BfashShop </h1>', 'title="main page"'); ?>
        <h1>be trendy for less!</h1>
    </div> <!-- end #header-logo -->
    <div id="header-nav" class="header-nav-bar">
        <span class="nav-cat-top">
            <?php echo anchor('#','WOMEN', ''); ?>
			<div class="submenu">
				<div class="left-submenu">
					<?php echo anchor('#','SHIRT', 'cat_id="1"'); ?>
					<?php echo anchor('#','T-SHIRT', 'cat_id="2"'); ?>
				</div>
				<div class="right-submenu">
					<div class="sub-cat" sup_cat_id="1">
						test1
					</div>
					<div class="sub-cat" sup_cat_id="2">
						test2
					</div>
				</div>
				<div class="clear-float"></div>
			</div>
        </span>
        <span class="nav-cat-top">
            <?php echo anchor('#','MEN', ''); ?>
        </span>
        <span class="nav-cat-top">
            <?php echo anchor('#','KIDS', ''); ?>
        </span>
    </div> <!-- end #header-nav -->
    <div id="header-menu" class="header-nav-bar">
        <span class="menu-item">
            <?php echo anchor('#','CART <span class="txt-detail"> 0 item(s)</span>', 'class="link-cart"'); ?>
        </span>
    </div><!-- end #header-menu -->
</header>    
<div class="clear-float"></div>