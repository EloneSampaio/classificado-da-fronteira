<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('recover');
    osc_current_web_theme_path('header.php');
    osc_current_web_theme_path('inc/message.php') ;
?>
<div class="container">
   <div class="col-md-6 col-md-offset-3">
     <?php osc_show_flash_message(); ?>
   </div>
</div>
<div class="container">
  <div class="user-forms">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h1><?php _e('Recover password', 'frclassifieds'); ?></h1>
                        <hr class="header-line">
                    </div>
                </div>
            </div>
            <form action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="login" />
                <input type="hidden" name="action" value="recover_post" />
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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <?php osc_show_recaptcha('recover_password'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group" >
                            <button class="btn btn-outlined btn-theme btn-xl" type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Recover", 'frclassifieds');?></button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
  </div>
</div>
<div class="margin-wide"></div>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>