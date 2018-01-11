<?php 
    $theme_color = osc_get_preference('theme-color', 'frclassifieds');
    $scroll_top_activate = osc_get_preference('scroll-top-activate', 'frclassifieds'); 
    $smooth_scroll_activate = osc_get_preference('smooth-scroll-activate', 'frclassifieds');
    $scrollTop_onLoad_activate   = osc_get_preference('scrollTop-On-Page-load-activate', 'frclassifieds');
    $load_content_on_scroll_activate = osc_get_preference('load-content-on-scroll-activate', 'frclassifieds'); 
?>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="layout_settings" />
    <div class="col-xs-12">
        <div class="clear underline sticky head-bk">
           <h1 class=" pull-left"><?php _e('Layout Settings', 'frclassifieds'); ?></h1>
            <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
        </div>
        <div class="margin-thin"></div>
        <h3><?php _e('Skin Color:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-3 label">
                <div class="label-item">
                   <?php _e('Choose Skin:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Choose a predefined skin color.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-9">
                <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="default" name="theme-color" <?php if($theme_color!='' && $theme_color == 'default'){ echo osc_esc_html('checked="checked"'); }?> />
                              <span><?php _e('Default', 'frclassifieds')?></span>
                         </div>
                     </div>
                     <div class="col-md-9">
                         <div style="width:100%; height:50px; background-color:#f0776c;">
                             
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="green" name="theme-color" <?php if($theme_color!='' && $theme_color == 'green'){ echo osc_esc_html('checked="checked"'); }?> />
                         </div>
                     </div>
                     <div class="col-md-9">
                         <div style="width:100%; height:50px; background-color:#c4e17f;">
                             
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="brown" name="theme-color" <?php if($theme_color!='' && $theme_color == 'brown'){ echo osc_esc_html('checked="checked"'); }?> />
                          </div>
                     </div>
                     <div class="col-md-9">
                         <div style="width:100%; height:50px; background-color:#fecf71;">
                             
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="purple" name="theme-color" <?php if($theme_color!='' && $theme_color == 'purple'){ echo osc_esc_html('checked="checked"'); }?> />
                          </div>
                     </div>
                     <div class="col-md-9">
                         <div style="width:100%; height:50px; background-color:#db9dbe;">
                             
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="blue" name="theme-color" <?php if($theme_color!='' && $theme_color == 'blue'){ echo osc_esc_html('checked="checked"'); }?> />
                          </div>
                     </div>
                     <div class="col-md-9">
                         <div style="width:100%; height:50px; background-color:#62c2e4;">
                             
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="nice" name="theme-color" <?php if($theme_color!='' && $theme_color == 'nice'){ echo osc_esc_html('checked="checked"'); }?> />
                          </div>
                     </div>
                     <div class="col-md-9">
                         <div style="width:100%; height:50px; background-color:#3fbda5;">
                             
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="margin-thin"></div>
                         <div class="checkbox-item text-right">
                              <input type="radio" value="custom" name="theme-color" <?php if($theme_color!='' && $theme_color == 'custom'){ echo osc_esc_html('checked="checked"'); }?> />
                          </div>
                     </div>
                     <div class="col-md-9">
                         <input type="text"  name="theme-color-custom" placeholder="i.e #ededed" value="<?php echo osc_esc_html( osc_get_preference('theme-color-custom', 'frclassifieds') ); ?>" style="height:50px !important; width:100%;" />
                     </div>
                 </div>

            </div>
        </div>
        <div class="margin-thin"></div>
        <h3 class="underline"><?php _e('Page Scroll:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-3 label">
                <div class="label-item">
                   <?php _e('Scroll Options:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Make Your Site easy and fun to scroll.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-6 padding-none">
              <div class="row">
                   <div class="col-md-12">
                       <div class="checkbox-item">
                           <input type="checkbox" value="activated" name="scrollTop-On-Page-load-activate" <?php if($scrollTop_onLoad_activate!='' && $scrollTop_onLoad_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                           <span>Enable Scroll To Top On Page Load/Refresh,<br><small>This option automatically scroll the current page to top on page refresh.</small></span>
                       </div>
                   </div>
               </div>
               <div class="margin-thin"></div>
               <div class="row">
                   <div class="col-md-12">
                       <div class="checkbox-item">
                           <input type="checkbox" value="activated" name="smooth-scroll-activate" <?php if($smooth_scroll_activate!='' && $smooth_scroll_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                           <span>Enable Smooth Scroll,<br><small>This option enables a smoother page scroll.</small></span>
                       </div>
                   </div>
               </div>
               <div class="margin-thin"></div>
               <div class="row">
                   <div class="col-md-12">
                       <div class="checkbox-item">
                           <input type="checkbox" value="activated" name="scroll-top-activate" <?php if($scroll_top_activate!='' && $scroll_top_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                           <span>Show Scroll ToTop Button,<br><small>This option display a scroll to top button.</small></span>
                       </div>
                   </div>
               </div>
               <div class="margin-thin"></div>
               <!--<div class="row">
                   <div class="col-md-4">
                       <div class="checkbox-item">
                           <input type="checkbox" value="activated" name="load-content-on-scroll-activate" <?php //if($load_content_on_scroll_activate!='' && $load_content_on_scroll_activate == 'activated'){ echo osc_esc_html('checked="checked"'); }?>>
                           <span>Enables scroll animations,<br><small>This option enables <a href="http://daneden.github.io/animate.css/">animate.css</a> animation on page scroll.</small></span>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-controls">
                            <span>Animate it.</span>
                            <select name="css-animations">
                                 <option selected="selected"><?php //echo osc_esc_html( osc_get_preference('css-animations', 'frclassifieds') ); ?></option>
                                <optgroup label="Attention Seekers">
                                  <option value="rubberBand">rubberBand</option>
                                  <option value="shake">shake</option>
                                  <option value="swing">swing</option>
                                  <option value="tada">tada</option>
                                  <option value="wobble">wobble</option>
                                  <option value="jello">jello</option>
                                  </optgroup>
                                  <optgroup label="Bouncing Entrances">
                                  <option value="bounceIn">bounceIn</option>
                                  <option value="bounceInLeft">bounceInLeft</option>
                                  <option value="bounceInRight">bounceInRight</option>
                                  </optgroup>
                                  <optgroup label="Fading Entrances">
                                  <option value="fadeIn">fadeIn</option>
                                  <option value="fadeInLeft">fadeInLeft</option>
                                  <option value="fadeInLeftBig">fadeInLeftBig</option>
                                  <option value="fadeInRight">fadeInRight</option>
                                  <option value="fadeInRightBig">fadeInRightBig</option>
                                  <option value="fadeInUp">fadeInUp</option>
                                  <option value="fadeInUpBig">fadeInUpBig</option>
                                  </optgroup>
                                  <optgroup label="Flippers">
                                  <option value="flip">flip</option>
                                  <option value="flipInX">flipInX</option>
                                  <option value="flipInY">flipInY</option>
                                  </optgroup>
                                  <optgroup label="Lightspeed">
                                  <option value="lightSpeedIn">lightSpeedIn</option>
                                  </optgroup>
                                  <optgroup label="Rotating Entrances">
                                  <option value="rotateIn">rotateIn</option>
                                  <option value="rotateInUpLeft">rotateInUpLeft</option>
                                  <option value="rotateInUpRight">rotateInUpRight</option>
                                  </optgroup>
                                  <optgroup label="Sliding Entrances">
                                  <option value="slideInUp">slideInUp</option>
                                  <option value="slideInLeft">slideInLeft</option>
                                  <option value="slideInRight">slideInRight</option>
                                  </optgroup>
                                  <optgroup label="Zoom Entrances">
                                  <option value="zoomIn">zoomIn</option>
                                  <option value="zoomInLeft">zoomInLeft</option>
                                  <option value="zoomInRight">zoomInRight</option>
                                  <option value="zoomInUp">zoomInUp</option>
                                  </optgroup>
                                  <optgroup label="Specials">
                                  <option value="rollIn">rollIn</option>
                                  </optgroup>
                            </select><br>
                            <span><small>Check out <a href="http://daneden.github.io/animate.css/">animate.css</a>.</small></span>
                        </div>
                   </div>
               </div>-->
            </div>
        </div>
        <div class="margin-thin"></div>
        <h3 class="underline"><?php _e('Custom CSS:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-3 label">
                <div class="label-item">
                   <?php _e('Custom Style:', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter your Custom css style here.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-9">
               <div class="form-controls">
                  <textarea name="custom-css-style" rows="8" placeholder="/**Custom Style*/"><?php echo osc_esc_html( osc_get_preference('custom-css-style', 'frclassifieds') ); ?></textarea>
               </div>
            </div>
        </div>
    </div>
</form>

                    