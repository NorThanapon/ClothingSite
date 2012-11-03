<select class="color_picker" name="<?php echo $picker_control_name; ?>" id="<?php echo $picker_control_id; ?>">
    <option value="">-- Select a color --</option>
    <?php
		if($colors != NULL) 
        foreach ($colors as $color) {
    ?>
        <option value="<?php echo $color->color_id; ?>"   title="<?php echo asset_url().'db/colors/'.$color->file_name; ?>" <?php if(isset($form_color) && $form_color == $color->color_id || $color->color_id == isset($items->color_id) ) echo 'selected'; ?>>
            <?php echo $color->color_name;?>
        </option>
    <?php
        }
        if ($allow_manage_color) {
    ?>
        <option value="-1">Manage colors</option>
    <?php
        }
    ?>
</select>
<script language="javascript">
    $(document).ready(function(e) {
        try {
            $("#<?php echo $picker_control_id; ?>").msDropDown();
        } catch(e) {
            alert(e.message);
        }
        $("#<?php echo $picker_control_id; ?>").change(function () {
            if($(this).val() == '-1') {
                manage_color();
            }
        });
    });
</script>