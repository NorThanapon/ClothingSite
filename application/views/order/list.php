<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
	<h1>Order Management</h1>
        <div class="page-action">
            
        </div>
        <div class="report-filter">
            <fieldset>
                <legend>Search and Filter Options</legend>
                <label for="order_id">Order ID: </label>
                <input name="order_id" type = "text" />
                <label>Status: </label>
                <select>
                    <option>New</option>
                    <option>Paid</option>
                    <option>Shipped</option>
                    <option>Expired</option>
                </select>
                <br />
                <input type="button" value="Search" />
            </fieldset>
        </div>
        <div class="report-items">
            <table border ="1">
                <tr>
                    <td>&nbsp;</td>
                    <td>Date</td>
                    <td>Order NO.</td>
                    <td>Amount</td>
                    <td>Login ID</td>
                    <td>Customer</td>
                    <td>Status</td>
                    <td>&nbsp;</td>
                </td>
                <tr>
                    <td><input type = "checkbox" /></td>
                    <td>15/08/2555 13:02:56</td>
                    <td>1943839</td>
                    <td>420.00</td>
                    <td>jsmith</td>
                    <td>John</td>
                    <td>New</td>
                    <td><a href = "#">Detail</a></td>
                </tr>
                <tr>
                    <td><input type = "checkbox" /></td>
                    <td>15/08/2555 09:43:23</td>
                    <td>1943838</td>
                    <td>370.00</td>
                    <td>psmith</td>
                    <td>Paul</td>
                    <td>New</td>
                    <td><a href = "#">Detail</a></td>
                </tr>
                <tr>
                    <td><input type = "checkbox" /></td>
                    <td>15/08/2555 08:43:23</td>
                    <td>1943837</td>
                    <td>4890.00</td>
                    <td>sdoe</td>
                    <td>Sarah</td>
                    <td>New</td>
                    <td><a href = "#">Detail</a></td>
                </tr>
                <tr>
                    <td><input type = "checkbox" /></td>
                    <td>13/08/2555 10:11:24</td>
                    <td>1943836</td>
                    <td>1230.00</td>
                    <td>eddie</td>
                    <td>Eddie</td>
                    <td>Paid</td>
                    <td><a href = "#">Detail</a></td>
                </tr>
                <tr>
                    <td><input type = "checkbox" /></td>
                    <td>12/08/2555 11:11:11</td>
                    <td>1943835</td>
                    <td>380.00</td>
                    <td>malee</td>
                    <td>Malee</td>
                    <td>Cancel</td>
                    <td><a href = "#">Detail</a></td>
                </tr>
                <tr>
                    <td><input type = "checkbox" /></td>
                    <td>10/08/2555 21:34:03</td>
                    <td>1943834</td>
                    <td>3930.00</td>
                    <td>pamela</td>
                    <td>Pamela</td>
                    <td>Delivered</td>
                    <td><a href = "#">Detail</a></td>
                </tr>
            </table>
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
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>