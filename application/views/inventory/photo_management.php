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
					$count =0;//_for_set_default_main_image
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
					$count++;
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
			
			<div class="choosen-photo">
			<?php if(isset($images)){
				for($i=0 ;$i<count($images); $i++){
			
					echo "<div class='report-items photo-item'>	";			
					echo "<a class='fancybox-button' rel='fancybox-button' href='".asset_url().'db/products/'.$images[$i]->file_name."' title='".$images[$i]->file_name."' >
						  <img src='".asset_url().'db/products/'.$images[$i]->file_name."' alt='' />
						  </a>";
						
					echo "<input type='hidden' name='image_id' value='".$images[$i]->image_id."' />";
					echo "<br />";
					echo anchor('admin/inventory/delete_image/'.$items->item_id.'/'.$images[$i]->image_id ,' ', array('title'=>"Delete this image from item",'class'=>'delete-button')); 
					echo "<br />";
					echo "</div>";
				
				}
			}
			?>
			</div>
			
					
	    	
		
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
					//alert(data);
					//alert(data['images'].length);
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
							.append($('<a></a>')
												.attr('class','delete-button')
												.attr('href','<?php echo base_url();?>'+'admin/inventory/delete_image/'+$('#item_id').val()+'/'+data['images'].image_id)
												.attr('title','Delete this image from item')
												
							)
														
					);
				
				}
			});
			
		});
		
		
		
		$('img').load(function() {
			$('.scroll-content-item').css('width',$('.image_thumb').width());
		});
		$('.del-butt').click(function() { 
		    alert('ABD');
		    confirm('Confirm for deletion','Do you want to delete this image.',this.href, 'Delete'); 
		    return false;
		});
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this image.',this.href, 'Delete'); 
		    return false;
		});
		$("#btn-add-photo").click(function(){
			document.getElementById("form-add-photo").submit();
		});

	});
	</script>
