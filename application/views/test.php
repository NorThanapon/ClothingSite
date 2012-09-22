<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
        
	<?php $this->load->view('common/color/color_picker');?>
	
	<?php echo form_open('testLangauge'); ?>	
	<label for ="show_langauge"><?php echo lang('language_key') ; ?>
	<input type="text" name="langauge" />
	<input type="submit" value = "submit" />
	</form>
	
	
	
	
	
	
	<?php $this->load->view('common/admin_footer');?>
	<?php $this->load->view('common/confirm_box');?>
	<?php $this->load->view('common/color/color_box');?>
	
	
	
	
    </body>
</html>