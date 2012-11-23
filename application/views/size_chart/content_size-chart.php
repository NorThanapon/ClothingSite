		<div id="size-chart_content">
		<div id="head-sizechart">SIZE GUIDE</div>		
			<table class="main-sizechart-table">
				<tbody>
				<tr>
					<td class="figures">	
						<div class="section">					
							<h2 class="size-title">How to measure</h2>
							<img src="<?php echo asset_url().'img/img_size_guide_woman_en.png'; ?>" />
						</div>
					</td>
					<td class="size-section">
						<div class="section">
						<?php	
							//$filename = $brand->brand_name.'_'.clothes;	
							//$filename = "ELLE_clothes";
							//$validbrandname = str_replace('-',' ',$brand->brand_name);
							$validbrandname = "ELLE";
							$size_chart_name = array("clothes","footwear");
							foreach ($size_chart_name as $filename)
							{
								$file = "assets\\size_chart\\".$validbrandname."_".$filename.".txt";
								if (file_exists($file))
								{
									$text = file_get_contents($file);
									$line = explode("\n",$text);
						//title						
						?>
									<h2 class="size-title"><?php echo $line[0]; ?></h2>
						<?php
						//line 1
									$string = explode(" ",$line[1]);
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
									for($i = 2; $i < count($line); $i++)
									{
										$string = explode(" ",$line[$i]);	
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


				