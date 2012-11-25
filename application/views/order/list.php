<h1>Order Management</h1>
        <div class="report-filter">
            <fieldset>
                <legend>Search and Filter Options</legend>
                <label for="key">Key word: </label>
                <input name="key" id="key" type = "text"/>
                <label>Status: </label>
                <select id="status_search">
                    <option>Any Status</option>
                    <option>New</option>
                    <option>Paid</option>
                    <option>Shipped</option>
                    <option>Expired</option>
                </select>
                <input type="button" id ="btn_filter" value="Search" />
            </fieldset>
        </div>
	<?php echo form_open('admin/order/update_status'); ?>
        <div class="report-items">
            <?php $this->load->view('common/table_pager');?>
            <table class="tablesorter">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Date</th>
						<th>Slip</th>
                        <th>Order NO.</th>
                        <th>Amount</th>
                        <th>Name</th>                      
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                   
					<?php
						foreach($orders as $order)
						{
							echo "<tr>";
							
							echo "<td><input type = 'checkbox' name='chb_select_product[]' value='".$order->order_id."'>"."</td>";
							echo "<td>".date("d/m/y h:i A",$order->date_add)."</td>";
							if($order->image_payment=="")
							{
								echo "<td>None</td>";
							}
							else
							{
								echo "<td class ='upload_text'>Uploaded</td>";
							}
							echo "<td>".$order->order_id."</td>";
							echo "<td>".$order->total_price."</td>";
							echo "<td>".$order->first_name." ".$order->last_name."</td>";
							echo "<td>".$order->status."</td>";
							echo "<td>".anchor('admin/order/detail/'.$order->order_id, ' ', array('title'=>"View order detail",'class'=>'edit-button'))."</td>";
							echo "</tr>";
						}
					?>
                   
                </tbody>
            </table>    
            <?php $this->load->view('common/table_pager');?>
        </div>
        <div class="report-action">
            <fieldset>
                <legend>Change Order Status</legend>
                <label>Change all selected orders status to</label>
                <select name="change_status">
                    <option value="New">New</option>
                    <option value="Paid">Paid</option>
					<option value="Partially Paid">Partially Paid</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Expired">Expired</option>
                </select>
                <input type = "submit" value = "Update" name="btn_update" />
            </fieldset>
		</div> 
	</form>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn_filter').click(function() {			
		    var url = document.URL;
		    url = url.substring(0, url.indexOf('/order') + 6);
		    url = url + '/search/' + $('#status_search').val() + '/' + $('#key').val();
		    window.location = url;
		});
		$(".tablesorter").find("tr:even").addClass("even");
		$(".tablesorter")
		    .tablesorter({
			headers: {
			    0:{sorter:false},
			    1:{sorter:'datetime'},
			    7:{sorter:false}
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