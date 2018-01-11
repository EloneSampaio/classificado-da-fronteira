<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('user user-profile');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Change password', 'frclassifieds');;
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
    osc_current_web_theme_path('inc/message.php') ;
?>
<section class="container-fluid dashboard">
    <div class="row">
      <!-- Nav tabs -->
      <?php osc_current_web_theme_path('user-account-nav.php') ; ?>

      <!-- Tab panes -->
      <div class="col-sm-8">
            <div class="col-xs-12 text-left">
                <h1><?php _e('Change password', 'frclassifieds'); ?></h1>
                <hr class="straight-line">
            </div><!-- /.col-lg-12 -->
            <div class="col-xs-12">
                <div class="margin-wide"></div>
                <div class="user-forms form-horizontal">
                    <div class="resp-wrapper">
                        <ul id="error_list"></ul>
                        <form action="<?php echo osc_base_url(true); ?>" method="post">
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="action" value="change_password_post" />
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                     <div class="form-group">
                                         <label class="form-label" for="password"><?php _e('Current password', 'frclassifieds'); ?> *</label>
                                         <div class="form-control border-radious-none">
                                            <input type="password" name="password" id="password" value="" autocomplete="off" />
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                     <div class="form-group">
                                         <label class="form-label" for="new_password"><?php _e('New password', 'frclassifieds'); ?> *</label>
                                         <div class="form-control border-radious-none">
                                            <input type="password" name="new_password" id="new_password" value="" autocomplete="off" />
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                     <div class="form-group">
                                         <label class="form-label" for="new_password2"><?php _e('Repeat new password', 'frclassifieds'); ?> *</label>
                                         <div class="form-control border-radious-none">
                                            <input type="password" name="new_password2" id="new_password2" value="" autocomplete="off" />
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-theme btn-block btn-outlined"><?php _e("Update", 'frclassifieds');?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</section>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>