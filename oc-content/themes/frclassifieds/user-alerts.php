<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('user user-profile');
    osc_add_hook('before-main','sidebar');

    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Alerts', 'frclassifieds');;
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
           <div class="row">
                <div class="col-xs-12 text-left">
                    <h1><?php _e('Manage Alerts', 'frclassifieds'); ?></h1>
                    <hr class="straight-line">
                </div><!-- /.col-lg-12 --> 
                <div class="col-xs-12">
                    <?php if(osc_count_alerts() == 0) { ?>
                    <h3><?php _e('You do not have any alerts yet', 'frclassifieds'); ?>.</h3>
                    <?php } else { ?>
                        <?php
                        $i = 1;
                        while(osc_has_alerts()) { ?>
                            <div class="userItem" >
                                <div class="title-has-actions clearfix">
                                    <h3 class="pull-left"><?php _e('Your have '.$i.' Alerts', 'frclassifieds'); ?></h3> 
                                    <p class="see_more_link text-right pull-right margin-top">
                                       <a href="<?php echo osc_user_unsubscribe_alert_url(); ?>" class="btn btn-outlined btn-theme btn-xs" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'frclassifieds')); ?>');">
                                         <strong><?php _e('Delete this alert', 'frclassifieds'); ?><i class="fa fa-arrow-right"></i></strong>
                                       </a>
                                    </p>
                                </div>
                                <?php while ( osc_has_items() ) { ?>
                                    <div class="listed-item-wrap">
                                       <div class="listed-item clearfix">
                                          <?php if( osc_images_enabled_at_items() ) { ?>
                                               <div class="thumbnail">
                                                  <?php if( osc_count_item_resources() ) { ?>
                                                       <img class="group" src="<?php echo osc_resource_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                                     <?php } else { ?>
                                                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                                  <?php } ?>
                                          <?php } ?>
                                               </div>
                                          <span class="btn-price theme-bk-color"><?php echo osc_item_formated_price()?></span>
                                          <?php 
                                             if(osc_item_is_premium()){

                                                echo '<div class="tringle-up-right"></div><div class="tringle-up-right-back"></div><i id="item-'. osc_item_id().'-recent" class="fa fa-star premium-icon" data-toggle="tooltip" title="Premium!" ></i>
                                                <script type="text/javascript">
                                                       //PREMIUM ITEM STAR ICON TOOLTIP
                                                          $(document).ready(function() {
                                                              $("#item-'. osc_item_id().'-recent").tooltip();
                                                          });
                                                </script>';
                                              }
                                          ?>
                                          <div class="media-body">
                                             <h4 class="group inner media-heading text-capitalize">
                                                <?php echo osc_item_title(); ?>
                                             </h4>
                                             <li><a href="<?php echo osc_search_category_url().'&sCategory='.osc_item_category_id(); ?>" class="brown"><?php echo osc_item_category(); ?></a></li>
                                             <?php if(osc_item_region()){?>
                                              <div><li><i class="px px-map-pin"></i><a href="<?php echo osc_region_url().'&sRegion='.osc_item_region_id(); ?>"><?php echo osc_item_country().', &nbsp'.osc_item_region();?></a></li></div>
                                             <?php } ?>

                                             <p class="group inner media-text">
                                                <?php echo osc_highlight( strip_tags( osc_item_description() ), 90 ) ; ?>
                                             </p>
                                             <div class="row media-body-footer">
                                                <div class="col-xs-6 details">
                                                   <a class="theme-color text-underline" href="<?php echo osc_item_url(); ?>" class="lead"><u>more+</u></a>
                                                </div>
                                             </div>
                                             <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                                                <div class="clearfix">
                                                    <a href="<?php echo osc_item_delete_url(); ?>" class="pull-left"><?php _e('Delete', 'frclassifieds')?></a>
                                                    <a href="<?php echo osc_item_edit_url(); ?>" class="pull-right"><?php _e('Edit', 'frclassifieds')?></a>
                                                </div>
                                             <?php } ?>
                                          </div>
                                       </div>
                                    </div>
                                <?php } ?>
                                <?php if(osc_count_items() == 0) { ?>
                                        <br />
                                        0 <?php _e('Listings', 'frclassifieds'); ?>
                                <?php } ?>
                                </div>
                            </div>
                            <br />
                        <?php
                        $i++;
                        }
                        ?>
                    <?php  } ?>
                </div>
            </div><!-- /.row -->
      </div>
    </div>
</section>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>