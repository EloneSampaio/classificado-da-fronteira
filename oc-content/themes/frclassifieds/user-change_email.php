<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    frclassifieds_add_body_class('user user-profile');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Change e-mail', 'frclassifieds');;
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
                <h1><?php _e('Change e-mail', 'frclassifieds'); ?></h1>
                <hr class="straight-line">
            </div><!-- /.col-lg-12 -->
            <div class="col-xs-12">
                <div class="user-forms form-horizontal">
                   <div class="margin-wide"></div>
                   <div class="resp-wrapper">
                        <ul id="error_list"></ul>
                        <form id="change-email" action="<?php echo osc_base_url(true); ?>" method="post">
                             <input type="hidden" name="page" value="user" />
                             <input type="hidden" name="action" value="change_email_post" />
                             <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                     <div class="form-group">
                                         <label class="form-label" for="email"><?php _e('Current e-mail', 'frclassifieds'); ?>*</label>
                                         <div><?php echo osc_logged_user_email(); ?></div>
                                        <div id="available"></div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                     <div class="form-group">
                                         <label class="form-label" for="new_email"><?php _e('New e-mail', 'frclassifieds'); ?> *</label>
                                         <div class="form-control border-radious-none">
                                            <input type="text" name="new_email" id="new_email" value="" />
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
            </div><!-- /.row -->
      </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('form#change-email').validate({
            rules: {
                new_email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                new_email: {
                    required: '<?php echo osc_esc_js(__("Email: this field is required", "frclassifieds")); ?>.',
                    email: '<?php echo osc_esc_js(__("Invalid email address", "frclassifieds")); ?>.'
                }
            },
            errorLabelContainer: "#error_list",
            wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>