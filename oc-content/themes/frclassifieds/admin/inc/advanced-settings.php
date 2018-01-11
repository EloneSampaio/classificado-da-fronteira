<?php 
  $rss_show = osc_get_preference('show-rss-link', 'frclassifieds');
  $facebook_show = osc_get_preference('show-facebook-link', 'frclassifieds');
  $twitter_show = osc_get_preference('show-twitter-link', 'frclassifieds');
  $linkedin_show = osc_get_preference('show-linkedin-link', 'frclassifieds');
  $google_plus_show = osc_get_preference('show-google-plus-link', 'frclassifieds');
  $dribble_show = osc_get_preference('show-dribble-link', 'frclassifieds');
  $pinterest_show = osc_get_preference('show-pinterest-link', 'frclassifieds');
  $stumbleupon_show = osc_get_preference('show-stumbleupon-link', 'frclassifieds');
  $youtube_show = osc_get_preference('show-youtube-link', 'frclassifieds');
  $tumblr_show = osc_get_preference('show-tumblr-link', 'frclassifieds');
  $flickr_show = osc_get_preference('show-flickr-link', 'frclassifieds');
  $share_on_facebook = osc_get_preference('share-on-facebook', 'frclassifieds');
  $share_on_twitter = osc_get_preference('share-on-twitter', 'frclassifieds');
  $share_on_google_plus = osc_get_preference('share-on-google-plus', 'frclassifieds');
  $share_on_linkedin = osc_get_preference('share-on-linkedin', 'frclassifieds');
  $share_on_pinterest = osc_get_preference('share-on-pinterest', 'frclassifieds');
  $share_on_tumblr = osc_get_preference('share-on-tumblr', 'frclassifieds');
  $share_on_stumbleupon = osc_get_preference('share-on-stumbleupon', 'frclassifieds');
  $share_on_email = osc_get_preference('share-on-email', 'frclassifieds');
  $share_with_friend = osc_get_preference('share-with-friend', 'frclassifieds');
