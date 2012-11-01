
<!-- modal pop up -->
    <div id="confirm-modal" class="jqmDialog">
        <div class="jqmdTC">
            Warning
        </div>
        <div class="jqmdBC">
            <div class="jqmdMSG">
                <p class="jqmConfirmMsg"></p>
                <br />
                <div class="content-right">
                    <input class="button" type="button" value="OK"/>
                </div>    
            </div>
            
        </div>

        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX jqmClose" alt="close" />

        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX jqmClose" />

    </div>
<!-- end modal pop up -->

<script type="text/javascript">
    $('#confirm-modal').jqm({modal: true, trigger: false, toTop: true});
    function confirm(title, msg, callback) {

        $('#jqmdTC').html(title);

        $('#jqmdTC').html(title)

        $('#confirm-modal')
            .jqmShow()
            .find('p.jqmConfirmMsg')
            .html(msg)
            .end()
            .find('.button')
            .click(function(){
            $('#confirm-modal').jqmHide();
          });
    }
</script>