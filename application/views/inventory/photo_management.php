	    <h1>Photos of Item<?php echo ' '.$items->item_id; ?></h1> 
		<input type="hidden" id="item_id"  value="<?php echo $items->item_id; ?>" />
		<div class="photo-item-details">
			<label>Product's name: </label>
			<span><?php echo $product->product_name_en;?></span><br />
			<label>Size: </label>
			<span><?php echo $items->size; ?></span><br />
			<label>Color: </label>
			<span><?php foreach($all_colors as $color){
									if($color->color_id == $items->color_id){
									  echo '<img src='.asset_url().'db/colors/'.$color->file_name.' alt="" />  ';
									  echo $color->color_name;
									}
								}
						 ?>
			</span><br /><br />
		</div>
	    <div class="form-input">	
		
	    <fieldset class="photo-field">
		<legend>Existing photos</legend>
		<div class="scroll-image">
		<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
			<div class="scroll-content">
				<?php 
					
					if($photos == false){
					?>
						<div id="div-thumb" class="scroll-content-item ui-widget-header">					
									No image is available.
						</div>
					<?php
					}
					else
					{
					foreach($photos as $item)
					{
						$isDuplicate = false;
						if(isset($images)){
							for($i=0 ;$i<count($images); $i++){
								if($item->image_id == $images[$i]->image_id ){
									$isDuplicate = true;
								}
							}
							if(!$isDuplicate){
								?>		
									<div id="div-thumb<?php echo $item->image_id;?>" class="scroll-content-item ui-widget-header">					
										<img class="image_thumb" name="image_thumb<?php echo $item->image_id;?>" src="<?php echo asset_url().'db/products/m_'.$item->file_name."";?>" alt="" />
									</div>
									<?php	
							}
						}
						else{
								?>		
								<div id="div-thumb<?php echo $item->image_id;?>" class="scroll-content-item ui-widget-header">					
									<img class="image_thumb" name="image_thumb<?php echo $item->image_id;?>" src="<?php echo asset_url().'db/products/m_'.$item->file_name."";?>" alt="" />
								</div>
								
								<?php	
						}
					
					}
					}
					?>	
					<div id="div-thumb" class="scroll-content-item ui-widget-header">					
										
					</div>
			</div>
			<div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
				<div class="scroll-bar"></div>
			</div>
		</div>
		</div>
		</fieldset>
		
		<fieldset class="photo-field">
		<legend>Choosen photos</legend>
			<form>
			<div class="choosen-photo">
			<input type='hidden' id='main_image_id' value='<?php if( $items->main_image !=null) echo $items->main_image;?>' />
			<?php if(isset($images)){
				$count =0;//_for_set_default_main_image
				for($i=0 ;$i<count($images); $i++){
			
					echo "<div class='report-items photo-item'>	";			
					echo "<a class='fancybox-button' rel='fancybox-button' href='".asset_url().'db/products/'.$images[$i]->file_name."' title='".$images[$i]->file_name."' >
						  <img src='".asset_url().'db/products/'.$images[$i]->file_name."' alt='' />
						  </a>";
					echo "<br />";
					echo "<label class='label_main_image'>Main Image: </label>";
					if($items->main_image == $images[$i]->image_id){
						echo "<input class='main_image_radio' type='radio'  id='main_image".$i."' value=".$images[$i]->image_id." name='main_image' checked />";
					}
					else{
						echo "<input class='main_image_radio' type='radio' id='main_image".$i."' value=".$images[$i]->image_id." name='main_image' />";
					}
					echo anchor('admin/inventory/delete_image/'.$items->item_id.'/'.$images[$i]->image_id ,' ', array('title'=>"Delete this image from item",'class'=>'delete-button','rel'=>$images[$i]->image_id)); 
					echo "<br />";
					echo "</div>";
					
				}
				echo "<input type='hidden' id='count_image' value='".count($images)."' />";
			}
			else{
				echo "<input type='hidden' id='count_image' value='0' />";
			}
			?>
			</div>
			
			</form>		
	    	
		
		</fieldset>
		<br />
		
		</div>			
			<div class="content-right form-action">			
			<?php echo anchor('admin/inventory','Done' ,array('class' => 'button')); ?>	
			</div>
		
		<?php $this->load->view('common/admin_footer');?>
		<?php $this->load->view('common/confirm_box');?>
		<?php $this->load->view('common/color/color_box');?>	
	
   <script type="text/javascript"> 
    $(function() {
        //scrollpane parts
        var scrollPane = $( ".scroll-pane" ),
            scrollContent = $( ".scroll-content" );
         
        //build slider
        var scrollbar = $( ".scroll-bar" ).slider({
            slide: function( event, ui ) {
                if ( scrollContent.width() > scrollPane.width() ) {
                    scrollContent.css( "margin-left", Math.round(
                        ui.value / 100 * ( scrollPane.width() - scrollContent.width() )
                    ) + "px" );
                } else {
                    scrollContent.css( "margin-left", 0 );
                }
            }
        });
         
        //append icon to handle
        var handleHelper = scrollbar.find( ".ui-slider-handle" )
        .mousedown(function() {
            scrollbar.width( handleHelper.width() );
        })
        .mouseup(function() {
            scrollbar.width( "100%" );
        })
        .append( "<span class='ui-icon ui-icon-grip-dotted-vertical'></span>" )
        .wrap( "<div class='ui-handle-helper-parent'></div>" ).parent();
         
        //change overflow to hidden now that slider handles the scrolling
        scrollPane.css( "overflow", "hidden" );
         
        //size scrollbar and handle proportionally to scroll distance
        function sizeScrollbar() {
            var remainder = scrollContent.width() - scrollPane.width();
            var proportion = remainder / scrollContent.width();
            var handleSize = scrollPane.width() - ( proportion * scrollPane.width() );
            scrollbar.find( ".ui-slider-handle" ).css({
                width: handleSize,
                "margin-left": -handleSize / 2
            });
            handleHelper.width( "" ).width( scrollbar.width() - handleSize );
        }
         
        //reset slider value based on scroll content position
        function resetValue() {
            var remainder = scrollPane.width() - scrollContent.width();
            var leftVal = scrollContent.css( "margin-left" ) === "auto" ? 0 :
                parseInt( scrollContent.css( "margin-left" ) );
            var percentage = Math.round( leftVal / remainder * 100 );
            scrollbar.slider( "value", percentage );
        }
         
        //if the slider is 100% and window gets larger, reveal content
        function reflowContent() {
                var showing = scrollContent.width() + parseInt( scrollContent.css( "margin-left" ), 10 );
                var gap = scrollPane.width() - showing;
                if ( gap > 0 ) {
                    scrollContent.css( "margin-left", parseInt( scrollContent.css( "margin-left" ), 10 ) + gap );
                }
        }
         
        //change handle position on window resize
        $( window ).resize(function() {
            resetValue();
            sizeScrollbar();
            reflowContent();
        });
        //init scrollbar size
        setTimeout( sizeScrollbar, 10 );//safari wants a timeout
    });
  
	$(document).ready(function() {
		
		
		
		$('.fancybox-button').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : false,
				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},
				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
		});
		
		
		$('input[name=main_image]').change(function(){
			var path = "<?php echo base_url('admin/inventory/save_main_image');?>";
			var x = $(this).val();
			//alert(x);
			$.ajax({
				type: 'POST',
				url: path,
				data: {	image_id: $(this).val() ,
						item_id: $('#item_id').val()
				},
				error: function(data, textStatus, xhr){
					alert(xhr);
				},
				success: function(data){
					$('input[value='+x+']').attr('checked',true);
					$('#main_image_id').val(x);
				}
			});
		});

		$('.image_thumb').click(function(){
			var n = $(this).attr("name").substring(11);
			$('#div-thumb'+n).hide();
			var path = "<?php echo base_url('admin/inventory/add_image_in_item');?>";
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: path,
				data: {	image_id: n ,
						item_id: $('#item_id').val()
				},
				error: function(data, textStatus, xhr){
					alert('This image is already exist in this item');
					location.reload();
				},
				success: function(data){
					$('.choosen-photo').append($('<div></div>')
						.attr('class','report-items photo-item')
							.append($('<a></a>')
								.attr('class','fancybox-button')
								.attr('rel','fancybox-button')
								.attr('href','<?php echo asset_url();?>db/products/'+data['images'].file_name)
								.attr('title',data['images'].file_name)
									.append($('<img></img>')
										.attr('src','<?php echo asset_url().'db/products/'; ?>'+data['images'].file_name)
										.attr('id', data['images'].image_id)
											
									)
									
							)
							.append($('<br />'))
							.append($('<label></label>')
								.attr('class','label_main_image')
								.html('Main Image: ')
							)
							.append($('<input></input>')
								.attr('class','main_image_radio')
								.attr('type','radio')
								.attr('value',data['images'].image_id)
								.attr('name','main_image')
								.attr('id',$('#count_image').val())
							)
							.append($('<a></a>')
												.attr('class','delete-button')
												.attr('href','<?php echo base_url();?>'+'admin/inventory/delete_image/'+$('#item_id').val()+'/'+data['images'].image_id)
												.attr('title','Delete this image from the item.')
												.attr('rel',data['images'].image_id)
												.click(function() { 	
													confirm('Confirm for deletion','Do you want to delete this image.',this.href, 'Delete'); 
													return false;
												})
												
							)
														
					);
					
					if($('#count_image').val() == 0){
						var path = "<?php echo base_url('admin/inventory/save_main_image');?>";
						var x = data['images'].image_id;
						$.ajax({
							type: 'POST',
							url: path,
							data: {	image_id: data['images'].image_id ,
									item_id: $('#item_id').val()
							},
							error: function(data, textStatus, xhr){
								alert(xhr);
							},
							success: function(data){
								$('input[value='+x+']').attr('checked',true);
								$('#main_image_id').val(x);
							}
						});
					
					}
					$('#count_image').val(parseInt($('#count_image').val())+1);
				}
			});
			
		});

		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this image.',this.href, 'Delete'); 
		    return false;
		});
		$("#btn-add-photo").click(function(){
			document.getElementById("form-add-photo").submit();
		});
		if(!$('input[name="main_image"]').is(":checked")){
			if($('input[id="main_image0"]').val()!=null){
			var path = "<?php echo base_url('admin/inventory/save_main_image');?>";
			var x = $('input[id="main_image0"]').val();
				$.ajax({
					type: 'POST',
					url: path,
					data: {	image_id: x ,
							item_id: $('#item_id').val()
					},
					error: function(data, textStatus, xhr){
							alert(xhr);
					},
					success: function(data){
						$('input[id="main_image0"]').attr('checked','true');
						$('#main_image_id').val(x);
					}
			});
			}
			
		}
		if($('input[name="main_image"]').length <=0){
				var path = "<?php echo base_url('admin/inventory/save_main_image');?>";
				//alert("ItemID: "+$('#item_id').val());
				$.ajax({
					type: 'POST',
					url: path,
					data: {	
							item_id: $('#item_id').val()
					},
					error: function(data, textStatus, xhr){
							alert(xhr);
					},
					success: function(data){
						$('input[id="main_image0"]').attr('checked','true');
						$('#main_image_id').val(x);
					}
				});
			
			}

	});
	</script>
