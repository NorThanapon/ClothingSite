<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
        <?php echo form_open('admin/staff/process_add_staff') ?>
        
            <label for="username">Username</label> 
            <input type="text" name="username" /><br />
    
            <label for="password">Password</label>
            <input type="password" name="password" /><br />
            
            <input type="submit" name="submit" value="Create news item" /> 
        
        </for20.m>
        
        
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>