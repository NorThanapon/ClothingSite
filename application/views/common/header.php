<header>
	<?php 
		$cat_name = 'cat_name_'.$lang;
	?>
	
    <div id="header-topmenu">
			
		<?php echo form_open('orderhistory','id="open_account"') ?>
			<div>
				<td><?php echo $this->lang->line('Welcome to');?> BfashShop&nbsp </td>
				<?php //echo anchor("javascript:void(0)",$join_name, array('title'=>$title_join, 'class' =>'header-join')); ?>
				<a href="javascript:void(0)" class="header-join" title="<?php echo $title_join;?>"><?php echo $join_name;?></a>
				<?php echo anchor($sign_in_link, $sign_in , 'title="'.$title_sign.'"'); ?><!-- first,where link ,word,attribute -->
				<input type="hidden" name="e_mail" id="e_mail" value = "<?php if(isset($e_mail)){echo $e_mail;}?>">
			
		
		
		<?php //echo form_open('search/product_nan'); ?>
			<input id="product_search" type="text" placeholder="<?php echo $this->lang->line('Enter product name or code');?>" name="product_search"/>
			<!--<input id="txt_tag_name" type="text" name="tag_name" value="<?php if(isset($search_name)) echo $search_name;  ?>"/>-->		
			<input name="btn_filter" type="button" value="<?php echo $this->lang->line('Go'); ?>" >
		<?php //echo form_close(); ?>
		
		<span class="lang-link">           
			<a href="javascript:void(0)" class="language-en" title="English">EN</a>
			<a href="javascript:void(0)" class="language-th" title="Thai">TH</a>
        </span>
		</div>
		</form>
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
            <?php 
				$num = 0;
			    if(isset($cookie_amount) && $cookie_amount != null )
					$num = $cookie_amount;
				echo anchor('/cart','CART <span class="txt-detail">'.$num.' item(s)</span>', 'class="link-cart"'); ?>
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
		$('input[name=btn_filter]').click(function() {
			var word =  $.trim( $('#product_search').val());
			var str = / /g;
			word = word.replace(str,"-");//$(content).replaceAll(selector)
			window.location = "<?php echo base_url('search'); ?>/" + word;
		    //var url = document.URL;
		    //url = url.substring(0, url.indexOf('/search') + 7);
		    //url = url + $('#product_search').val() + '/' + <?php //echo $product_id->product_id;?>;
		    //window.location = url;
		});
		$("a.header-join").click(function(){
			
			if($("#e_mail").val()!=null)
			{
				document.getElementById("open_account").submit();				
			}
			else
			{
				window.location.replace("<?php echo $join_link;?>");
			}
		});
	});
	
	

</script>