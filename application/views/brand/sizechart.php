<h1>Size Chart</h1>
	<div class="form-input">
		<fieldset>
			<legend>Size Chart Information</legend>
			<div class="report-items">
				<h3>Clothes</h3>
				<table>
					<tr>
						<th>Size</th>
						<th>Chest</th>
						<th>Waist</th>
						<th>Hip</th>
						<th>Sort Order</th>
						<th>&nbsp</th>
					</tr>									
					<tr>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td></td>
					</tr>
				</table>
				<div>
				</div>
			</div>
			<div  class="report-items">
				<h3>Footwear</h3>
				<table>
					<tr>
						<th>Size</th>
						<th>Foot length</th>
						<th>Sort Order</th>
						<th>&nbsp</th>
					</tr>
					<tr>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td></td>
					</tr>
				</table>
				<div>
				</div>
			</div>
			<div  class="report-items">
				<h3>Accessaries</h3>
				<table>
					<tr>
						<th>Length</th>
						<th>Sort Order</th>
						<th>&nbsp</th>
					</tr>
					<tr>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td></td>
					</tr>
				</table>
				<div>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="form-action content-right">
		<?php echo anchor('admin/brand','Cancel' ,array('class' => 'button')); ?>
		<input class="button btn-submit" type = "submit" name="submit" value="Submit"/>
	</div>	