<header>
	<?php 
		$cat_name = 'cat_name_'.$lang;
	?>
	
    <div id="header-topmenu">
        <?php echo anchor($sign_in_link, $sign_in , 'title="Sign in"'); ?><!-- first,where link ,word,attribute -->
        <?php echo anchor('#','Join us', 'title="Register"'); ?>
        <input type="text" placeholder="Enter product name or code" name="product_search"/>
        <input type="button" value="GO"/>
        <span class="lang-link">
            <a href="javascript:void(0)" class="language-th" title="Thai">TH</a>
			<a href="javascript:void(0)" class="language-en" title="English">EN</a>
        </span>
    </div> <!-- end #header-menu -->
    <div id="header-logo">
		<?php echo anchor(base_url(), '<img src='.asset_url().'img/bfashshop.jpg />', 'title="BfashShop"'); ?>
    </div> <!-- end #header-logo -->
    <div id="header-nav" class="header-nav-bar">
        <span class="nav-cat-top">
            <?php echo anchor('#',$this->lang->line('women'), 'title="Women Category"'); ?>
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
										echo anchor('category/women/'.$str_cat.'/'.$women_categories[$i]->cat_id, $women_categories[$i]->$cat_name,'title="'.$women_categories[$i]->$cat_name.'"'); 
										?>
									</td>
									<?php 										
										if($i+$num < count($women_categories))
										{
											$str_cat = $women_categories[$i+$num]->cat_name_en;
											$str_cat = preg_replace('~[^a-z0-9]+~i', '-', $str_cat);
									?>		
											<td style="width: 200px;"><?php echo anchor('category/women/'.$str_cat.'/'.$women_categories[$i+$num]->cat_id, $women_categories[$i+$num]->$cat_name,'title="'.$women_categories[$i+$num]->$cat_name.'"');?></td>
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
			<?php echo anchor('#',$this->lang->line('men'), ''); ?>
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
											
											echo anchor('category/men/'.$str_cat.'/'.$men_categories[$i]->cat_id,$men_categories[$i]->$cat_name,'title="'.$men_categories[$i]->$cat_name.'"') ?></td>
										<?php if($i+$num < count($men_categories))
											  {
												$str_cat = $men_categories[$i+$num]->cat_name_en;
												$str_cat = preg_replace('~[^a-z0-9]+~i', '-', $str_cat);
										?>		
												<td style="width: 200px;"><?php echo anchor('category/men/'.$str_cat.'/'.$men_categories[$i+$num]->cat_id,$men_categories[$i+$num]->$cat_name,'title="'.$men_categories[$i+$num]->$cat_name.'"') ?></td>
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
<script type="text/javascript">
	$(document).ready(function() {
		//add confirm event for delete button
		$('a.language-th').click(function() {
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('main/change_language');?>",
				data: "lang=th",
				success: function( data ) {
				window.location.reload();
				}});
			});
		$('a.language-en').click(function() {
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('main/change_language');?>",
				data: "lang=en",
				success: function( data ) {
				window.location.reload();
			}});
		});			
	});
</script>