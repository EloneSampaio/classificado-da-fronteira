<?php
    $bg_header_prefence = osc_get_preference('bg_header', 'frclassifieds');
    $bg_search_prefence = osc_get_preference('bg_search', 'frclassifieds');
    $bg_header_scroll = osc_get_preference('bg_header_scroll', 'frclassifieds');
    $bg_search_scroll = osc_get_preference('bg_search_scroll', 'frclassifieds');
    $bg_hide_header_scroll = osc_get_preference('bg_header_prefence', 'frclassifieds');
?>
<div class="col-xs-12">
    <?php if( is_writable( osc_uploads_path()) ) { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
            <div class="clear underline sticky head-bk">
               <h1 class=" pull-left"><?php _e('Background Images', 'frclassifieds'); ?></h1>
                <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
            </div>
            <div class="marhin-wide"></div>
            <input type="hidden" name="action_specific" value="bg_items" />            
            <h2 class="underline"><?php _e('Header Background Image', 'frclassifieds'); ?></h2>
            <div class="col-xs-12 grey-bk">
                <div class="col-md-3 label">
                    <div class="label-item">
                       <?php _e('Upload Image:', 'frclassifieds')?>
                    </div>
                    <small><?php _e('Accepted file type png,gif,jpg.', 'frclassifieds')?></small>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xs-12"> 
                            <?php if($bg_header_prefence) { ?>
                                <div class="generate-preview">
                                    <div class="image-preview">
                                        <img class="preview" border="0" alt="bg_header" src="<?php echo bg_image_header_url().'?'.filemtime(osc_uploads_path() . osc_get_preference('bg_header','frclassifieds'));?>" />
                                    </div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Change Image','frclassifieds')); ?>&hellip;</span><input type="file" id="fileUpload" name="bg_header" class="btn">
                                        </li>
                                        <li class="clear">
                                            <button class="btn btn-default remove-item"><?php echo osc_esc_html(__('Remove Image','frclassifieds')); ?>&hellip;</button>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else { ?>        
                                <div class="generate-preview">
                                    <div class="image-preview"></div>
                                    <div class="margin-thin"></div>
                                    <div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
                                        <p><?php _e('No Image has been uploaded yet', 'frclassifieds'); ?></p>
                                    </div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Add Image','frclassifieds')); ?>&hellip;</span><input type="file" id="fileUpload" name="bg_header">
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="select-item label">
                                     <small><?php _e('Choose how you want your lmage to apper.', 'frclassifieds')?></small>
                                     <div class="margin-thin"></div>
                                </div>
                                <div class="row">
                                    <div class="checkbox-item col-md-2">
                                        <div class="col-md-4 padding-none">
                                            <input type="radio" value="scroll" name="bg_header_scroll" <?php if($bg_header_scroll!='' && $bg_header_scroll == 'scroll'){ echo osc_esc_html('checked="checked"'); }?>>
                                        </div>
                                        <div class="col-md-8 padding-none">
                                            <span><?php _e('Scroll.', 'frclassifieds')?></span>
                                        </div>
                                    </div>
                                    <div class="checkbox-item col-md-2">
                                        <div class="col-md-4 padding-none">
                                            <input type="radio" value="fixed" name="bg_header_scroll" <?php if($bg_header_scroll!='' && $bg_header_scroll == 'fixed'){ echo osc_esc_html('checked="checked"'); }?>>
                                        </div>
                                        <div class="col-md-8 padding-none">
                                            <span><?php _e('Fixed.', 'frclassifieds')?></span>
                                        </div>
                                    </div>
                                    <div class="checkbox-item col-md-7">
                                        <div class="col-md-1 padding-none">
                                            <input type="checkbox" value="hide" name="bg_header_prefence" <?php if($bg_hide_header_scroll!='' && $bg_hide_header_scroll == 'hide'){ echo osc_esc_html('checked="checked"'); }?>>
                                        </div>
                                        <div class="col-md-11 padding-none">
                                            <span><?php _e('Do not show header Background Image.', 'frclassifieds')?></span>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <?php if($bg_header_prefence) { ?>
                        <div class="col-md-12">
                            <div class="flashmessage flashmessage-inline flashmessage-warning btn-block text-left"><p><?php _e('<strong>Note:</strong> Uploading another item will overwrite the current Item.', 'frclassifieds'); ?></p></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="margin-thin"></div>
            <h2 class="underline"><?php _e('Search Page Background Image', 'frclassifieds'); ?></h2>
            <div class="col-xs-12 grey-bk">
                <div class="col-md-3 label">
                    <div class="label-item">
                       <?php _e('Upload Image:', 'frclassifieds')?>
                    </div>
                    <small><?php _e('Accepted file type png,gif,jpg.', 'frclassifieds')?></small>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xs-12"> 
                            <?php if($bg_search_prefence) { ?>
                                <div class="generate-preview">
                                    <div class="image-preview">
                                        <img class="preview" border="0" alt="bg_search" src="<?php echo bg_image_search_url().'?'.filemtime(osc_uploads_path() . osc_get_preference('bg_search','frclassifieds'));?>" />
                                    </div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Change Image','frclassifieds')); ?>&hellip;</span><input type="file" id="fileUpload" name="bg_search">
                                        </li>
                                        <li class="clear">
                                            <button class="btn btn-default remove-item"><?php echo osc_esc_html(__('Remove Image','frclassifieds')); ?>&hellip;</button>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else { ?>        
                                <div class="generate-preview">
                                    <div class="image-preview"></div>
                                    <div class="margin-thin"></div>
                                    <div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
                                        <p><?php _e('No Image has been uploaded yet', 'frclassifieds'); ?></p>
                                    </div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Add Image','frclassifieds')); ?>&hellip;</span><input type="file" id="fileUpload" name="bg_search">
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="selct-item label">
                                     <small><?php _e('Choose how you want your lmage to apper.', 'frclassifieds')?></small>
                                     <div class="margin-thin"></div>
                                </div>
                                <div class="row">
                                    <div class="checkbox-item col-md-3">
                                        <div class="col-md-2 padding-none">
                                            <input type="radio" value="scroll" name="bg_search_scroll" <?php if($bg_search_scroll!='' && $bg_search_scroll == 'scroll'){ echo osc_esc_html('checked="checked"'); }?>>
                                        </div>
                                        <div class="col-md-7 padding-none">
                                            <span><?php _e('Scroll.', 'frclassifieds')?></span>
                                        </div>
                                    </div>
                                    <div class="checkbox-item col-md-3">
                                        <div class="col-md-2 padding-none">
                                            <input type="radio" value="fixed" name="bg_search_scroll" <?php if($bg_search_scroll!='' && $bg_search_scroll == 'fixed'){ echo osc_esc_html('checked="checked"'); }?>>
                                        </div>
                                        <div class="col-md-7 padding-none">
                                            <span><?php _e('Fixed.', 'frclassifieds')?></span>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <?php if($bg_search_prefence) { ?>
                            <div class="col-md-12">
                                <div class="flashmessage flashmessage-inline flashmessage-warning btn-block text-left"><p><?php _e('<strong>Note:</strong> Uploading another Item will overwrite the current ltem.', 'frclassifieds'); ?></p></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    <?php } else { ?>
        <div class="flashmessage flashmessage-error" style="display: block;">
            <p>
                <?php
                    $msg  = sprintf(__('The images folder <strong>%s</strong> is not writable on your server', 'frclassifieds'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                    $msg .= __("Osclass can't upload the image from the administration panel.", 'frclassifieds') . ' ';
                    $msg .= __('Please make the aforementioned image folder writable.', 'frclassifieds') . ' ';
                    echo $msg;
                ?>
            </p>
            <p>
                <?php _e('To make a directory writable under UNIX execute this command from the shell:','frclassifieds'); ?>
            </p>
            <p class="command">
                chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/"; ?>
            </p>
        </div>
    <?php } ?>
</div>
