<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_follow_construct');

    osc_enqueue_script('jquery-validate');

    frclassifieds_add_body_class('user-public-profile');
    osc_current_web_theme_path('header.php');
    osc_current_web_theme_path('inc/message.php') ;
?>
<div class="container">
   <div class="col-md-10 col-md-offset-1">
     <?php osc_show_flash_message(); ?>
   </div>
</div>
<section class="container-fluid profile">
    <div class="row">
     <div class="tabs clearfix">
      <!-- Nav tabs -->
      <?php osc_current_web_theme_path('user-public-account-nav.php') ; ?>

      <!-- Tab panes -->
      <div class="tab-content col-sm-8">
          <div role="tabpanel" class="tab-pane fade in active" id="public_profile">
              <div class="row">
                   <div class="col-xs-12 text-left">
                       <div id="item-content">
                           <div class="user-card">
                                <div class="row">
                                    <div class="col-xs-12 text-left">
                                        <h2><?php _e('User:', 'frclassifieds'); ?></h2>
                                        <hr class="straight-default">
                                    </div><!-- /.col-lg-12 -->
                                </div>
                           <?php if( osc_user_country() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('User Type:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php if(osc_user_is_company()){
                                           printf('Company'); 
                                          }else{
                                            printf('Individual');
                                          }; ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                                <div class="row">
                                    <div class="col-xs-12 text-left">
                                        <h2><?php _e('Location:', 'frclassifieds'); ?></h2>
                                        <hr class="straight-default">
                                    </div><!-- /.col-lg-12 -->
                                </div>
                           <?php if( osc_user_country() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Coutry:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_country()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_region() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Region:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_region()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_city() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('City:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_city()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_city_area() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('City Area:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_city_area()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-xs-12 text-left">
                                    <h2><?php _e('Contact:', 'frclassifieds'); ?></h2>
                                    <hr class="straight-default">
                                </div><!-- /.col-lg-12 -->
                            </div>
                            <?php if( osc_user_email() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Email:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <a href="mailto:<?php echo osc_user_email(); ?>"><?php printf(osc_user_email()); ?></a>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_phone_land() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Phone Home:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_phone_land()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_phone_mobile() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Phone Mobile:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_phone_mobile()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_address() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Local Address:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php printf(osc_user_address()); ?>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                            <?php if( osc_user_website() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Website:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <a href="<?php echo osc_user_website(); ?>" target="blank"><?php printf(osc_user_website()); ?></a>
                                    </div>
                                </div>
                                <div class="margin-thin"></div>
                            <?php } ?>
                           <?php if( osc_user_info() != '' ) { ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <strong><?php _e('Description:', 'frclassifieds'); ?></strong>
                                    </div>
                                    <div class="col-sm-10 text-left">
                                        <?php echo nl2br(osc_user_info()); ?>
                                    </div>
                                </div>
                                <div class="margin-wide"></div>
                            <?php } ?>
                           </div>
                        </div><!--user detaiuls-->
                   </div>
              </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="my_Listings">
                  <div class="row">
                        <div class="col-xs-12">
                            <div id="item-content">
                                <div class="row">
                                    <div class="col-xs-12 text-left">
                                        <h2><?php _e('My Listings', 'frclassifieds'); ?></h2>
                                        <hr class="straight-default">
                                    </div><!-- /.col-lg-12 -->
                                </div>
                                <div class="row">
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
                                                              <?php echo osc_highlight( strip_tags( osc_item_description() ), 60 ) ;  ?>
                                                           </p>
                                                           <div class="row media-body-footer">
                                                              <div class="col-xs-6 details">
                                                                 <a class="theme-color text-underline" href="<?php echo osc_item_url(); ?>" class="lead"><u>more+</u></a>
                                                              </div>
                                                              <div class="col-xs-6 likes">
                                                                 <span><i class="fa fa-comments-o"></i><?php echo osc_item_total_comments(); ?></span>
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
                                                  <?php } ?>
                                          </div><!-- /.row -->
                                </div>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                  </div>
          </div>
      </div>
   </div>
 </div>
</section>
<?php osc_current_web_theme_path('user-public-contact-modal.php'); ?>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>