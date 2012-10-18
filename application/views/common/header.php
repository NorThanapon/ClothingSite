<header>
    <div id="header-topmenu">
        <?php echo anchor('#','Sign in', 'title="Sign in"'); ?><!-- first,where link ,word,attribute -->
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
            <?php echo anchor('#','WOMEN', 'title="Women Category"'); ?>
			<div class="submenu">
					<table>
						<?php 
							$num = ceil(count($women_categories)/2);
							for($i=0; $i<$num; $i++)
							{
						?>      <tr>
									<td style="width: 200px;">
										<?php
										$str_cat = $women_categories[$i]->cat_name_en;
										$str_cat = preg_replace('~[^a-z0-9]+~i', '-', $str_cat);
										echo anchor('category/women/'.$str_cat, $women_categories[$i]->cat_name_en,'title="'.$women_categories[$i]->cat_name_en.'"'); 
										?>
									</td>
									<?php 										
										if($i+$num < count($women_categories))
										{
											$str_cat = $women_categories[$i+$num]->cat_name_en;
											$str_cat = preg_replace('~[^a-z0-9]+~i', '-', $str_cat);
									?>		
											<td style="width: 200px;"><?php echo anchor('category/women/'.$str_cat, $women_categories[$i+$num]->cat_name_en,'title="'.$women_categories[$i+$num]->cat_name_en.'"');?></td>
									<?php
										}
									?>
								</tr>
						
						<?php }
						?>
					</table>
				<div class="clear-float"></div>
			</div>
        </span>
        <span class="nav-cat-top">
			<?php echo anchor('#','MEN', ''); ?>
			<div class="submenu">
				<table>
							<?php 
								$num = ceil(count($men_categories)/2);
								for($i=0; $i<$num; $i++)
								{
							?>      <tr>
										<td style="width: 200px;">
										<?php 
											$str_cat = $men_categories[$i]->cat_name_en;
											$str_cat = preg_replace('~[^a-z0-9]+~i', '-', $str_cat);
											
											echo anchor('category/men/'.$str_cat,$men_categories[$i]->cat_name_en,'title="'.$men_categories[$i]->cat_name_en.'"') ?></td>
										<?php if($i+$num < count($men_categories))
											  {
												$str_cat = $men_categories[$i+$num]->cat_name_en;
												$str_cat = preg_replace('~[^a-z0-9]+~i', '-', $str_cat);
										?>		
												<td style="width: 200px;"><?php echo anchor('category/men/'.$str_cat,$men_categories[$i+$num]->cat_name_en,'title="'.$men_categories[$i+$num]->cat_name_en.'"') ?></td>
										<?php
											  }
										?>
									</tr>
							
							<?php }
							?>
				</table>
				<div class="clear-float"></div>
			</div>
        </span>
    </div> <!-- end #header-nav -->
    <div id="header-menu" class="header-nav-bar">
        <span class="menu-item">
            <?php echo anchor('#','CART <span class="txt-detail"> 0 item(s)</span>', 'class="link-cart"'); ?>
        </span>
    </div><!-- end #header-menu -->
</header>    
<div class="clear-float"></div>