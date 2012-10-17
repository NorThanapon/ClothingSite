<!-- modal pop up -->
    <div id="product-in-tag-modal" class="jqmDialog">
        <div class="jqmdTC">
            Add Product
        </div>
        <div class="jqmdBC">
            <div class="jqmdMSG">               
                <?php echo form_open('admin/tag/add_product_in_tag/'.$tags->tag_id, array("id"=>"form-add-product-in-tag"));?>
                    <div class="jqmdMSGDetail">
                        <!--Name(En): <input type="text" name="product_name_en" />&nbsp;-->
						<label>Product name:</label>
						
						<select id='ddl_product' name="product">
							<option value="0">---Please Select---</option>
							<?php foreach($product_list as $item)	{ ?>
								<option value="<?php echo $item->product_id;?>" ><?php echo $item->product_name_en;?></option>
							<?php }	?>
						</select>
                        <input type="submit" id="btn-add-product" class="button btn-submit"  value="Add product" />
                    </div>
                </form>
            </div>            
        </div>
        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX" />
    </div>
<!-- end modal pop up -->

<script type="text/javascript">
    $('#product-in-tag-modal').jqm({modal: true, trigger: false, toTop: true});
	$('.jqmdX').click(function () {
        document.getElementById("form-add-product-in-tag").reset();
        $('#product-in-tag-modal').jqmHide();
    });
    function add_product_in_tag() {
        $('#product-in-tag-modal').jqmShow();
    }
</script>