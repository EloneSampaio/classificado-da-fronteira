<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('login');
    osc_current_web_theme_path('header.php');
    osc_current_web_theme_path('inc/message.php') ;
?>
<div class="container">
   <div class="col-md-10 col-md-offset-1">
     <?php osc_show_flash_message(); ?>
   </div>
</div>
<div class="container">
  <div class="user-forms">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h1><?php _e('Login', 'frclassifieds') ?></h1>
                        <hr class="header-line">
                    </div>
                </div>
            </div>
            <form action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="login" />
                <input type="hidden" name="action" value="login_post" />
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="email"><?php _e('Email', 'frclassifieds'); ?></label>
                            <div class="form-control border-radious-none input-lg">
                                <?php UserForm::email_login_text(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="password"><?php _e('Password', 'frclassifieds'); ?></label>
                            <div class="form-control border-radious-none input-lg">
                                <?php UserForm::password_login_text(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="btn btn-outlined btn-theme btn-xs">
                                <?php UserForm::rememberme_login_checkbox();?> <label for="remember" class="text-capitalize" style="cursor:pointer;"><?php _e('Remember me', 'frclassifieds'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group" >
                            <button class="btn btn-outlined btn-theme btn-xl" type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Log in", 'frclassifieds');?></button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <?php if(osc_user_registration_enabled()) { ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <a class="btn btn-outlined btn-xl btn-theme" href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'frclassifieds'); ?></a>
                    </div>
                </div>
                <div class="col-sm-6">
                     <div class="form-group">
                        <a class="btn btn-outlined btn-xl btn-theme" href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'frclassifieds'); ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
  </div>
</div>
<div class="margin-wide"></div>
<?php osc_current_web_theme_path('footer.php') ; ?>