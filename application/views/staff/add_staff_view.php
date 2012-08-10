<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
        <?php echo form_open('staff/process_add_staff') ?>
        
            <label for="Username">Username</label> 
            <input type="input" name="username" /><br />
    
            <label for="password">Password</label>
            <input type="input" name="password" /><br />
            
            <input type="submit" name="submit" value="Create news item" /> 
        
        </form>
        
        
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>