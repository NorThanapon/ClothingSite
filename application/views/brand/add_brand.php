<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/head');?>
    </head>
	
    <body>
        <?php $this->load->view('common/admin_header');?>
	<form  >
          <div style="border: thin solid #000000; margin: 10px; width: 460px;">
     <table  
            style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #000000" >
			<tr >
				<td valign="top" style="padding: 5px; width: 150px;" class="style4">
					<strong style="color: #000066">Brand Name
				</strong>
				</td>
				<td valign="baseline" align="left" 
                    style="padding: 5px; width: 290px;">
					<input name="brand_name" type ="text" style="width: 260px"/>
				</td>
			</tr>
	</table>
	<table style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #000000">
			<tr >
				<td align="justify" valign="top" style="padding: 5px ; width: 150px;" >
					<strong style="color: #000066">Description 
				</strong> 
				</td>
				<td align="left" class="style3" style="padding: 5px;width: 290px; ">
					<textarea name ="description" style="width: 260px; height: 120px" ></textarea>
				</td>
			</tr>
	</table>
	<table style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #000000">
			<tr>
				<td valign="top" style="padding: 5px ;width: 150px; ">
					<strong style="color: #000066">Logo 
				</strong> 
				</td>
				<td align="left" class="style1" style="padding: 5px; width: 290px;">
					<input name="logo " type ="file"/>
				</td>
			</tr>
	</table>
	<table style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #000000">
			<tr>
				<td valign="top" style="padding: 5px ;width: 150px; " >
					<strong style="color: #000066" >Size Chart
				</strong>
				</td>
				<td align="left" class="style1" style="padding: 5px; width: 290px;">
					<input name="size_chart" type ="file"/>
				</td>
			</tr>
	</table>
	<div align="center"  style="padding: 5px; width: 460px;">
					<input type = "submit" value="submit" align="top" style="width: 100px;" />
	</div>
 
    </div>
		
	
	</form>
    <?php $this->load->view('common/admin_footer');?>
    </body>
</html>