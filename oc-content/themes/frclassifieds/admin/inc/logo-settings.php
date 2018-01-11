<?php
    $fav_prefence = osc_get_preference('favicon', 'frclassifieds');
    $logo_prefence = osc_get_preference('logo', 'frclassifieds');
    $preferences = osc_get_preference('logo-preferences','frclassifieds'); 
?>
<div class="col-xs-12">
    <?php if( is_writable( osc_uploads_path()) ) { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
            <div class="clear underline sticky head-bk">
                   <h1 class=" pull-left"><?php _e('Logo & Favicon Settings', 'frclassifieds'); ?></h1>
                    <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
            </div>
            <div class="marhin-wide"></div>
            <input type="hidden" name="action_specific" value="logo_items" />
            <h2 class="underline"><?php _e('Favicon', 'frclassifieds'); ?></h2>
            <div class="col-xs-12 grey-bk">
                <div class="col-md-3 label">
                    <div class="label-item">
                        <?php _e('Upload Favicon:', 'frclassifieds')?>
                    </div>
                    <small><?php _e('The maximum preferred size for the favicon is 16px by 16px', 'frclassifieds')?></small>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12"> 
                            <?php if($fav_prefence) { ?>
                                    <div class="generate-preview">
                                        <div class="image-preview">
                                           <img class="preview" border="0" alt="favicon" src="<?php echo favicon_url().'?'.filemtime(osc_uploads_path() . osc_get_preference('favicon','frclassifieds'));?>" />
                                        </div>
                                        <ul class="img-button clear">
                                            <li class="file-input btn-file btn btn-default clear">
                                                <span><?php echo osc_esc_html(__('Change Favicon','frclassifieds')); ?>&hellip;</span><input class="btn btn-default" type="file" id="fileUpload" name="favicon">
                                            </li>
                                            <li class="clear">
                                                <button class="btn btn-default remove-item"><?php echo osc_esc_html(__('Remove Favicon','frclassifieds')); ?>&hellip;</button>
                                            </li>
                                        </ul>
                                    </div>
                            <?php } else { ?>        
                                <div class="generate-preview">
                                    <div class="image-preview"></div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Add Favicon','frclassifieds')); ?>&hellip;</span><input type="file" id="fileUpload" name="favicon">
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12">
                            <small><?php _e("Favicon is the small image that appears on your browser when you're visiting any page.", "frclassifieds" ); ?></small>
                        </div>
                    </div>
                    <?php if($fav_prefence) { ?>
                        <div class="col-md-12">
                            <div class="flashmessage flashmessage-inline flashmessage-warning btn-block text-left"><p><?php _e('<strong>Note:</strong> Uploading another item will overwrite the current one.', 'frclassifieds'); ?></p></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="margin-thin"></div>
            <h2 class="underline"><?php _e('Logo', 'frclassifieds'); ?></h2>
            <div class="col-xs-12 grey-bk">
                <div class="col-md-3 label">
                    <div class="label-item">
                       <?php _e('Upload Logo:', 'frclassifieds')?>
                    </div>
                    <small><?php _e('The preferred size for the logo is 600px by 100px.', 'frclassifieds')?></small><br/>
                    <small><?php _e('Accepted file type png,gif,jpg.', 'frclassifieds')?></small>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12"> 
                            <?php if($logo_prefence) { ?>
                                <div class="generate-preview">
                                    <div class="image-preview">
                                        <img class="preview" border="0" alt="logo" src="<?php echo logo_url().'?'.filemtime(osc_uploads_path() . osc_get_preference('logo','frclassifieds'));?>" />
                                    </div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Change Logo','frclassifieds')); ?>&hellip;</span><input class="btn btn-default" type="file" id="fileUpload" name="logo">
                                        </li>
                                        <li class="clear">
                                            <button class="btn btn-default remove-item"><?php echo osc_esc_html(__('Remove Logo','frclassifieds')); ?>&hellip;</button>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else { ?>        
                                <div class="generate-preview">
                                    <div class="image-preview"></div>
                                    <div class="margin-thin"></div>
                                    <div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
                                        <p><?php _e('No logo has been uploaded yet', 'frclassifieds'); ?></p>
                                    </div>
                                    <ul class="img-button clear">
                                        <li class="file-input btn-file btn btn-default clear">
                                            <span><?php echo osc_esc_html(__('Add Logo','frclassifieds')); ?>&hellip;</span><input type="file" id="fileUpload" name="logo">
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="select-item label">
                                     <small><?php _e('Choose how you want your logo to display.', 'frclassifieds')?></small>
                                     <div class="margin-thin"></div>
                                     <div class="row">
                                        <div class="checkbox-item col-xs-3">
                                            <div class="col-md-3 padding-none">
                                                <input type="radio" value="logo" name="logo-preferences" <?php if($preferences!='' && $preferences == 'logo'){ echo osc_esc_html('checked="checked"'); }?> />
                                            </div>
                                            <div class="col-md-7 padding-none">
                                                <span><?php _e('logo Only.', 'frclassifieds')?></span>
                                            </div>
                                        </div>
                                        <div class="checkbox-item col-xs-3">
                                            <div class="col-md-3 padding-none">
                                                <input type="radio" value="logo-title" name="logo-preferences" <?php if($preferences!='' && $preferences == 'logo-title'){ echo osc_esc_html('checked="checked"'); }?>/>
                                            </div>
                                            <div class="col-md-7 padding-none">
                                                <span><?php _e('logo & Title.', 'frclassifieds')?></span>
                                            </div>
                                        </div>
                                        <div class="checkbox-item col-xs-3">
                                            <div class="col-md-3 padding-none">
                                                <input type="radio" value="title" name="logo-preferences" <?php if($preferences!='' && $preferences == 'title'){ echo osc_esc_html('checked="checked"'); }?>/>
                                            </div>
                                            <div class="col-md-7 padding-none">
                                                <span><?php _e('Title Only.', 'frclassifieds')?></span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>      
                            </div>
                        </div>
                        <?php if($logo_prefence) { ?>
                        <div class="col-md-12">
                            <div class="flashmessage flashmessage-inline flashmessage-warning btn-block text-left"><p><?php _e('<strong>Note:</strong> Uploading another logo will overwrite the current logo.', 'frclassifieds'); ?></p></div>
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

