<div id="header">
    <div id="header-wrapper" class="wrapper">
        <header id="main-header">
            <nav>
                <ul>
                    <li>
                        <?php echo anchor('order', 'Order', 'title="Manage Orders"'); ?>
                    </li>
                    <li>
                        <a href="#">
                            Report
                        </a>
                    </li>
                    <li>
                        <?php echo anchor('brand', 'Brand', 'title="Manage Brands"'); ?>
                    </li>
                    <li>
                        <a href="#">
                            Category
                        </a>
                    </li>
                    <li>
                        <?php echo anchor('product', 'Product', 'title="Manage Products"'); ?>
                    </li>
                    <li>
                        <a href="#">
                            Inventory
                        </a>
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
            <a href="index.html" class="logo">
                <h1>B-Fash: Administration</h1>
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