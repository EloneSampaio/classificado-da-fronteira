<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('register');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php') ;
    osc_current_web_theme_path('inc/message.php') ;
    $terms_link = osc_get_preference('terms-link', 'frclassifieds');
    $terms_link_activate = osc_get_preference('terms-link-activate', 'frclassifieds');
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
                        <h1><?php _e('Join Now', 'frclassifieds') ?></h1>
                        <hr class="header-line">
                        <small><?php _e('It\'s free and always will be..', 'frclassifieds')?></small>
                    </div>
                </div>
            </div>
            <form action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="register" />
                <input type="hidden" name="action" value="register_post" />
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <ul id="error_list" class="alert alert-error"></ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="s_name"><?php _e('Name', 'frclassifieds'); ?></label>
                            <div class="form-control border-radious-none input-lg">
                                <?php UserForm::name_text(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="margin-thin"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="s_email"><?php _e('Email', 'frclassifieds'); ?></label>
                            <div class="form-control border-radious-none input-lg">
                                <?php UserForm::email_text(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="margin-thin"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="s_password"><?php _e('Password', 'frclassifieds'); ?></label>
                            <div class="form-control border-radious-none input-lg">
                                <?php UserForm::password_text(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="s_password2"><?php _e('Confirm Password', 'frclassifieds'); ?></label>
                            <div class="form-control border-radious-none input-lg">
                                <?php UserForm::check_password_text(); ?>
                                <p id="password-error" style="display:none;">
                                    <?php _e("Passwords don't match", 'frclassifieds'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($terms_link_activate !='' && $terms_link_activate == 'activate'){ ?>
                    <div class="margin-thin"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p>
                                By clicking
                                <strong class="label label-primary">Register</strong>
                                , you agree to the
                                <a class="theme-color p-link" href="<?php echo $terms_link; ?>">Terms and Conditions</a>
                                set out by this site, including our Cookie Use.
                            </p>
                        </div>
                    </div>
                 <?php } ?>
                <div class="row">
                    <div class="col-xs-12">
                        <?php osc_run_hook('user_register_form'); ?>
                    </div>
                </div>
                <div class="margin-thin"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php osc_show_recaptcha('register'); ?>
                    </div>
                </div>
                <div class="margin-thin"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-outlined btn-theme btn-xl" type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Create Account", 'frclassifieds');?></button>
                    </div>
                </div>
            </form>
            <div class="margin-wide"></div>
            <hr>
        </div>
    </div>
  </div>
</div>
<div class="margin-wide"></div>
<?php UserForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>