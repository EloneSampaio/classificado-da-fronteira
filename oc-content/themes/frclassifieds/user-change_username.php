<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    osc_enqueue_script('jquery-validate');

    frclassifieds_add_body_class('user user-profile');
    osc_add_hook('before-main','sidebar');

    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Change username', 'frclassifieds');;
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
    osc_current_web_theme_path('inc/message.php') ;
?>
<script type="text/javascript">
$(document).ready(function() {
    $('form#change-username').validate({
        rules: {
            s_username: {
                required: true
            }
        },
        messages: {
            s_username: {
                required: '<?php echo osc_esc_js(__("Username: this field is required", "frclassifieds")); ?>.'
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

    var cInterval;
    $("#s_username").keydown(function(event) {
        if($("#s_username").attr("value")!='') {
            clearInterval(cInterval);
            cInterval = setInterval(function(){
                $.getJSON(
                    "<?php echo osc_base_url(true); ?>?page=ajax&action=check_username_availability",
                    {"s_username": $("#s_username").attr("value")},
                    function(data){
                        clearInterval(cInterval);
                        if(data.exists==0) {
                            $("#available").text('<?php echo osc_esc_js(__("The username is available", "frclassifieds")); ?>');
                        } else {
                            $("#available").text('<?php echo osc_esc_js(__("The username is NOT available", "frclassifieds")); ?>');
                        }
                    }
                );
            }, 1000);
        }
    });

});
</script>
<section class="container-fluid dashboard">
    <div class="row">
      <!-- Nav tabs -->
      <?php osc_current_web_theme_path('user-account-nav.php') ; ?>

      <!-- Tab panes -->
      <div class="col-sm-8">
            <div class="col-xs-12 text-left">
                <h1><?php _e('Change Username', 'frclassifieds'); ?></h1>
                <hr class="straight-line">
            </div><!-- /.col-lg-12 -->

            <div class="col-xs-12">
                <div class="margin-wide"></div>
                <div class="user-forms form-horizontal">
                    <div class="resp-wrapper">
                        <ul id="error_list"></ul>
                        <form action="<?php echo osc_base_url(true); ?>" method="post" id="change-username">
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="action" value="change_username_post" />
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                     <div class="form-group">
                                         <label class="form-label" for="s_username"><?php _e('Username', 'frclassifieds'); ?>*</label>
                                         <div class="form-control border-radious-none">
                                            <input type="text" name="s_username" id="s_username" value="" />
                                            <div id="available"></div>
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