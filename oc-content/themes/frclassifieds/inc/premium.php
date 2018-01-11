<div class="premium-listings">
<?php osc_get_premiums(premium_num_ads());  ?>
    <?php if(osc_count_premiums() > 0 ) {?>
   <div id="premium_carousel" class="owl-carousel owl-theme">
        <?php osc_query_item(array(
            "country_name" => get_listed_country_location(),
            "region_name" => get_region_location(),
            "results_per_page" => premium_num_ads()
        )); ?>
		<?php while ( osc_has_premiums() ) { ?>
		  <div class="item">
		    <div class="listed-item-wrap">
		       <div class="listed-item">
		          <?php if( osc_images_enabled_at_items() ) { ?>
		          <div class="thumbnail">
		                 <?php if( osc_count_premium_resources() ) { ?>
		                     <img class="group" src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_premium_title(); ?>" alt="<?php echo osc_premium_title(); ?>" />
		                 <?php } else { ?>
		                      <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" title="<?php echo osc_premium_title(); ?>" alt="<?php echo osc_premium_title(); ?>" />
		                 <?php } ?>
		           <?php } ?>
		           </div>
		             <span class="btn-price theme-bk-color"><?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?></span>
		             <div class="tringle-up-right"></div>
		             <div class="tringle-up-right-back"></div>
		             <i class="fa fa-star-o premium-icon" ></i>
		          <div class="media-body">
		             <h4 class="group inner media-heading text-capitalize">
		                <?php echo osc_premium_title(); ?>
		             </h4>
		             <li><a href="<?php echo osc_search_category_url(); ?>" class="brown"><?php echo osc_premium_category(); ?></a></li>
                     <?php if(osc_item_region()){?>
                       <div><li><i class="px px-map-pin"></i><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_item_country().', &nbsp'.osc_item_region();?></a></li></div>
                     <?php } ?>
		             <p class="group inner media-text">
		                <?php echo osc_highlight( strip_tags( osc_premium_description() ), 70 ) ;  ?>
		             </p>
		             <div class="row media-body-footer">
		                <div class="col-xs-12 details-link">
		                   <a class="theme-color text-underline" href="<?php echo osc_premium_url(); ?>" class="lead"><u>more+</u></a>
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
	  <?php } else { ?>
	  <div class="no-premium">
	  	  <span><?php _e('No Premium Listing yet.', 'frclassifieds')?></span>
	  </div>
	  <?php } ?>
	  
	  <div class="premium-text premium-bar clearfix">
	   	 <h3><i class="fa fa-star"></i><span><?php _e('Premium Listings', 'frclassifieds')?></span></h3>
	  </div>

</div><!--premium-->
<div style="position:static;"></div>