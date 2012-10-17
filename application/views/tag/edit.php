	<?php echo form_open('admin/tag/edit/'.$tags->tag_id); ?>
	    <h1>Edit Tag</h1> 		
		<div class="page-action">
	    <span id="btn-add-product" class="button gradient"><img  src="<?php echo asset_url().'img/add-icon.png';?>" />Add Product</span>
		</div>
	    <div class="form-input">
		<fieldset>
		    <legend>Tag Information</legend>
		    <input type="hidden" name="tag_id" value="<?php echo $tags->tag_id;?>" />
		    <label for="tag_name_th">Name (Thai):</label>
		    <input name="tag_name_th" type ="text" value="<?php if(isset($form_tag_name_th)) echo $form_tag_name_th; else echo $tags->tag_name_th; ?>" />*
		    <?php echo form_error('tag_name_th', '<span class="form-error-message">', '</span>'); ?>
			 <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="tag_name_en" >Name (English):</label>
		    <input name ="tag_name_en" type ="text" value="<?php if(isset($form_tag_name_en)) echo $form_tag_name_en; else echo $tags->tag_name_en; ?>" />*
		    <?php echo form_error('tag_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />
			<label for="description_th" >Description (Thai):</label>
		    <textarea name ="description_th" ><?php if(isset($form_description_th)) echo $form_description_th; else echo $tags->description_th; ?></textarea>
		    <br />
		    <label for="description_en" >Description (English):</label>
		    <textarea name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en; else echo $tags->description_en; ?></textarea>
		    <br />
			
		<div class="report-items">
			
			<table class="tablesorter">
			<thead>
				<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Category</th>
				<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		
			<?php 
				foreach($product_in_tag as $item) 
				{
            ?>
            <tr>
				<td><!--<a href ="<?php echo "product/detail/".$item->product_id;?>" >--><?php echo $item->product_id;?><!--</a>--></td>
                <td><?php echo $item->product_name_en;?> </td>
				<td><?php echo $item->brand_name;?></td>
				<td><?php echo $item->cat_name_en;?></td>
				<td><?php echo anchor('admin/tag/delete_product/'.$tags->tag_id.'/'.$item->product_id, ' ', array('title'=>"Delete Product",'class'=>'delete-button')); ?></td>
			</tr>
            <?php					
                }
			?>
			</tbody>
			</table>
			<?php $this->load->view('common/table_pager');?>
		</div>
			<br />
			<label for="is_active">Show :</label>
			<input name='is_active' type = 'checkbox' checked="yes" 
				<?php
				if(isset($form_is_active)){ 
					if($form_is_active){echo "checked"; }
				}
				else{
					if($tags->is_active){ echo "checked";}
				}?>  />
		
			<br />
		</fieldset>
	    </div>
	    <div class="form-action content-right">
		<?php echo anchor('admin/tag','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
	    </div>
	</form>
	<?php $this->load->view('common/confirm_box');?>
	<?php $this->load->view('common/tag_product_box');?>
	<script type="text/javascript">
		 $(document).ready(function() {
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
			
		    confirm('Confirm for deletion','Do you want to delete this tag.',this.href, 'Delete'); 
			//e.preventDefault();
			//$("#form-input").submit();
		    return false;
		});

		$('#btn-add-product').click(function(){
			add_product_in_tag()
		});
		
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
				//0:{sorter:false},
				4:{sorter:false},
			}
		    })
		    .tablesorterPager({
			container: $(".table-pager"),
			positionFixed: false,
			size:20
		    });
		$(".tablesorter").on('sortEnd', function(){
		    //set striping color
		    $(".tablesorter").find('tr').removeClass('even');
		    $(".tablesorter").find("tr:even").addClass("even");
		});
	    }); 
	</script>