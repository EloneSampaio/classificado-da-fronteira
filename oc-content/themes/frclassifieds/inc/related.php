<?php related_listings(); ?>
<?php if( osc_count_items() > 0 ) { ?>
<div class="container-fluid">
  <div class="well clearfix">
     <h3 class="section-title">
         <?php
               $words = explode(' ', 'Related Listings');
               for($x = 0; $x <= 0; $x++) { 
                $words[$x] = '<span class="theme-color">'.$words[$x].'</span>';
              }
              $title_2 = implode(' ', $words);

                _e($title_2, 'frclassifieds');
          ?>
     </h3>
  </div>
</div>
<section class="container-fluid related-listings">
  <div  class="well"> 
       <div class="related-items-wrapper">
         <div id="carousel-search_related" class="owl-carousel owl-theme">
            <?php while ( osc_has_items() ) { ?>
                <div class="item">
                   <div class="listed-item-wrap">
                      <div class="listed-item">
                         <?php if( osc_images_enabled_at_items() ) { ?>
                           <div class="thumbnail">
                              <?php if( osc_count_item_resources() ) { ?>
                                   <img class="group" src="<?php echo osc_resource_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                 <?php } else { ?>
                                    <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                              <?php } ?>
                            </div>
                          <?php } ?>
                          <span class="btn-price theme-bk-color"><?php echo osc_item_formated_price()?></span>
                          <?php 
                             if(osc_item_is_premium()){

                                echo '<div class="tringle-up-right"></div><div class="tringle-up-right-back"></div><i id="item-'. osc_item_id().'-related" class="fa fa-star premium-icon" title="Premium!" ></i>
                                <script type="text/javascript">
                                   //PREMIUM ITEM STAR ICON TOOLTIP
                                      $(document).ready(function() {
                                          $("#item-'. osc_item_id().'-related").uitooltip({
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
                                <?php echo osc_highlight( strip_tags( osc_item_description() ), 70 ) ;  ?>
                             </p>
                             <div class="row media-body-footer">
                                <div class="col-xs-12 details">
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
                </div>
            <?php } ?> 
      </div>    
  </div>
</section>
<?php } ?>