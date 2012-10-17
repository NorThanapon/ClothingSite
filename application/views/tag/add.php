	<?php echo form_open('admin/tag/add/'); ?>
	    <h1>Add Tag</h1> 		
	    <div class="form-input">
		<fieldset>
		    <legend>Tag Information</legend>
		    <label for="tag_name_th">Name (Thai):</label>
		    <input name="tag_name_th" type ="text" value="<?php if(isset($form_tag_name_th)) echo $form_tag_name_th; ?>" />*
		    <?php echo form_error('tag_name_th', '<span class="form-error-message">', '</span>'); ?>
			 <span class='form-error-message'><?php echo $dup_message_th;?></span>
		    <br />
		    <label for="tag_name_en" >Name (English):</label>
		    <input name ="tag_name_en" type ="text" value="<?php if(isset($form_tag_name_en)) echo $form_tag_name_en; ?>" />*
		    <?php echo form_error('tag_name_en', '<span class="form-error-message">', '</span>'); ?>
			<span class='form-error-message'><?php echo $dup_message_en;?></span>
		    <br />
			<label for="description_th" >Description (Thai):</label>
		    <textarea name ="description_th" ><?php if(isset($form_description_th)) echo $form_description_th;?></textarea>
			<br />
		    <label for="description_en" >Description (English):</label>
		    <textarea name ="description_en" ><?php if(isset($form_description_en)) echo $form_description_en;?></textarea>
			<br />
			<label for="is_active">Show :</label>
			<input id="is_active" name="is_active" <?php if(!isset($form_is_active) || $form_is_active) echo " checked "?> type="checkbox"  />
			<br />
		</fieldset>
	    </div>
	    <div class="form-action content-right">
		<?php echo anchor('admin/tag','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Save Change"/>	
	    </div>
	</form>
	<?php $this->load->view('common/confirm_box');?>

	<script type="text/javascript">
		 $(document).ready(function() {
		//add confirm event for delete button
		$('a.delete-button').click(function() { 
		    confirm('Confirm for deletion','Do you want to delete this tag.',this.href, 'Delete'); 
		    return false;
		});
	    }); 
	</script>