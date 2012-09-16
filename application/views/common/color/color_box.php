
<!-- modal pop up -->
    <div id="color-modal" class="jqmDialog">
        <div class="jqmdTC">
            Manage Colors
        </div>
        <div class="jqmdBC">
            <div class="jqmdMSG"> 
                <h1>
                    Colors
                </h1>
                <div class="jqmdMSGDetail">
                    <?php echo form_open('admin/color/service_delete', array("id"=>"form-delete-color"));?>
                        Select color:
                        <select class="color_picker" name="delete_color" id="ddl-delete-color">
                            <option value="">-- Select a color --</option>
                            <?php
                                foreach ($all_colors as $color) {
                            ?>
                                <option value="<?php echo $color->color_id; ?>" title="<?php echo asset_url().'db/colors/'.$color->file_name; ?>">
                                    <?php echo $color->color_name; ?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                        <input type="button" id="btn-delete-color" class="button btn-delete" value="Delete color" />
                    </form>
                </div>
                <br /><br />
                <?php echo form_open_multipart('admin/color/service_add', array("id"=>"form-add-color"));?>
                    <h1>
                        Add Color
                    </h1>
                    <div class="jqmdMSGDetail">
                        Name: <input type="text" id="txt-color-name" name="color_name" />
                        Sample: <input type="file" id="file-color-file" name="file_name" />
                        <input type="button" id="btn-add-color" class="button btn-submit"  value="Add color" />
                        <p id="msg-adding-color">
                            Adding color. Please wait...
                        </p>
                        <br /><br /><br /><br />
                    </div>
                </form>
            </div>
            
        </div>
        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX" />
    </div>
<!-- end modal pop up -->

<script type="text/javascript">
    $('#color-modal').jqm({modal: true, trigger: false});
    $('#msg-adding-color').hide();
    $("#ddl-delete-color").msDropDown();
    $('.jqmdX').click(function () {
        $("#<?php echo $picker_control_id; ?>").val("");
        $("#<?php echo $picker_control_id; ?>").msDropDown();
        $('#color-modal').jqmHide();
    });
    $("#btn-delete-color").click(function () {
        var formData = new FormData($('#form-delete-color')[0]);
        $.ajax({
            url: $('#form-delete-color').attr('action'),  //server script to process data
            type: 'POST',
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // check if upload property exists
                    //myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // for handling the progress of the upload
                }
                return myXhr;
            },
            //Ajax events
            //beforeSend: function () {$('#msg-adding-color').show(); },
            success: function(data, textStatus, jqXHR) {
                //$('#msg-adding-color').hide();
                console.log(data);
                option = jQuery.parseJSON(data);
                $("option[value='"+option.color_id+"']").remove();
                //$("#ddl-delete-color option[value='"+option.color_id+"']").remove();
                $(".color_picker").msDropDown();
				
                //$("#<?php echo $picker_control_id; ?>").msDropDown();
                
            },
            error: function(e) {console.log(e);},
            // Form data
            data: formData,
            //Options to tell JQuery not to process data or worry about content-type
            cache: false,
            contentType: false,
            processData: false
        });
    });
    $('#btn-add-color').click(function () {
        var formData = new FormData($('#form-add-color')[0]);
        $.ajax({
            url: $('#form-add-color').attr('action'),  //server script to process data
            type: 'POST',
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // check if upload property exists
                    //myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // for handling the progress of the upload
                }
                return myXhr;
            },
            //Ajax events
            beforeSend: function () {$('#msg-adding-color').show(); },
            success: function(data, textStatus, jqXHR) {
				//console.log(data);
                $('#msg-adding-color').hide();
                option = jQuery.parseJSON(data);
                html_option = "<option value='"+option.color_id+"' title='<?php echo asset_url()."db/colors/"; ?>"+option.file_name+"'>";
                html_option += option.color_name + "</option>";
				
				$('.color_picker').each(function(index,element){
					if($(element).find('option[value="-1"]').length>0)
					{
						$(html_option).insertBefore($(element).find('option[value="-1"]'));
					}
					else
					{
						$(element).append(html_option);
					}
					$(element).msDropDown();
				});
				
                /*$("#ddl-delete-color").append(html_option);//
                $("#ddl-delete-color").msDropDown();
				
                if($("#<?php echo $picker_control_id; ?> option[value='-1']").length > 0){
                    $(html_option).insertBefore("#<?php echo $picker_control_id; ?> option[value='-1']");
                }
                else {
                    $("#<?php echo $picker_control_id; ?>").append(html_option);   
                }*/
                $("#<?php echo $picker_control_id; ?>").val(option.color_id);
                $("#<?php echo $picker_control_id; ?>").msDropDown();
				
                var fld = document.getElementById("form-add-color");
                fld.reset();
                $('#color-modal').jqmHide();
            },
            error: function(e) {console.log(e);},
            // Form data
            data: formData,
            //Options to tell JQuery not to process data or worry about content-type
            cache: false,
            contentType: false,
            processData: false
        });
    });
    function manage_color() {
        $('#color-modal').jqmShow();
    }
</script>