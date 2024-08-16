<?php
$activate = get_option('okapi_wasb_activate', 2);
$position = get_option('okapi_wasb_position', 3);
$number = get_option('okapi_wasb_number', '');
$msg = get_option('okapi_wasb_msg', 'Hi');
$width = get_option('okapi_wasb_width', 75);
$height = get_option('okapi_wasb_height', 75);
$margin = get_option('okapi_wasb_margin', 15);
$marginb = get_option('okapi_wasb_marginb', 15);
$icon_type = get_option('okapi_wasb_icon_type', 1);
$icon_id = get_option('okapi_wasb_icon_id', 0);
$icon_src = OKAPI_WASB_DEFAULT_IMG;
$default_src = OKAPI_WASB_DEFAULT_IMG;

$icon_attachment = wp_get_attachment_image_src($icon_id, 90);
if(isset($icon_attachment[0]) && $icon_type == 2){
    $icon_src = $icon_attachment[0];
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
               <div>
            <table>
                <thead>
                    <tr>
                        <th>
                            <h1><?php _e('Sticky Button - Settings', 'sticky-button'); ?></h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Activate', 'sticky-button'); ?> <span class="required">*</span>  
                        </td>
                        <td class="okapi-wasb-td-2">
                            <select id="okapi-wasb-activate" class="okapi-wasb-form-element">
                                <option value="1" <?php if($activate == '1'){ echo 'selected'; } ?> ><?php _e('Yes', 'sticky-button'); ?></option>
                                <option value="2" <?php if($activate == '2'){ echo 'selected'; } ?> ><?php _e('No', 'sticky-button'); ?></option>
                            </select>
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Button Position', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <select id="okapi-wasb-position" class="okapi-wasb-form-element">
                                <option value="1" <?php if($position == '1'){ echo 'selected'; } ?> ><?php _e('Top Left', 'sticky-button'); ?></option>
                                <option value="2" <?php if($position == '2'){ echo 'selected'; } ?> ><?php _e('Top Right', 'sticky-button'); ?></option>
                                <option value="3" <?php if($position == '3'){ echo 'selected'; } ?> ><?php _e('Bottom Right', 'sticky-button'); ?></option>
                                <option value="4" <?php if($position == '4'){ echo 'selected'; } ?> ><?php _e('Bottom Left', 'sticky-button'); ?></option>
                            </select>
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Link to Open', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <input id="okapi-wasb-number" class="okapi-wasb-form-element" value="<?php echo $number; ?>" type="text">
                            <div class="okapi-wasb-error"></div>
                        </td>
                        </tr>
                    
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Icon Width', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <input id="okapi-wasb-width" class="okapi-wasb-form-element" value="<?php echo $width; ?>" type="number">
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">
                            <small class="okapi-wasb-small">
                                <?php _e('In Pixel', 'sticky-button'); ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Icon Height', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <input id="okapi-wasb-height" class="okapi-wasb-form-element" value="<?php echo $height; ?>" type="number">
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">
                            <small class="okapi-wasb-small">
                                <?php _e('In Pixel', 'sticky-button'); ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Icon Margin', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <input id="okapi-wasb-margin" class="okapi-wasb-form-element" value="<?php echo $margin; ?>" type="number">
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">
                            <small class="okapi-wasb-small">
                                <?php _e('In Pixel', 'sticky-button'); ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Icon Margin Bottom', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <input id="okapi-wasb-marginb" class="okapi-wasb-form-element" value="<?php echo $marginb; ?>" type="number">
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">
                            <small class="okapi-wasb-small">
                                <?php _e('In Pixel', 'sticky-button'); ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Icon Type', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <select id="okapi-wasb-icon-type" class="okapi-wasb-form-element">
                                <option value="1" <?php if($icon_type == '1'){ echo 'selected'; } ?> ><?php _e('Default Icon', 'sticky-button'); ?></option>
                                <option value="2" <?php if($icon_type == '2'){ echo 'selected'; } ?> ><?php _e('Select Custom Icon', 'sticky-button'); ?></option>
                            </select>
                            <div class="okapi-wasb-error"></div>
                        </td>
                        <td class="okapi-wasb-td-3">
                            <button id="okapi-wasb-icon-id" data-id="<?php echo $icon_id; ?>" class="button button-large">
                                <?php _e('Select Icon', 'sticky-button'); ?> 
                            </button>
                            <div class="okapi-wasb-error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="okapi-wasb-td-1">
                            <?php _e('Icon Preview', 'sticky-button'); ?> <span class="required">*</span>   
                        </td>
                        <td class="okapi-wasb-td-2">
                            <img src="<?php echo $icon_src; ?>" id="okapi-wasb-icon-preview" class="okapi-wasb-add-sub-btn-link" title="WhatsApp" alt="WhatsApp" style="max-height: 75px;">
                        </td>
                        <td class="okapi-wasb-td-3">&nbsp;</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <button id="okapi-wasb-save-settings" class="button button-large">
                                <?php _e('Save Changes', 'sticky-button'); ?>
                            </button>
                        </td>
                    </tr>  
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
var default_src = "<?php echo $default_src; ?>";

jQuery(document).on("change", "#okapi-wasb-icon-type", function(){
    var value = jQuery(this).val();
    if(value == 1){
        jQuery("#okapi-wasb-icon-id").fadeOut();
        jQuery("#okapi-wasb-icon-preview").attr("src", default_src);
    }else{
        jQuery("#okapi-wasb-icon-id").fadeIn();
    }
});

jQuery(document).ready(function(){
    jQuery("#okapi-wasb-icon-type").trigger("change");

    jQuery(document).on("click", "#okapi-wasb-icon-id", function(){
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: "Choose Icon Image",
            button: {
                text: "Select",
            },
            multiple: false,
        });
        file_frame.on("select", function(){
            attachment = file_frame.state().get("selection").first().toJSON();
            console.log(attachment);
            jQuery("#okapi-wasb-icon-id").data("id", attachment.id);
            jQuery("#okapi-wasb-icon-preview").attr("src", attachment.url);
        });
        file_frame.open();
    });
});

