<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('forgot');
    osc_current_web_theme_path('header.php');
    osc_current_web_theme_path('inc/message.php') ;
?>
<div class="form-container form-horizontal form-container-box">
    <div class="header">
        <h1><?php _e('Recover your password', 'frclassifieds'); ?></h1>
    </div>
    <div class="resp-wrapper">
        <form action="<?php echo osc_base_url(true); ?>" method="post" >
            <input type="hidden" name="page" value="login" />
            <input type="hidden" name="action" value="forgot_post" />
            <input type="hidden" name="userId" value="<?php echo osc_esc_html(Params::getParam('userId')); ?>" />
            <input type="hidden" name="code" value="<?php echo osc_esc_html(Params::getParam('code')); ?>" />
            <div class="control-group">
                <label class="control-label" for="new_password"><?php _e('New password', 'frclassifieds'); ?></label>
                <div class="controls">
                    <input type="password" name="new_password" value="" autocomplete="off" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="new_password2"><?php _e('Repeat new password', 'frclassifieds'); ?></label>
                <div class="controls">
                    <input type="password" name="new_password2" value="" autocomplete="off" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Change password", 'frclassifieds');?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>