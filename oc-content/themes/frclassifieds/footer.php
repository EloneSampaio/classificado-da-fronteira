<?php
  $enable_paypal = osc_get_preference('paypal-enable', 'frclassifieds');
  $enable_checkout = osc_get_preference('checkout-enable', 'frclassifieds');
  $enable_money_bookers = osc_get_preference('money-bookers-enable', 'frclassifieds');
  $enable_world_pay = osc_get_preference('world-pay-enable', 'frclassifieds');
  $enable_payza = osc_get_preference('payza-enable', 'frclassifieds');
  $enable_cc_avenue = osc_get_preference('cc-avenue-enable', 'frclassifieds');
  $enable_web_pay = osc_get_preference('webpay-enable', 'frclassifieds');
?>
<!-- footer -->
<div class="margin-medium"></div>
<footer id="footer">
   <!--footer categroy section-->
   <div class="footer-category-section">
      <div class="container-fluid">
         <div class="row">
           <?php osc_goto_first_category() ; ?>
              <?php while ( osc_has_categories() ) { ?>
                <div class="cat-box-wrapper col-md-3 col-sm-6">
                  <div>
                   <h4 class="frc-bdr-dotted"> <a href="<?php echo osc_search_category_url() ; ?>" class="theme-color" ><?php echo osc_category_name() ; ?></a> <span class="badge"><?php echo osc_category_total_items() ; ?></span></h4>
                     <?php if ( osc_count_subcategories() > 0 ) { ?>
                        <ul class="list-group">
                            <?php while ( osc_has_subcategories() ) { ?>
                           
                                <?php if( osc_category_total_items() > 0 ) { ?>
                                    <li class="list-group-item"><i class="fa fa-angle-double-right"></i>
                                       <a class="<?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?><span class="badge"><?php echo osc_category_total_items() ; ?></span></a>
                                    </li>
                                <?php } ?>
                           
                            <?php } ?>
                        </ul>
                  </div>
                </div>
               <?php } ?>
            <?php } ?>
         </div>
      </div>
   </div>
   <!--footer nav-->
   <div class="navbar navbar-default">
      <div class="container-fluid">
         <div class="margin-thin"></div>
         <div class="row">
          <div class="col-md-9 links">
              <ul class="list-inline">
                  <?php if(osc_user_registration_enabled()) { ?>
                      <li><a href="<?php echo osc_register_account_url() ; ?>" class="theme-color"><?php _e('Register', 'frclassifieds'); ?></a></li>
                  <?php }; ?>
                  <?php
                    osc_reset_static_pages();
                    while( osc_has_static_pages() ) { ?> 
                        <li><a href="<?php echo osc_static_page_url(); ?>" class="theme-color"><?php echo osc_static_page_title(); ?></a></li>
                    <?php
                    }
                  ?>
                </ul>
                
                <hr>
                <div class="copyright">
                         <?php 
                            $hide_copyright_info = osc_get_preference('hide-copyright-info', 'frclassifieds');
                            if($hide_copyright_info ==''){
                              echo osc_esc_html(__(osc_get_preference('copyright-info', 'frclassifieds'), 'frclassifieds'));
                              echo '&nbsp;<a title="'.osc_get_preference('copyright-link-text', 'frclassifieds').'" target="_blank" href="'.osc_get_preference('copyright-link', 'frclassifieds').'" class="theme-color">'.osc_get_preference('copyright-link-text', 'frclassifieds').'</a>';
                            }
                         ?> 
                    Powered by osclass.                                      
                </div>
                <hr>
                <span>
                <?php if($enable_paypal !='' || $enable_checkout !='' || $enable_money_bookers !='' || $enable_world_pay !='' || $enable_payza !='' || $enable_cc_avenue !='' || $enable_web_pay !=''){
                    _e("Secure Payment:", "frclassifieds");
                }?>
                </span>
                <?php if($enable_paypal !=''){
                     echo '<img border="0" height="23" title="PayPal" src="'. osc_current_web_theme_url("images/paypal.png") .'">';
                }?>
                <?php if($enable_checkout !=''){
                     echo '<img border="0" height="23" title="2Checkout" src="'.osc_current_web_theme_url("images/2co.png").'">';
                }?>
                <?php if($enable_money_bookers !=''){
                     echo '<img border="0" height="23" title="Money Bookers" src="'.osc_current_web_theme_url("images/moneybookers.png").'">';
                }?>
                <?php if($enable_world_pay !=''){
                     echo '<img border="0" height="23" title="World Pay" src="'.osc_current_web_theme_url("images/worldpay.png").'">';
                }?>

                <?php if($enable_payza !=''){
                     echo '<img border="0" height="23" title="Payza" src="'.osc_current_web_theme_url("images/payza.png").'">';
                }?>

                <?php if($enable_cc_avenue !=''){
                     echo '<img border="0" height="23" title="CC-Avenue" src="'.osc_current_web_theme_url("images/cc-avenue.png").'">';
                }?>

                <?php if($enable_web_pay !=''){
                     echo '<img border="0" height="23" title="WebPay" src="'.osc_current_web_theme_url("images/webpay.png").'">';
                }?>
            </div>
            
            <div class="col-md-3 text-center">
                    <span><i><?php _e('Always stay connected with us..', 'frclassifieds')?></i></span>
                    <div class="margin-medium"></div>
                    <?php social_media_links(); ?>
            </div>
        </div>
        <div class="margin-thin"></div>
      </div>
      <!--Scroll to top-->
      <div class="scrollToTop">
         <a href="#" >
         <i class="fa fa-angle-up"></i>
         </a>
      </div>
   </div>
   <div class="refresh-page-backdrop text center">
       <img border="0" src="<?php echo osc_current_web_theme_url('images/ajax-loader.gif') ?>">
   </div>
</footer>

<!--Social media sharing-->
<?php echo social_media_sharing(); ?>

<!-- Notification Popups -->
 <?php echo notify_footer()?>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo osc_current_web_theme_url('js/bootstrap.min.js') ; ?>"></script>
<!--jQuery OwlCarousel v1.3.3(http://www.owlgraphic.com/owlcarousel/).-->
<script src="<?php echo osc_current_web_theme_url('js/vendor/owl.carousel.min.js') ; ?>"></script>
<!--Avoid `console` errors in browsers that lack a console-->
<script src="<?php echo osc_current_web_theme_url('js/plugins.js') ; ?>"></script>
<!--includes delete-user customized javascript file-->
<script src="<?php echo osc_current_web_theme_js_url('delete_user.js') ; ?>"></script>
<!--includes your customized javascript file-->
<script src="<?php echo osc_current_web_theme_url('js/global.js') ; ?>"></script>
<?php 
  echo footer_js();
  osc_run_hook('footer');
?>
</body>
</html>