jQuery(document).on("click", "#okapi-wasb-save-settings", function(){
    jQuery(".okapi-wasb-error").html("");
    var status = true;
    var activate = jQuery("#okapi-wasb-activate").val().trim();
     var position = jQuery("#okapi-wasb-position").val().trim();
    var number = jQuery("#okapi-wasb-number").val().trim();
    var width = jQuery("#okapi-wasb-width").val().trim();
    var height = jQuery("#okapi-wasb-height").val().trim();
    var margin = jQuery("#okapi-wasb-margin").val().trim();
    var marginb = jQuery("#okapi-wasb-marginb").val().trim();
    var icon_type = jQuery("#okapi-wasb-icon-type").val().trim();
    var icon_id = jQuery("#okapi-wasb-icon-id").data("id");
    if(number == ""){
        jQuery("#okapi-wasb-number").next(".okapi-wasb-error").html("Please enter valid WhatsApp number.");
        status = false;
    }
    if(width == ""){
        jQuery("#okapi-wasb-width").next(".okapi-wasb-error").html("Please enter icon width in pixel.");
        status = false;
    }
    if(height == ""){
        jQuery("#okapi-wasb-height").next(".okapi-wasb-error").html("Please enter icon height in pixel.");
        status = false;
    }
    if(margin == ""){
        jQuery("#okapi-wasb-margin").next(".okapi-wasb-error").html("Please enter icon margin in pixel.");
        status = false;
    }
    if(marginb == ""){
        jQuery("#okapi-wasb-marginb").next(".okapi-wasb-error").html("Please enter icon margin in pixel.");
        status = false;
    }
    if(icon_type == 2 && icon_id == 0){
        jQuery("#okapi-wasb-icon-id").next(".okapi-wasb-error").html("Please select icon image.");
        status = false;
    }
    if(status == true){
        jQuery("#okapi-wasb-save-settings").html('Saving...');
        jQuery.ajax({
            type: "POST",
            url: "<?php echo get_admin_url(); ?>admin-ajax.php",
            data: {
                action: "okapi_wasb_save_settings",
                activate: activate,
                position: position,
                number: number,
                width: width,
                height: height,
                margin: margin,
                marginb: marginb,
                icon_type: icon_type,
                icon_id: icon_id,
            },
            success: function(res){
                jQuery("#okapi-wasb-save-settings").html('Save Changes');
                alert("Saved Successfully.");
            }
        }); 
    }
});
</script>