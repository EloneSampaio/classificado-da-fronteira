<?php
  $header_notify_activate = osc_get_preference('header-notify-activate', 'frclassifieds');
  $header_notify_bg = osc_get_preference('header-notify-bg', 'frclassifieds');
  $footer_notify_activate = osc_get_preference('footer-notify-activate', 'frclassifieds');
  $footer_notify_bg = osc_get_preference('footer-notify-bg', 'frclassifieds');
  $on_load_notify_activate = osc_get_preference('on-load-notify-activate', 'frclassifieds');
  $on_load_notify_bg = osc_get_preference('on-load-notify-bg', 'frclassifieds');
  $on_exit_notify_activate = osc_get_preference('on-exit-notify-activate', 'frclassifieds');
  $on_exit_notify_bg = osc_get_preference('on-exit-notify-bg', 'frclassifieds');
  $useful_information_activate = osc_get_preference('useful-information-activate', 'frclassifieds'); 
?>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
  <input type="hidden" name="action_specific" value="notify_settings" />
  <div class="col-xs-12">
      <div class="clear underline sticky head-bk">
           <h1 class=" pull-left"><?php _e('Notification Pop-Ups Settings', 'frclassifieds'); ?></h1>
            <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
      </div>
      <div class="margin-thin"></div>
      <h3 class="underline"><?php _e('Header:', 'frclassifieds'); ?></h3>
      <div class="col-xs-12 grey-bk">
          <div class="col-md-4 label">
              <div class="label-item">
                 <?php _e('Header Notification Bar:', 'frclassifieds')?>
              </div>
              <small><?php _e('Slides from the top, on page load.', 'frclassifieds')?></small>
          </div>
          <div class="col-md-8">
                 <div class="form-controls">
                      <label for="header-notify-content"><?php _e('Content', 'frclassifieds') ?></label>
                      <textarea id="header-notify-content" name="header-notify-content" rows="5"><?php echo osc_esc_html( osc_get_preference('header-notify-content', 'frclassifieds') ); ?></textarea>
                  </div>
                  <div class="margin-thin"></div>
                 <div class="margin-thin"></div>
                 <div class="checkbox-item">
                   <input type="checkbox" value="activated" name="header-notify-activate" <?php if($header_notify_activate!='' && $header_notify_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                   <span>Activate</span>
                 </div>
                 <div class="margin-thin"></div>
                 <div><?php _e('Background color:', 'frclassifieds') ?></div>
                 <div class="margin-thin"></div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="default" name="header-notify-bg" <?php if($header_notify_bg!='' && $header_notify_bg == 'default'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Default.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="theme" name="header-notify-bg" <?php if($header_notify_bg!='' && $header_notify_bg == 'theme'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Theme.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-8 padding-none">
                      <div class="col-md-4 padding-none">
                        <div class="checkbox-item">
                            <input type="radio" value="custom" name="header-notify-bg" <?php if($header_notify_bg!='' && $header_notify_bg == 'custom'){ echo osc_esc_html('checked="checked"'); }?> />
                            <span><?php _e('Custom.', 'frclassifieds')?></span>
                        </div>
                      </div>
                      <div class="col-md-8 padding-none">
                         <div class="form-controls">
                            <input type="text"  name="header-notify-bg-custom" placeholder="i.e #ededed" value="<?php echo osc_esc_html( osc_get_preference('header-notify-bg-custom', 'frclassifieds') ); ?>" />
                         </div>
                      </div>
                 </div>
          </div>
      </div>
      <div class="margin-thin"></div>
      <h3 class="underline"><?php _e('Footer:', 'frclassifieds'); ?></h3>
      <div class="col-xs-12 grey-bk">
          <div class="col-md-4 label">
              <div class="label-item">
                 <?php _e('Footer Notification Bar:', 'frclassifieds')?>
              </div>
              <small><?php _e('Slides from bottom, on page load.', 'frclassifieds')?></small>
          </div>
          <div class="col-md-8">
                 <div class="form-controls">
                      <label for="footer-notify-content"><?php _e('Content', 'frclassifieds') ?></label>
                      <textarea id="footer-notify-content" name="footer-notify-content" rows="5"><?php echo osc_esc_html( osc_get_preference('footer-notify-content', 'frclassifieds') ); ?></textarea>
                  </div>
                  <div class="margin-thin"></div>
                 <div class="margin-thin"></div>
                 <div class="checkbox-item">
                   <input type="checkbox" value="activated" name="footer-notify-activate" <?php if($footer_notify_activate!='' && $footer_notify_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                   <span>Activate</span>
                 </div>
                 <div class="margin-thin"></div>
                 <div><?php _e('Background color:', 'frclassifieds') ?></div>
                 <div class="margin-thin"></div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="default" name="footer-notify-bg" <?php if($footer_notify_bg!='' && $footer_notify_bg == 'default'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Default.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="theme" name="footer-notify-bg" <?php if($footer_notify_bg!='' && $footer_notify_bg == 'theme'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Theme.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-8 padding-none">
                      <div class="col-md-4 padding-none">
                        <div class="checkbox-item">
                            <input type="radio" value="custom" name="footer-notify-bg" <?php if($footer_notify_bg!='' && $footer_notify_bg == 'custom'){ echo osc_esc_html('checked="checked"'); }?> />
                            <span><?php _e('Custom.', 'frclassifieds')?></span>
                        </div>
                      </div>
                      <div class="col-md-8 padding-none">
                         <div class="form-controls">
                            <input type="text"  name="footer-notify-bg-custom" placeholder="i.e #ededed" value="<?php echo osc_esc_html( osc_get_preference('footer-notify-bg-custom', 'frclassifieds') ); ?>" />
                         </div>
                      </div>
                 </div>
          </div>
      </div>
      <div class="margin-thin"></div>
      <h3 class="underline"><?php _e('On Page Load.', 'frclassifieds'); ?></h3>
      <div class="col-xs-12 grey-bk">
          <div class="col-md-4 label">
              <div class="label-item">
                 <?php _e('On Page Load Notification Pop Up:', 'frclassifieds')?>
              </div>
              <small><?php _e('Pops Up on successfully page load.', 'frclassifieds')?></small>
          </div>
          <div class="col-md-8">

                 <div class="form-controls">
                   <label for="on-load-notify-title"><?php _e('Title', 'frclassifieds') ?></label>
                   <input type="text" class="xlarge" id="on-load-notify-title" name="on-load-notify-title" value="<?php echo osc_esc_html( osc_get_preference('on-load-notify-title', 'frclassifieds') ); ?>">
                 </div>
                 <div class="margin-thin"></div>
                 <div class="form-controls">
                      <label for="on-load-notify-content"><?php _e('Content', 'frclassifieds') ?></label>
                      <textarea id="on-load-notify-content" name="on-load-notify-content" rows="10"><?php echo osc_esc_html( osc_get_preference('on-load-notify-content', 'frclassifieds') ); ?></textarea>
                  </div>
                  <div class="margin-thin"></div>
                  <div class="form-controls">
                    <label for="on-load-notify-footer"><?php _e('Footer', 'frclassifieds') ?></label>
                    <input type="text" class="xlarge" id="on-load-notify-footer" name="on-load-notify-footer" value="<?php echo osc_esc_html( osc_get_preference('on-load-notify-footer', 'frclassifieds') ); ?>">
                 </div>
                 <div class="margin-thin"></div>
                 <div class="checkbox-item">
                   <input type="checkbox" value="activated" name="on-load-notify-activate" <?php if($on_load_notify_activate!='' && $on_load_notify_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                   <span>Activate</span>
                 </div>
                 <div class="margin-thin"></div>
                 <div><?php _e('Background color:', 'frclassifieds') ?></div>
                 <div class="margin-thin"></div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="default" name="on-load-notify-bg" <?php if($on_load_notify_bg!='' && $on_load_notify_bg == 'default'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Default.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="theme" name="on-load-notify-bg" <?php if($on_load_notify_bg!='' && $on_load_notify_bg == 'theme'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Theme.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-8 padding-none">
                      <div class="col-md-4 padding-none">
                        <div class="checkbox-item">
                            <input type="radio" value="custom" name="on-load-notify-bg" <?php if($on_load_notify_bg!='' && $on_load_notify_bg == 'custom'){ echo osc_esc_html('checked="checked"'); }?> />
                            <span><?php _e('Custom.', 'frclassifieds')?></span>
                        </div>
                      </div>
                      <div class="col-md-8 padding-none">
                         <div class="form-controls">
                            <input type="text"  name="on-load-notify-bg-custom" placeholder="i.e #ededed" value="<?php echo osc_esc_html( osc_get_preference('on-load-notify-bg-custom', 'frclassifieds') ); ?>" />
                         </div>
                      </div>
                 </div>
          </div>
      </div>
      <div class="margin-thin"></div>
      <h3 class="underline"><?php _e('On Page Exit.', 'frclassifieds'); ?></h3>
      <div class="col-xs-12 grey-bk">
          <div class="col-md-4 label">
              <div class="label-item">
                 <?php _e('On Page Exit Notification Pop Up:', 'frclassifieds')?>
              </div>
              <small><?php _e('Pops Up on page exit.', 'frclassifieds')?></small>
          </div>
          <div class="col-md-8">

                 <div class="form-controls">
                   <label for="on-exit-notify-title"><?php _e('Title', 'frclassifieds') ?></label>
                   <input type="text" class="xlarge" id="on-exit-notify-title" name="on-exit-notify-title" value="<?php echo osc_esc_html( osc_get_preference('on-exit-notify-title', 'frclassifieds') ); ?>">
                 </div>
                 <div class="margin-thin"></div>
                 <div class="form-controls">
                      <label for="on-exit-notify-content"><?php _e('Content', 'frclassifieds') ?></label>
                      <textarea id="on-exit-notify-content" name="on-exit-notify-content" rows="10"><?php echo osc_esc_html( osc_get_preference('on-exit-notify-content', 'frclassifieds') ); ?></textarea>
                  </div>
                  <div class="margin-thin"></div>
                  <div class="form-controls">
                    <label for="on-exit-notify-footer"><?php _e('Footer', 'frclassifieds') ?></label>
                    <input type="text" class="xlarge" id="on-exit-notify-footer" name="on-exit-notify-footer" value="<?php echo osc_esc_html( osc_get_preference('on-exit-notify-footer', 'frclassifieds') ); ?>">
                 </div>
                 <div class="margin-thin"></div>
                 <div class="checkbox-item">
                   <input type="checkbox" value="activated" name="on-exit-notify-activate" <?php if($on_exit_notify_activate!='' && $on_exit_notify_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                   <span>Activate</span>
                 </div>
                 <div class="margin-thin"></div>
                 <div><?php _e('Background color:', 'frclassifieds') ?></div>
                 <div class="margin-thin"></div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="default" name="on-exit-notify-bg" <?php if($on_exit_notify_bg!='' && $on_exit_notify_bg == 'default'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Default.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-2 padding-none">
                      <div class="checkbox-item">
                          <input type="radio" value="theme" name="on-exit-notify-bg" <?php if($on_exit_notify_bg!='' && $on_exit_notify_bg == 'theme'){ echo osc_esc_html('checked="checked"'); }?> />
                          <span><?php _e('Theme.', 'frclassifieds')?></span>
                      </div>
                 </div>
                 <div class="col-md-8 padding-none">
                      <div class="col-md-4 padding-none">
                        <div class="checkbox-item">
                            <input type="radio" value="custom" name="on-exit-notify-bg" <?php if($on_exit_notify_bg!='' && $on_exit_notify_bg == 'custom'){ echo osc_esc_html('checked="checked"'); }?> />
                            <span><?php _e('Custom.', 'frclassifieds')?></span>
                        </div>
                      </div>
                      <div class="col-md-8 padding-none">
                         <div class="form-controls">
                            <input type="text"  name="on-exit-notify-bg-custom" placeholder="i.e #ededed" value="<?php echo osc_esc_html( osc_get_preference('on-exit-notify-bg-custom', 'frclassifieds') ); ?>" />
                         </div>
                      </div>
                 </div>
          </div>
      </div>
      <div class="margin-thin"></div>
      <h3 class="underline"><?php _e('Useful Information.', 'frclassifieds'); ?></h3>
      <div class="col-xs-12 grey-bk">
          <div class="col-md-4 label">
              <div class="label-item">
                 <?php _e('Add Useful Information :', 'frclassifieds')?>
              </div>
              <small><?php _e('Appears in the single item page.', 'frclassifieds')?></small>
          </div>
          <div class="col-md-8">
                 <div class="form-controls">
                      <textarea  name="useful-information" rows="10"><?php echo osc_esc_html( osc_get_preference('useful-information', 'frclassifieds') ); ?></textarea>
                  </div>
                 <div class="margin-thin"></div>
                 <div class="checkbox-item">
                   <input type="checkbox" value="activated" name="useful-information-activate" <?php if($useful_information_activate!='' && $useful_information_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                   <span>Activate</span>
                 </div>
          </div>
      </div>
  </div>
</form>

                    