
<!-- modal pop up -->
    <div id="confirm-modal" class="jqmDialog">
        <div class="jqmdTC">
            Confirmation
        </div>
        <div class="jqmdBC">
            <div class="jqmdMSG">
                <p class="jqmConfirmMsg"></p>
                <br />
                <div class="content-right">
                    <input class="button" type="button" value="Cancel"/>
                    <input id="confirm-box-yes-button" class="button" type="button" value="Confirm"/>
                </div>    
            </div>
            
        </div>
<<<<<<< HEAD
        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX jqmClose" alt="close" />
=======
        <input type="image" src="<?php echo asset_url().'img/close_icon.gif'?>" class="jqmdX jqmClose" />
>>>>>>> tag: P'Ake style
    </div>
<!-- end modal pop up -->

<script type="text/javascript">
    $('#confirm-modal').jqm({modal: true, trigger: false, toTop: true});
    function confirm(title, msg, callback, confirm_value) {
<<<<<<< HEAD
        $('#jqmdTC').html(title);
=======
        $('#jqmdTC').html(title)
>>>>>>> tag: P'Ake style
        $('#confirm-box-yes-button').val(confirm_value);
        if(confirm_value=="Delete"){
            $('#confirm-box-yes-button').addClass('btn-delete');
        }
        $('#confirm-modal')
            .jqmShow()
            .find('p.jqmConfirmMsg')
            .html(msg)
            .end()
            .find('.button')
            .click(function(){
                if(this.value == confirm_value)
                    (typeof callback == 'string') ? window.location.href = callback : callback();
            $('#confirm-modal').jqmHide();
          });
    }
</script>