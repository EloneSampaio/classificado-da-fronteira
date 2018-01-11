<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('user user-profile');
    osc_add_hook('before-main','sidebar');
    
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Update account', 'frclassifieds');
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
    osc_current_web_theme_path('inc/message.php') ;
    
    $locales   = __get('locales');    

?>
<section class="container-fluid dashboard">
    <div class="row">
      <!-- Nav tabs -->
      <?php osc_current_web_theme_path('user-account-nav.php') ; ?>

      <!-- Tab panes -->
      <div class="col-sm-8">
            <div class="col-xs-12 text-left">
                <h1><?php _e('Update account', 'frclassifieds'); ?></h1>
                <hr class="straight-line">
            </div><!-- /.col-lg-12 -->
            <div class="col-xs-12">
                <div class="user-forms form-horizontal">
                    <div class="resp-wrapper">
                        <ul id="error_list"></ul>
                        <form action="<?php echo osc_base_url(true); ?>" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="action" value="profile_post" />
                            <div class="row">
                               <div class="form-group">
                                  <label for="avatar" class="col-sm-3 control-label"><?php _e('Avatar', 'frclassifieds'); ?></label>
                                  <div class="col-sm-8">                                
                                      <div class="custom-input-file" style="background: #eee url('<?php echo user_avatar_url(osc_user_id()); ?>') no-repeat scroll 50% 50%;">
                                          <label class="uploadPhoto">
                                              Edit
                                              <input type="file" class="change-avatar" name="user-avatar" id="avatar" >
                                          </label>
                                      </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-sm-3" for="name"><?php _e('Name', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::name_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-sm-3" for="user_type"><?php _e('User type', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group form-select">
                                         <div class="form-control border-radious-none">
                                            <span><?php _e('Select Type', 'frclassifieds');?></span>
                                            <?php UserForm::is_company_select(osc_user()); ?> 
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="phoneMobile"><?php _e('Cell phone', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::mobile_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="phoneLand"><?php _e('Phone', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::phone_land_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="country"><?php _e('Country', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::country_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="region"><?php _e('Region', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::region_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="city"><?php _e('City', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::city_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="city_area"><?php _e('City area', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::city_area_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="address"><?php _e('Address', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::address_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="control-label col-sm-3" for="webSite"><?php _e('Website', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control border-radious-none">
                                            <?php UserForm::website_text(osc_user()); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label col-sm-3" for="s_info"><?php _e('Description', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <div class="form-control textarea border-radious-none">
                                            <?php UserForm::multilanguage_info($locales, osc_user()); ?>
                                            <?php //UserForm::info_textarea('s_info['.osc_locale_code().']', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info']); ?>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12">
                                 <h1><?php _e('Social Media', 'frclassifieds'); ?></h1>
                                 <hr class="straight-line">
                              </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-sm-3" for="address"><?php _e('Facebook', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <span>start with(http://)</span>
                                         <div class="form-control border-radious-none">
                                            <input id="s_fb_link" name="s_fb_link" type="text" value="<?php echo user_fb_link($osc_user); ?>" placeholder="Link To Your Acouunt">
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-sm-3" for="address"><?php _e('Twitter', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <span>start with(http://)</span>
                                         <div class="form-control border-radious-none">
                                            <input id="s_tw_link" name="s_tw_link" type="text" value="<?php echo user_tw_link($osc_user); ?>" placeholder="Link To Your Acouunt">
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-sm-3" for="address"><?php _e('LinkedIn', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <span>start with(http://)</span>
                                         <div class="form-control border-radious-none">
                                            <input id="s_lk_link" name="s_lk_link" type="text" value="<?php echo user_lk_link($osc_user); ?>" placeholder="Link To Your Acouunt">
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-sm-3" for="address"><?php _e('Google+', 'frclassifieds'); ?></label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                         <span>start with(http://)</span>
                                         <div class="form-control border-radious-none">
                                            <input id="s_gl_link" name="s_gl_link" type="text" value="<?php echo user_gl_link($osc_user); ?>" placeholder="Link To Your Acouunt">
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                   <?php osc_run_hook('user_profile_form', osc_user()); ?>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-5 col-sm-offset-3 clearfix">
                                    <div class="form-group btn-group">
                                         <button type="submit" class="btn btn-theme btn-outlined btn-sm"><?php _e("Update", 'frclassifieds');?></button>
                                         <button id="delete_account" class="btn btn-theme btn-outlined btn-sm" type="button"><?php _e('Delete Account', 'frclassifieds'); ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <?php osc_run_hook('user_form', osc_user()); ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.row -->
      </div>
    </div>
</section>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#delete_account").click(function(){
            $("#dialog-delete-account").dialog('open');
        });
    });
</script>
<div id="dialog-delete-account" title="<?php echo osc_esc_html(__('Delete account', 'frclassifieds')); ?>">
    <?php _e('All your listings and alerts will be removed, this action can not be undone.', 'frclassifieds'); ?>
  </div>
<?php osc_current_web_theme_path('footer.php') ; ?>