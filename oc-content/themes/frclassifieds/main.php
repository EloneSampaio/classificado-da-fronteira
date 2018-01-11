<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_follow_construct');

    frclassifieds_add_body_class('home');
    

?>
<?php osc_current_web_theme_path('header.php') ; ?>
<?php osc_current_web_theme_path('common/banner.php') ; ?>
<?php osc_current_web_theme_path('inc/message.php') ; ?>
<div class="margin-medium"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php osc_current_web_theme_path('inc/search.php'); ?><!--/search-->
            <div>
              <div class="ads-home">
                 <div class="ads-wrapper">
                     <?php if( osc_get_preference('home-page-sidebar', 'frclassifieds') != '') {?>
                        <!-- ad top -->
                          <div class="ads">
                             <?php echo osc_get_preference('home-page-sidebar', 'frclassifieds'); ?>
                          </div>
                        <!-- /ad top -->
                     <?php } ?>
                 </div>
              </div><!--premium-->
              <div class="clearfix">
                 <?php osc_show_widgets('Home-Sidebar');?>
              </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php osc_current_web_theme_path('inc/premium.php') ; ?><!--/premium-->
            <div class="margin-thin"></div>
            <div class="row cell-row">
                 <?php osc_goto_first_category() ; ?>
                 <?php while ( osc_has_categories() ) { ?>
                    <?php 
                      $cat_slug      = osc_category_slug();
                      $cat_url       = osc_search_category_url();
                      $cat_name      = osc_category_name();
                      $icon_url      ="px-".$cat_slug;
                    ?>
                     <div class="col-xs-6 col-sm-3">
                          <div class="item-cell">
                               <?php if ( osc_count_categories() >= 0 ) {  ?>
                                <a href="<?php echo $cat_url ; ?>" class="cell <?php echo $cat_slug; ?>">
                                 
                                   	 <span class="category theme-color">
                                          <i class="<?php if(frc_category_icon(osc_category_id())=='px px-trolley'){echo "px px-trolley";}else{echo frc_category_icon(osc_category_id()); }; ?>"></i>
                                     </span>
                                     <div>
                                       	<span class="theme-color">(<?php echo osc_category_total_items() ; ?>)</span>
                                     </div>
                                     <div>
                                     	  <span class="category theme-color" href="<?php echo $cat_url ; ?>">
                                           <?php echo $cat_name; ?>
                                        </span>
                                     </div>
                                </a>
                              <?php } ?>
                          </div>
                      </div>
                 <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container listed">
      <?php if( osc_count_latest_items() == 0) { ?>
              <div class="">
                  <p class="alert alert-info"><?php _e("There aren't listings available at this moment", 'frclassifieds'); ?></p>
              </div>
      <?php } else { ?>
        <div class="well clearfix">
          <h3 class="section-title">
            <?php
               $words = explode(' ', 'Latest Listings');
               for($x = 0; $x <= 0; $x++) { 
                $words[$x] = '<span class="theme-color">'.$words[$x].'</span>';
              }
              $title = implode(' ', $words);

                _e($title, 'frclassifieds');
            ?>
          </h3>
          <div class="btn-group pull-right">
             <a href="#" id="list" class="btn btn-default btn-sm">
             <i class="glyphicon glyphicon-th-list"></i>
             <span>List</span>
             </a> 
          </div>
        </div>
        <?php osc_query_item(array(
            "country_name" => get_listed_country_location(),
            "region_name" => get_region_location(),
            "results_per_page" => osc_max_latest_items()
        )); ?>
        <div id="products" class="list-group">
            <?php while ( osc_has_custom_items() ) { ?>
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

                            echo '<div class="tringle-up-right"></div><div class="tringle-up-right-back"></div><i id="item-'. osc_item_id().'-recent" class="fa fa-star premium-icon"  title="Premium!" ></i>
                            <script type="text/javascript">
                                   //PREMIUM ITEM STAR ICON TOOLTIP
                                      $(document).ready(function() {
                                          $("#item-'. osc_item_id().'-recent").uitooltip({
                                              track:true
                                          });
                                      });
                            </script>';
                          }
                      ?>
                      <div class="media-body">
                         <h4 class="group inner media-heading text-capitalize">
                            <?php echo osc_item_title(); ?>
                         </h4>
                         <li><a href="<?php echo osc_search_category_url(); ?>" class="brown"><?php echo osc_item_category(); ?></a></li>
                         <?php if(osc_item_region()){?>
                          <div><li><i class="px px-map-pin"></i><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_item_country().', &nbsp'.osc_item_region();?></a></li></div>
                         <?php } ?>

                         <p class="group inner media-text">
                            <?php echo osc_highlight( strip_tags( osc_item_description() ), 90 ) ; ?>
                         </p>
                         <div class="row media-body-footer">
                            <div class="col-xs-6 details">
                               <a class="theme-color text-underline" href="<?php echo osc_item_url(); ?>" class="lead"><u><?php _e('more+', 'frclassifieds')?></u></a>
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
            <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                     <div class="col-xs-12">
                        <p class="see_more_link text-right">
                           <a href="<?php echo osc_search_show_all_url() ; ?>" class="btn btn-outlined btn-theme btn-xs">
                            <strong><?php _e('See all listings', 'frclassifieds') ; ?> <i class="fa fa-arrow-right"></i></strong>
                           </a>
                        </p>
                     </div>
            <?php } ?>
            <?php } ?>
          <div class="margin-thin"></div>
          <div class="ads-wrapper">
             <?php if( osc_get_preference('home-page-center', 'frclassifieds') != '') {?>
                  <!-- ad bottom -->
                    <div class="ads">
                       <?php echo osc_get_preference('home-page-center', 'frclassifieds'); ?>
                    </div>
                  <!-- /ad bottom -->
              <?php } ?>
          </div>
    </div>
</div><!-- main -->
<div class="container">
   <?php osc_current_web_theme_path('inc/locations.php'); ?>
</div>
<div class="bottom-carousel">
   <?php osc_current_web_theme_path('inc/popular-listings.php') ; ?>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>