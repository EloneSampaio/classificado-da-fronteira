<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php
/**
 * Domain Path: /i18n/languages/
 *
 * @package frclassifides
 * @category Core
 * @author pixadrop
 */
?>
<?php include_once('inc/admin-header.php'); ?> 
<div class="wrap">
    <div class="row">
        <div class="head">
            <h1><?php _e('Theme Options', 'frclassifieds')?></h1>
        </div>
        <div class="tabs">
            <div class="col-md-3 padding-none nav-tab">
                <ul class="nav-tab-wrapper">
                    <li><a class="nav-tab active" href="#tab1"><?php _e('Global Settings', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab2"><?php _e('Logo & Favicon', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab3"><?php _e('Background Images', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab4"><?php _e('Layout Options', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab5"><?php _e('Category Options', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab6"><?php _e('Notifications', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab7"><?php _e('Ads Management', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab8"><?php _e('Payment Options', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab9"><?php _e('Advanced Settings', 'frclassifieds'); ?></a></li>
                    <li><a class="nav-tab " href="#tab10"><?php _e('Documentation', 'frclassifieds'); ?></a></li>
                </ul>
            </div>
            <div class="col-md-9 padding-none">
                <div class="tab-content">
                    <div id="tab1" class="tab active">
                        <?php include_once('inc/global-settings.php'); ?>
                    </div>
                    <div id="tab2" class="tab">
                        <?php include_once('inc/logo-settings.php'); ?>
                    </div>
                    <div id="tab3" class="tab">
                        <?php include_once('inc/background-settings.php'); ?>
                    </div>
                    <div id="tab4" class="tab">
                        <?php include_once('inc/layout-settings.php'); ?>
                    </div>
                    <div id="tab5" class="tab">
                        <?php include_once('inc/category-settings.php'); ?>
                    </div>
                    <div id="tab6" class="tab">
                        <?php include_once('inc/notification-settings.php'); ?> 
                    </div>
                    <div id="tab7" class="tab">
                         <?php include_once('inc/ads-settings.php'); ?>
                    </div>
                    <div id="tab8" class="tab">
                         <?php include_once('inc/payment-settings.php'); ?>
                    </div>
                    <div id="tab9" class="tab">
                        <?php include_once('inc/advanced-settings.php'); ?>
                    </div>
                    <div id="tab10" class="tab">
                        <?php include_once('inc/documentation.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--enqueue stikyfill js plugin-->
    <script src="<?php echo osc_current_web_theme_js_url('vendor/stickyfill.min.js') ; ?>"></script>
    <script type="text/javascript">
      (function($){
          $(document).ready(function(){
            $('.sticky').Stickyfill();//initialize stickscroll
            $('.nav-tab').Stickyfill();//initialize stickscroll
            $('.head').Stickyfill();//initialize stickscroll
          });
      })(jQuery);
    </script>
    <script type="text/javascript">
       //hide btn
        $('.ico-close').on('click', function(e){
            $(this).parents('#message').hide();
        });
        //remove item
        $('.remove-item').on('click', function(e){
         e.preventDefault();

         var remove = $(this).parents('.generate-preview').find("img");
         var button = $(this);
         var triggerHolder = $(this).parents('.generate-preview').find(".file-input span");
         var item = remove.attr( "alt" );
         var action = 'remove';

         var dataString = '&item=' + item + '&action_specific=' + action;

         var url ="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php');?>"

         //alert (dataString);
         $.ajax({ 
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                  $('#message').removeClass("hidden");
                  remove.hide();
                  button.hide();
                  triggerHolder.text('Upload');
                  $('#message').append('<span class="flashmessage flashmessage-ok" style="display:block;" aria-hidden="true">Item was successfully removed.</span>');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  $('#message').removeClass("hidden");
                  $('#message').append('<span class="flashmessage flashmessage-error" style="display:block;" aria-hidden="true">Failed to remove Item.....Try again later.</span>');
                }
         });
         
      });
    </script>
    <div class="row">
        <div class="col-xs-12 padding-none">
            <?php include_once('inc/admin-footer.php'); ?>
        </div>
    </div>
    
</div>