?>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="advanced_settings" />
    <div class="col-xs-12">
        <div class="clear underline sticky head-bk">
           <h1 class=" pull-left"><?php _e('Adavanced Settings', 'frclassifieds'); ?></h1>
            <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
        </div>
        <div class="margin-thin"></div>
        <h3 class="underline"><?php _e('Social Follow:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Social media links', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter your social media links.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Facebook:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                             <div class="form-controls">
                               <input type="text" name="facebook-link" value="<?php echo osc_get_preference('facebook-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('facebook-link', 'frclassifieds')); ?> >
                             </div>
                             <div class="checkbox-item">
                               <input type="checkbox" value="show" name="show-facebook-link" <?php if($facebook_show!='' && $facebook_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                               <span>Show Facebook link.</span>
                             </div>
                             <div class="margin-thin"></div>
                      </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Twitter:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="twitter-link" value="<?php echo osc_get_preference('twitter-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('twitter-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-twitter-link" <?php if($twitter_show!='' && $twitter_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show twitter link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Linkedin:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="linkedin-link" value="<?php echo osc_get_preference('linkedin-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('linkedin-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-linkedin-link" <?php if($linkedin_show!='' && $linkedin_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show linkedin link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Google plus:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="google-plus-link" value="<?php echo osc_get_preference('google-plus-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('google-plus-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-google-plus-link" <?php if($google_plus_show!='' && $google_plus_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show goole plus link.</span>
                             <div class="margin-thin"></div>
                      </div>
                      </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Dribble:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="dribble-link" value="<?php echo osc_get_preference('dribble-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('dribble-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-dribble-link" <?php if($dribble_show!='' && $dribble_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show dribble link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Pinterest:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="pinterest-link" value="<?php echo osc_get_preference('pinterest-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('pinterest-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-pinterest-link" <?php if($pinterest_show!='' && $pinterest_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show pinterest link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Youtube:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="youtube-link" value="<?php echo osc_get_preference('youtube-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('youtube-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-youtube-link" <?php if($youtube_show!='' && $youtube_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show youtube link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Tumblr:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="tumblr-link" value="<?php echo osc_get_preference('tumblr-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('tumblr-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-tumblr-link" <?php if($tumblr_show!='' && $tumblr_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show tumblr link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('Stumbleupon:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="form-controls">
                                <input type="text" name="stumbleupon-link" value="<?php echo osc_get_preference('stumbleupon-link', 'frclassifieds'); ?>" <?php echo (osc_get_preference('stumbleupon-link', 'frclassifieds')); ?> >
                            </div>
                            <div class="checkbox-item">
                             <input type="checkbox" value="show" name="show-stumbleupon-link" <?php if($stumbleupon_show!='' && $stumbleupon_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
                             <span>Show stumbleupon link.</span>
                             <div class="margin-thin"></div>
                      </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 label">
                          <div class="label-item">
                             <?php _e('RSS feeds:', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-8">
                            <div class="checkbox-item">
    			                   <input type="checkbox" value="show" name="show-rss-link" <?php if($rss_show!='' && $rss_show == 'show'){ echo osc_esc_html('checked="checked"'); }?>>
    			                   <span>Show RSS feed link.</span>
                             <div class="margin-thin"></div>
    			            </div>
                     </div>
                  </div>
            </div>
        </div>
        <div class="margin-thin"></div>
        <h3 class="underline"><?php _e('Social Sharing:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Enable Social Media Sharing', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Select preferred social media platform to allow users to share content.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-6 padding-none">
               <div class="row">
                  <div class="col-md-4">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-facebook" <?php if($share_on_facebook!='' && $share_on_facebook == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Facebook.</span>
                       </div>
                  </div>
                  <div class="col-md-4">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-twitter" <?php if($share_on_twitter!='' && $share_on_twitter == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Twitter.</span>
                       </div>
                  </div>
                  <div class="col-md-4">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-google-plus" <?php if($share_on_google_plus!='' && $share_on_google_plus == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Google Plus.</span>
                       </div>
                  </div>
                  <div class="col-md-4">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-linkedin" <?php if($share_on_linkedin!='' && $share_on_linkedin == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>LinkedIn.</span>
                       </div>
                  </div>
                  <div class="col-md-4">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-pinterest" <?php if($share_on_pinterest!='' && $share_on_pinterest == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Pinterest.</span>
                       </div>
                  </div>
                  <div class="col-md-4">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-tumblr" <?php if($share_on_tumblr!='' && $share_on_tumblr == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Tumblr.</span>
                       </div>
                  </div>
                  <div class="col-md-5">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-stumbleupon" <?php if($share_on_stumbleupon!='' && $share_on_stumbleupon == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Stumbleupon.</span>
                       </div>
                  </div>
                  <div class="col-md-3">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-on-email" <?php if($share_on_email!='' && $share_on_email == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Email.</span>
                       </div>
                  </div>
                  <div class="col-md-3">
                       <div class="checkbox-item">
                         <input type="checkbox" value="share" name="share-with-friend" <?php if($share_with_friend!='' && $share_with_friend == 'share'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Friend.</span>
                       </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="margin-thin"></div>
        <h3 class="underline"><?php _e('Google Analytics:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Google Analytics Code', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter your google Analytics code.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
               <div class="form-controls">
                  <textarea name="google-analytics"  placeholder="code here" rows="10"><?php echo osc_esc_html( osc_get_preference('google-analytics', 'frclassifieds') ); ?> </textarea>
                  <span><small><?php _e('Tracks and report your website traffic.', 'frclassifieds') ?></small></span>
               </div>
            </div>
            <span class="col-md-12"><?php _e('Go to (<a href="http://www.google.com/analytics/">google/analytics</a>) sing up to get your site ID' , 'frclassifieds')?></span>
        </div>
    </div>
</form>

                    