<?php 
$help_line_hide = osc_get_preference('hide-help-line', 'frclassifieds');
$hide_contact_link = osc_get_preference('hide-contact-link', 'frclassifieds');
$hide_copyright_info = osc_get_preference('hide-copyright-info', 'frclassifieds');
$location_widget_activated = osc_get_preference('show-locations', 'frclassifieds');
$terms_link_activate = osc_get_preference('terms-link-activate', 'frclassifieds');
//popular ads section
$num_popular_ads = popular_num_ads();
$num_premium_ads = premium_num_ads();
$num_related_ads = related_num_ads();
?>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="global-settings" />
    <div class="col-xs-12">
        <div class="clear underline sticky head-bk">
           <h1 class=" pull-left"><?php _e('Global Settings', 'frclassifieds'); ?></h1>
            <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
        </div>
        <div class="marhin-wide"></div>
        <h3 class="underline"><?php _e('Search Settings:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Keyword placeholder:', 'frclassifieds')?>
                </div>
                <small><?php _e('Keyword seach input placeholder.<br/>', 'frclassifieds')?></small>
                <small><?php _e('ie. PHP Programmer.', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls"><input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'frclassifieds') ); ?>"></div>
            </div>
        </div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Price Range:', 'frclassifieds')?>
                </div>
                <small><?php _e('Enter your preferred price range.<br/>', 'frclassifieds')?></small>
                <small><?php _e('i.e 0 & 10000.', 'frclassifieds')?></small>
            </div>
            <div class="col-md-4">
                  <div class="form-controls"><input type="text" class="xlarge" name="max_price" value="<?php echo osc_esc_html( osc_get_preference('max_price', 'frclassifieds') ); ?>" placeholder="maximum price"></div>
            </div>
            <div class="col-md-4">
                   <div class="form-controls"><input type="text" class="xlarge" name="min_price" value="<?php echo osc_esc_html( osc_get_preference('min_price', 'frclassifieds') ); ?>" placeholder="minimum price"></div>
            </div>
        </div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Price Range Step:', 'frclassifieds')?>
                </div>
                <small><?php _e('Enter your preferred step difference.<br/>', 'frclassifieds')?></small>
                <small><?php _e('i.e 5000.', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                  <div class="form-controls"><input type="text" class="xlarge" name="step_range" value="<?php echo osc_esc_html( osc_get_preference('step_range', 'frclassifieds') ); ?>" placeholder="Step Range"></div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Location:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Show location input as:', 'frclassifieds'); ?>
                </div>
            </div>
            <div class="col-md-8">
               <div class="checkbox-item">
                   <div class="form-controls">
                        <select name="defaultLocationShowAs">
                            <option value="dropdown" <?php if(frc_default_location_show_as() == 'dropdown'){ echo 'selected="selected"' ; } ?>><?php _e('Dropdown','frclassifieds'); ?></option>
                            <option value="autocomplete" <?php if(frc_default_location_show_as() == 'autocomplete'){ echo 'selected="selected"' ; } ?>><?php _e('Autocomplete','frclassifieds'); ?></option>
                        </select>
                   </div>
               </div>
            </div>
        </div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Show locations:', 'frclassifieds'); ?>
                </div>
            </div>
            <div class="col-md-8">
               <div class="margin-thin"></div>
               <div class="checkbox-item">
                   <input type="checkbox" value="activated" name="show-locations" <?php if($location_widget_activated!='' && $location_widget_activated == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                   <span>Show location Widget.</span>
               </div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Premium Listings:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Number of premium lisitngs to show:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter the number of premium listings you want users to see.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
               <div class="checkbox-item">
                   <div class="form-controls">
                     <input type="number" class="xlarge" min="1" name="premium_number" value="<?php echo $num_premium_ads ?>">
                   </div>
                   <span>Default is ten.</span>
               </div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Popular Listings:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Number of Popular lisitngs to show:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter the number of Popular listings you want users to see.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
               <div class="checkbox-item">
                   <div class="form-controls">
                     <input type="number" name="num-popular-ads" min="1" value="<?php echo $num_popular_ads; ?>" />
                   </div>
                   <span>Default is ten.</span>
               </div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Related Listings:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Number of Related lisitngs to show:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter the number of Related listings you want users to see.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
               <div class="checkbox-item">
                   <div class="form-controls">
                     <input type="number" name="num-related-ads" min="1" value="<?php echo $num_related_ads; ?>" />
                   </div>
                   <span>Default is ten.</span>
               </div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Customer care:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Telephone number:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Customer care Telephone number:.<br/>', 'frclassifieds')?></small>
                <small><?php _e('ie. +(22)2-22222-222 .', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls"><input type="text" name="help-line" value="<?php echo osc_get_preference('help-line', 'frclassifieds'); ?>" <?php echo (osc_get_preference('help-line', 'frclassifieds')); ?> ></div>
                   <div class="margin-thin"></div>
                   <div class="checkbox-item">
                       <input type="checkbox" value="hide" name="hide-help-line" <?php if($help_line_hide!='' && $help_line_hide == 'hide'){ echo osc_esc_html('checked="checked"'); }?>>
                       <span>Do not show Telephone number.</span>
                   </div>
            </div>
        </div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Contact Page Link:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Hide header Contact page link.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="checkbox-item">
                       <input type="checkbox" value="hide" name="hide-contact-link" <?php if($hide_contact_link!='' && $hide_contact_link == 'hide'){ echo osc_esc_html('checked="checked"'); }?>>
                       <span>Do not show Contact Cotnact Page link.</span>
                   </div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Terms and Condition Link:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Terms & Conditions:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('A link to your terms and contion page.<br/>', 'frclassifieds')?></small>
                <small><?php _e('ie. http://example.com/index.php?page=terms .', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls"><input type="text" name="terms-link" value="<?php echo osc_get_preference('terms-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('terms-link', 'frclassifieds')); ?> ></div>
                   <div class="margin-thin"></div>
                   <div class="checkbox-item">
                       <input type="checkbox" value="activate" name="terms-link-activate" <?php if($terms_link_activate!='' && $terms_link_activate == 'activate'){ echo osc_esc_html('checked="checked"'); }?>>
                       <span>Show Terms & Condition Links.</span>
                   </div>
            </div>
        </div>
        <h3 class="underline"><?php _e('Footer:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Copyright:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Your Copyright Information.<br/>', 'frclassifieds')?></small>
                <small><?php _e('ie. 2016 © All Rights Reserved .', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls"><input type="text" name="copyright-info" value="<?php echo osc_get_preference('copyright-info', 'frclassifieds'); ?>" <?php echo (osc_get_preference('copyright-info', 'frclassifieds')); ?> ></div>
                   <div class="margin-thin"></div>
                   <div class="checkbox-item">
                       <input type="checkbox" value="hide" name="hide-copyright-info" <?php if($hide_copyright_info!='' && $hide_copyright_info == 'hide'){ echo osc_esc_html('checked="checked"'); }?>>
                       <span>Do not show copyright information.</span>
                   </div>
            </div>
        </div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Copyright Link Text:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Your Copyright Link Text.<br/>', 'frclassifieds')?></small>
                <small><?php _e('ie. FRCLASSIFIEDS .', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls"><input type="text" name="copyright-link-text" value="<?php echo osc_get_preference('copyright-link-text', 'frclassifieds'); ?>" <?php echo (osc_get_preference('copyright-link-text', 'frclassifieds')); ?> ></div>
                   <div class="margin-thin"></div>
            </div>
        </div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Copyright Link:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Your Copyright Link.<br/>', 'frclassifieds')?></small>
                <small><?php _e('ie. http://pixadrop.com .', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls"><input type="text" name="copyright-link" value="<?php echo osc_get_preference('copyright-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('copyright-link', 'frclassifieds')); ?> ></div>
                   <div class="margin-thin"></div>
            </div>
        </div>
    </div>
</form>