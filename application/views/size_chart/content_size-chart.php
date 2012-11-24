		<div id="size-chart_content">
		<div id="head-sizechart"><?php echo $brand_name->brand_name; ?>: SIZE GUIDE <?php echo $gender->cat_gender; ?><!--<?php echo strtoupper($gender); ?>--></div>		
			<table class="main-sizechart-table">
				<tbody>
				<tr>
					<td class="figures">	
						<div class="section">					
							<h2 class="size-title">How to measure</h2>
							<!--<img src="<?php echo asset_url().'img/img_size_guide_women_en.png'; ?>" />-->
							<img src="<?php echo asset_url().'img/img_size_guide_'.strtolower($gender->cat_gender).'_en.png'; ?>" />
						</div>
					</td>
					<td class="size-section">
						<div class="section">
						<?php	
							//$filename = $brand->brand_name.'_'.clothes;	
							//$filename = "ELLE_clothes";
							$validbrandname = str_replace(' ','_',$brand_name->brand_name);
							//$validbrandname = "ELLE";							

							$file = "assets\\size_chart\\".$validbrandname."_".strtoupper($gender->cat_gender).".txt";

							if (file_get_contents($file) != "")
							{
								$text = file_get_contents($file);
								$line = explode("\n",$text);
								
								$c = 0;
								while ($c < count($line))
								{										
						//title						
						?>
									<h2 class="size-title"><?php echo $line[$c++]; ?></h2>
						<?php
						//line 1
									//$lineonetab = preg_replace('/\s\s+/', "\t", $line[$c++]);
									$lineonetab = preg_replace('/[\t]+/', "\t", $line[$c++]);
									$string = explode("\t",$lineonetab);
						?>					
									<table class="col-size">
										<tbody>
											<tr class="headsize">	
												<th class="first-col"><?php echo $string[0]; ?></th>
						<?php					
													for ($j = 1; $j < count($string); $j++)
													{
						?>
														<th><?php echo $string[$j]; ?></th>
						<?php
													}
						?>
											</tr>
						<?php
						//content
									while ($c < count($line) && trim($line[$c]) != "@")
									{
										$lineonetab = preg_replace('/[\t]+/', "\t", $line[$c++]);
										$string = explode("\t",$lineonetab);
										
						?>					
											<tr>
												<td class="first-col"><?php echo $string[0]; ?></td>
						<?php
													for ($j = 1; $j < count($string); $j++)
													{
						?>									
														<td><?php echo $string[$j]; ?></td>
						<?php
													}
						?>
											</tr>
						<?php
										
									}
									$c++;
						?>
									</tbody>
									</table>

						<?php
								}
							}
						?>
						</div>
					</td>
					
				<tr>
				</tbody>
			</table>
		</div>
		
		<script type="text/javascript">
	
		$(document).ready(function() {
			$(".col-size tr:even").css("background","#F7F7F7");
		});
		
		</script>


				