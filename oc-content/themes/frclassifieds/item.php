

<?php
   // meta tag robots
   if( osc_item_is_spam() || osc_premium_is_spam() ) {
       osc_add_hook('header','frclassifieds_nofollow_construct');
   } else {
       osc_add_hook('header','frclassifieds_follow_construct');
   }
   
   osc_enqueue_script('fancybox');
   osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
   osc_enqueue_script('jquery-validate');
   
   frclassifieds_add_body_class('item');

   $useful_information_activate = osc_get_preference('useful-information-activate', 'frclassifieds');
   
   $location = array();
   if( osc_item_city_area() !== '' ) {
       $location[] = osc_item_city_area();
   }
   if( osc_item_city() !== '' ) {
       $location[] = osc_item_city();
   }
   if( osc_item_region() !== '' ) {
       $location[] = osc_item_region();
   }
   if( osc_item_country() !== '' ) {
       $location[] = osc_item_country();
   }
   
   osc_current_web_theme_path('header.php');
   osc_current_web_theme_path('common/banner.php');
   osc_current_web_theme_path('inc/message.php') ;
   ?>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<div class="container">
   <div class="single-item">
      <div class="clearfix">
         <?php
            $breadcrumb = osc_breadcrumb(false, get_breadcrumb_lang());
            if( $breadcrumb !== '') { ?>
         <?php echo $breadcrumb; ?>
         <?php  } ?>
      </div>
      <div id="item-content col-xs-12">
         <script type="text/javascript">
            $(document).ready(function(){     
               $( ".gallery .item:first" ).addClass('active');
               $( "#single_Carousel .carousel-indicators li:first" ).addClass('active');
            
               var itemNum = $(".header-section-slider div.item").length;
               var newIn = '<li data-target="#single_Carousel" data-slide-to="0"></li>';
               var newInput = $(newIn);
               
            });
         </script>
             <div id="item_head">
                <div class="inner">
                    <div class="col-xs-12">
                       <h1><?php _e(osc_item_title(), 'frclassifieds') ?></h1>
                    </div>
                    <div class="col-sm-6">
                       <a href="<?php echo osc_region_url().'&sRegion='.osc_item_region_id(); ?>"><span class="theme-color"><?php echo osc_item_city(); ?></span></a><a href="<?php echo osc_search_category_url().'&sCategory='.osc_item_category_id(); ?>"><small><?php echo osc_item_category(); ?></small></a>
                    </div>
                    <div class="col-sm-6">
                       <div id="report" class="clearfix">
                        <ul class="btn-options pull-right">
                            <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                                <div class="btn-group" role="group" aria-label="...">
                                   <li><a href="<?php echo osc_item_edit_url(); ?>" class="theme-color btn btn-transparent btn-outlined btn-sm"><?php _e('Edit item', 'frclassifieds'); ?></a></li>
                                   <li class="dropdown">
                                       <a href="#mark-as" class="dropdown-toggle btn btn-transparent btn-outlined btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php _e('Mark as', 'frclassifieds'); ?><i class="fa fa-angle-down"></i></a>
                                       <ul class="dropdown-menu mark-as" aria-labelledby="mark-as">
                                           <li><a id="item_spam" class="btn btn-theme btn-outlined btn-xs" href="<?php echo osc_item_link_spam(); ?>" rel="nofollow"><?php _e('spam', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_bad_category" href="<?php echo osc_item_link_bad_category(); ?>" rel="nofollow"><?php _e('misclassified', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_repeated" href="<?php echo osc_item_link_repeated(); ?>" rel="nofollow"><?php _e('duplicated', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_expired" href="<?php echo osc_item_link_expired(); ?>" rel="nofollow"><?php _e('expired', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_offensive" href="<?php echo osc_item_link_offensive(); ?>" rel="nofollow"><?php _e('offensive', 'frclassifieds'); ?></a></li>
                                       </ul>
                                   </li>
                                </div>
                            <?php } else { ?>
                               <div class="btn-group" role="group" aria-label="...">
                                   <li class="dropdown">
                                       <a href="#mark-as" class="dropdown-toggle btn btn-transparent btn-outlined btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php _e('Mark as', 'frclassifieds'); ?><i class="fa fa-angle-down"></i></a>
                                       <ul class="dropdown-menu mark-as" aria-labelledby="mark-as">
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_spam" href="<?php echo osc_item_link_spam(); ?>" rel="nofollow"><?php _e('spam', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_bad_category" href="<?php echo osc_item_link_bad_category(); ?>" rel="nofollow"><?php _e('misclassified', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_repeated" href="<?php echo osc_item_link_repeated(); ?>" rel="nofollow"><?php _e('duplicated', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_expired" href="<?php echo osc_item_link_expired(); ?>" rel="nofollow"><?php _e('expired', 'frclassifieds'); ?></a></li>
                                           <li><a class="btn btn-theme btn-outlined btn-xs" id="item_offensive" href="<?php echo osc_item_link_offensive(); ?>" rel="nofollow"><?php _e('offensive', 'frclassifieds'); ?></a></li>
                                       </ul>
                                   </li>
                                </div>
                            <?php }; ?>
                        </ul>
                       </div>
                    </div>
                </div>
             </div>
            <div class="row">
               <div class="col-xs-12">
                  <?php if(osc_item_is_expired() ) { ?>
                  <div class="alert alert-info text-center"><?php _e("The listing is expired.", 'frclassifieds'); ?></div>
                  <?php } ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="carousel slide" id="single_Carousel">
                  <!-- Carousel items -->
                  <?php if( osc_images_enabled_at_items() ) { 
                   $i = 0;
                   $x = 0;
                   if( osc_count_item_resources() > 0 ) { ?>
                      <div class="carousel-inner gallery">
                         
                         <?php 
                             $resources_title = array();
                             $resources_thumb = array();
                             for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                             <a href="<?php echo osc_resource_url(); ?>" class="item image-link" title="<?php _e('Image', 'frclassifieds'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>" data-slide-number="<?php echo $i; ?>">
                               <span class="image-overlay"><i class="theme-color px px-plus"></i></span>
                               <img class="group" src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>"  />
                             </a>
                             <?php 
                                $resources_title[osc_resource_thumbnail_url()] = osc_item_title();
                         } ?>
                      </div>
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <?php  
                            foreach ( $resources_title as $resource_thumb => $resource_title ) { ?>
                             <li data-slide-to="<?php echo $x; ?>" data-target="#single_Carousel">
                                <img class="group" src="<?php echo $resource_thumb; ?>" title="<?php echo $resource_title; ?>" />
                             </li>
                        <?php $x++; } ?>
                      </ol>
                    <?php }else{ ?>
                      <div class="no_thumb">
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                      </div>
                    <?php } ?>
                  <?php } ?>
                  
               </div>
               <?php if($useful_information_activate!='' && $useful_information_activate == 'activated'){ ?>
                <div class="item-info">
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel product-info">
                         <div class="panel-heading">
                            <a href="#detailsContactCollapse" class="theme-color toggle-collapse  collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="detailsContactCollapse"><?php _e('Useful information', 'frclassifieds'); ?></a>
                         </div>
                         <div class="collapse panel-collapse theme-grey-bk useful-info-body" id="detailsContactCollapse">
                               <div id="useful_info" class="bordered-box text-left useful-info">
                                  <div class="margin-thin"></div>
                                  <?php _e(osc_get_preference('useful-information', 'frclassifieds'), 'frclassifieds') ?>
                                  <div class="margin-thin"></div>
                               </div>
                         </div>
                      </div>
                   </div>
                </div>
                <?php  } ?><!--useful information-->
            </div>
            <!--carousel-->
            <?php
               osc_current_web_theme_path('item-sidebar.php');
               ?><!--sidebar-->
            <!--Product Description-->
            <div class="col-md-8">
               <div class="product-description">
                  <!-- Nav tabs -->
                  <ul class="nav nav-pills" role="tablist">
                     <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><i class="fa fa-info-circle "></i><span><?php _e('Description', 'frclassifieds')?></span></a></li>
                     <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab"><i class="fa  fa-comments-o "></i><span><?php _e('Comments','frclassifieds')?></span></a></li>
                     <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i><span><?php _e('Contact Seller', 'frclassifieds')?></span></a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active fade in" id="description">
                        <h3><?php _e('Item Description', 'frclassifieds')?></h3>
                        <hr class="straight-default">
                        <p><?php echo osc_item_description(); ?></p>
                        <?php osc_run_hook('item_detail', osc_item() ); ?>
                     </div>
                     <?php osc_current_web_theme_path('inc/item-comments.php'); ?>
                     <div role="tabpanel" class="tab-pane fade" id="contact">
                        <div class="product-contact-form">
                           <?php osc_current_web_theme_path('inc/contact-seller.php'); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="margin-thin"></div>
               <div id="map-canvas"></div>
               <?php osc_run_hook('location'); ?>
               <div class="ads-wrapper">
                  <?php if( osc_get_preference('single-page-sidebar', 'frclassifieds') != '') {?>
                  <!-- sidebar ad 350x250 -->
                  <div class="ads">
                     <?php echo osc_get_preference('single-page-sidebar', 'frclassifieds'); ?>
                  </div>
                  <!-- /sidebar ad 350x250 -->
                  <?php } ?>
               </div> 
               <div class="clearfix">
                 <?php osc_show_widgets('Item-Sidebar');?>
               </div>
            </div>
            <div class="col-xs-12">
              <div id="custom_fields">
                 <?php if( osc_count_item_meta() >= 1 ) { ?>
                 <br />
                 <div class="meta_list">
                    <?php while ( osc_has_item_meta() ) { ?>
                    <?php if(osc_item_meta_value()!='') { ?>
                    <div class="meta">
                       <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                 </div>
                 <?php } ?>
              </div>
            </div>
      </div>
   </div>
</div>
<div class="bottom-carousel">
   <?php osc_current_web_theme_path('inc/related.php') ; ?>
</div>

<?php osc_current_web_theme_path('footer.php') ;?>