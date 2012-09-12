<div id="header">
    <div id="header-wrapper" class="wrapper">
        <header id="main-header">
            <nav>
                <ul>
                    <li>
                        <?php echo anchor('admin/order', 'Order', 'title="Manage Orders"'); ?>
                    </li>
                    <li>
                        <a href="#">
                            Report
                        </a>
                    </li>
                    <li>
                        <?php echo anchor('admin/brand', 'Brand', 'title="Manage Brands"'); ?>
                    </li>
                    <li>
                        <?php echo anchor('admin/category', 'Category', 'title="Manage Categories"'); ?>
                    </li>
                    <li>
                        <?php echo anchor('admin/product', 'Product', 'title="Manage Products"'); ?>
                    </li>
                    <li>
                        <?php echo anchor('admin/inventory', 'Inventory', 'title="Manage Inventory"'); ?>
                    </li>
                    <li>
                        <a href="#">
                            Banner
                        </a>
                    </li>
                    <li>
                        <strong>
                            <?php if(check_authen('staff', FALSE)) echo anchor('authen/logout', 'Logout', 'title="Logout"');?>
                        </strong>
                    </li>
                </ul>
            </nav>
            <?php echo anchor('admin', '<h1>BFash Shop: Administration</h1>', array('title'=>"BFash Shop: Administration", 'class'=>'logo')); ?>
            </a>
        </header>
    </div><!-- #header-wrapper .wrapper -->
</div>
<!-- #header -->
<section id="content">
        <div id="content-wrapper" class="wrapper">
            <div id="content-detail">
                <?php if(isset($error_message)) { ?>
                    <div class="error-box">
                         <img id="error-close-button" src="<?php echo asset_url().'img/close_icon.gif'?>" />
                         <h3>Notice: </h3>
                         <p class="error-message"><?php echo $error_message; ?></p>
                    </div>
                <?php } ?>