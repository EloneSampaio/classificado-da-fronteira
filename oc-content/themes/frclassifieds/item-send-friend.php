<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    frclassifieds_add_body_class('contact');
    osc_current_web_theme_path('header.php');
    osc_current_web_theme_path('inc/message.php') ;
?>
<section class="container">
    <div class="form-container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-header">
                    <h1><?php _e('Send to a friend', 'frclassifieds'); ?></h1>
                    <hr class="header-line">
                </div>
            </div>
        </div>
        <div class="user-forms">
                <div class="row">
                    <div class="resp-wrapper">
                    <ul id="error_list"></ul>
                    <form name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post" >
                        <input type="hidden" name="action" value="send_friend_post" />
                        <input type="hidden" name="page" value="item" />
                        <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                        <?php if(osc_is_web_user_logged_in()) { ?>
                                        <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                        <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
                        <?php } else { ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="yourName"><?php _e('Your name', 'frclassifieds'); ?></label>
                                <div class="form-control border-radious-none input-lg">
                                    <?php SendFriendForm::your_name(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="yourEmail"><?php _e('Your email address', 'frclassifieds'); ?></label>
                                <div class="form-control border-radious-none input-lg">
                                    <?php SendFriendForm::your_email(); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="friendName"><?php _e("Your friend's name", 'frclassifieds'); ?></label>
                                <div class="form-control border-radious-none input-lg">
                                    <?php SendFriendForm::friend_name(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="friendEmail"><?php _e("Your friend's e-mail address", 'frclassifieds'); ?></label>
                                <div class="form-control border-radious-none input-lg">
                                    <?php SendFriendForm::friend_email(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="subject"><?php _e('Subject (optional)', 'frclassifieds'); ?></label>
                                <div class="form-control border-radious-none input-lg">
                                    <?php ContactForm::the_subject(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="message"><?php _e('Message', 'frclassifieds'); ?></label>
                                <div class="form-control textarea border-radious-none input-lg">
                                     <?php SendFriendForm::your_message(); ?>
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
                    <?php SendFriendForm::js_validation(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php'); ?>