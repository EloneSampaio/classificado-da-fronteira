<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('contact');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
    osc_current_web_theme_path('inc/message.php') ;
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="page-header">
                <h1><?php _e('Contact us', 'frclassifieds'); ?></h1>
                <hr class="header-line">
            </div>
        </div>
    </div>
    <div class="user-forms">
    <div class="resp-wrapper">
        <ul id="error_list"></ul>
        <form name="contact_form" action="<?php echo osc_base_url(true); ?>" method="post" >
            <input type="hidden" name="page" value="contact" />
            <input type="hidden" name="action" value="contact_post" />
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="yourName"><?php _e('Your name', 'frclassifieds'); ?>(<?php _e('optional', 'frclassifieds'); ?>)</label>
                    <div class="form-control border-radious-none input-lg">
                        <?php ContactForm::your_name(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="subject"><?php _e('Subject', 'frclassifieds'); ?>(<?php _e('optional', 'frclassifieds'); ?>)</label>
                    <div class="form-control border-radious-none input-lg">
                        <?php ContactForm::the_subject(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="form-label" for="yourEmail"><?php _e('Your email address', 'frclassifieds'); ?></label>
                    <div class="form-control border-radious-none input-lg">
                        <?php ContactForm::your_email(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="form-label" for="message"><?php _e('Message', 'frclassifieds'); ?></label>
                    <div class="form-control textarea border-radious-none input-lg">
                         <?php ContactForm::your_message(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?php osc_run_hook('contact_form'); ?>
                    <?php osc_show_recaptcha(); ?>
                    <button type="submit" class="btn btn-theme btn-xl btn-outlined"><i class="fa fa-send"></i><?php _e("Send Message", 'frclassifieds');?></button>
                    <?php osc_run_hook('admin_contact_form'); ?>
                </div>
            </div>
        </form>
        <?php ContactForm::js_validation(); ?>
    </div>
</div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>