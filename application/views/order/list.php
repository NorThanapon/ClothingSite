<!DOCTYPE html>
<html class="admin">
    <head>
        <?php $this->load->view('common/admin_head');?>
    </head>
    <body>
        <?php $this->load->view('common/admin_header');?>
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
            <table border ="1" class="tablesorter">
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
                        <td><input type = "checkbox" /></td>
                        <td>15/08/2555 11:02 AM</td>
                        <td>1943839</td>
                        <td>420.00</td>
                        <td>John Smith</td>
                        <td>jsmith@papa.com</td>
                        <td>New</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>15/08/2555 09:43 AM</td>
                        <td>1943838</td>
                        <td>370.00</td>
                        <td>Paul Simpson</td>
                        <td>psim@gmail.com</td>
                        <td>New</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>15/08/2555 08:43 PM</td>
                        <td>1943837</td>
                        <td>4890.00</td>
                        <td>Sarah Doer</td>
                        <td>sdoe@hotmail.com</td>
                        <td>New</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>13/08/2555 10:11 AM</td>
                        <td>1943836</td>
                        <td>1230.00</td>
                        <td>Eddie Modern</td>
                        <td>eddie@gmail.com</td>
                        <td>Paid</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>12/08/2555 11:11 AM</td>
                        <td>1943835</td>
                        <td>380.00</td>
                        <td>Malee Mana</td>
                        <td>malee@papa.com</td>
                        <td>Expired</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox" /></td>
                        <td>10/08/2555 09:34 PM</td>
                        <td>1943834</td>
                        <td>3930.00</td>
                        <td>Pamela Janssen</td>
                        <td>pamela@gmail.com</td>
                        <td>Delivered</td>
                        <td><a href = "#">Detail</a></td>
                    </tr>
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
        <?php $this->load->view('common/admin_footer');?>
    </body>
</html>