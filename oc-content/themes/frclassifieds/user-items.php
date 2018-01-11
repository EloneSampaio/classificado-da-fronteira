<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('user user-items');
   
    osc_current_web_theme_path('header.php') ;
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
                    <h1><?php _e('Manage Listings', 'frclassifieds'); ?></h1>
                    <hr class="straight-line">
                </div><!-- /.col-lg-12 --> 
                <div class="col-xs-12">
                    <?php if(osc_count_items() == 0) { ?>
                        <p class="empty" ><?php _e('No listings have been added yet', 'frclassifieds'); ?></p>
                    <?php } else { ?>
                            <?php while ( osc_has_items() ) { ?>
                                <div class="listed-item-wrap media show-premium-icon">
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
                                         <li><a href="<?php echo osc_search_category_url() ?>" class="brown"><?php echo osc_item_category(); ?></a></li>
                                         <?php if(osc_item_region()){?>
                                          <div><li><i class="px px-map-pin"></i><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_item_country().', &nbsp'.osc_item_region();?></a></li></div>
                                         <?php } ?>
                                         <p class="group inner media-text">
                                            <?php echo osc_highlight( strip_tags( osc_item_description() ), 90 ) ;  ?>
                                         </p>
                                         <div class="row media-body-footer">
                                            <div class="col-xs-6 details">
                                               <a class="theme-color text-underline" href="<?php echo osc_item_url(); ?>" class="lead"><u>more+</u></a>
                                            </div>
                                            <div class="col-xs-6 likes">
                                               <span><i class="fa fa-comments"></i><?php echo osc_item_total_comments(); ?></span>
                                            </div>
                                         </div>
                                         <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                                            <div class="clearfix">
                                                <span class="col-xs-4">
                                                  <a href="<?php echo osc_item_delete_url(); ?>" ><?php _e('Delete', 'frclassifieds')?></a>
                                                </span>
                                                <span class="col-xs-4 text-center">
                                                  <?php if(osc_item_is_inactive()) {?>
                                                   <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'frclassifieds'); ?></a>
                                                  <?php } ?>
                                                </span>
                                                <span class="col-xs-4 text-right">
                                                  <a href="<?php echo osc_item_edit_url(); ?>"><?php _e('Edit', 'frclassifieds')?></a>
                                                </span>
                                            </div>
                                         <?php } ?>
                                      </div>
                                   </div>
                                </div>
                                <?php } ?>
                    
                                <div class="pagination-container">
                                    <div class="pagination">
                                        <?php echo osc_pagination_items(); ?>
                                    </div>
                                </div><!--pagination wrap-->
                    <?php } ?>
            </div><!-- /.row -->
      </div>
    </div>
</section>
<?php osc_run_hook('search_ads_listing_top'); ?>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
