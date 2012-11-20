<h1>Order Management</h1>
        <div class="report-filter">
            <fieldset>
                <legend>Search and Filter Options</legend>
                <label for="order_id">Order NO.: </label>
                <input name="order_id" type = "text"/>
                <label>Status: </label>
                <select>
                    <option>Any Status</option>
                    <option>New</option>
                    <option>Paid</option>
                    <option>Shipped</option>
                    <option>Expired</option>
                </select>
                <input type="button" value="Search" />
            </fieldset>
        </div>
        <div class="report-items">
            <?php $this->load->view('common/table_pager');?>
            <table class="tablesorter">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Date</th>
                        <th>Order NO.</th>
                        <th>Amount</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type = "checkbox"  /></td>
                        <td>15/08/2555 11:02 AM</td>
                        <td>1943839</td>
                        <td>420.00</td>
                        <td>John Smith</td>
                        <td>jsmith@papa.com</td>
                        <td>New</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
					<?php
						foreach($orders as $order)
						{
							echo "<tr>";
							echo "<td><input type = 'checkbox'/>"."</td>";							
							echo "<td>".date("d/m/y h:i A",$order->date_add)."</td>";
							echo "<td>".$order->order_id."</td>";
							echo "<td>".$order->total_price."</td>";
							echo "<td>".$order->name."</td>";
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
                <select>
                    <option>New</option>
                    <option>Paid</option>
                    <option>Shipped</option>
                    <option>Expired</option>
                </select>
                <input type = "button" value = "Update" />
            </fieldset>
	</div>      
	<script type="text/javascript">
	    $(document).ready(function() {        
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