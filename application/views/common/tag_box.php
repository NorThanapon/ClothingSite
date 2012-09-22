<!-- modal pop up -->
    <div id="tag-modal" class="jqmDialog">
        <div class="jqmdTC">
            Add Tag
        </div>
        <div class="jqmdBC">
            <div class="jqmdMSG">               
                <?php echo form_open('admin/tag/add', array("id"=>"form-add-tag"));?>
                    <div class="jqmdMSGDetail">
                        Name(En): <input type="text" name="tag_name_en" />&nbsp;
						Name(Th):    <input type="text" name="tag_name_th" />&nbsp;   
                        <input type="submit" id="btn-add-tag" class="button btn-submit"  value="Add tag" />
                    </div>
                </form>
            </div>            
        </div>
        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX" />
    </div>
<!-- end modal pop up -->

<script type="text/javascript">
    $('#tag-modal').jqm({modal: true, trigger: false});
	$('.jqmdX').click(function () {
        document.getElementById("form-add-tag").reset();
        $('#tag-modal').jqmHide();
    });
    function add_tag() {
        $('#tag-modal').jqmShow();
    }
</script>