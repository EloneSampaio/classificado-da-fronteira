

<?php
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
   ?>
<div class="col-md-6 product-info">
   <div class="margin-thin"></div>
   <!--Seller Details-->
   <div class="card hovercard">
      <div class="card-header frc-brd-solid clearfix">
         <h2>
            <span class="card-header-left">
            <i class="px px-user"></i>
            </span>
            <span class="card-header-right">
            <span class="right-top"><?php _e('details of', 'frclassifieds');?></span>
            <span class="right-bottom"><?php _e('Seller', 'frclassifieds');?></span>
            </span>
         </h2>
      </div>
      <div class="card-body userprofile frc-bdr-dashed clearfix border-top-none padding-bottom-none padding-left-none padding-right-none clearfix">
          <?php if(osc_item_is_premium()){ ?>
              <div class="seller-ratings" data-toggle="tooltip" data-placement="top" title="<?php _e('Premium Seller.', 'frclassifieds')?>">
                <i class="fa fa-star"></i>
              </div>
          <?php }?>
         <div class="user clearfix">
            <img class="group" src="<?php echo user_avatar_url(osc_user_id()); ?>"/>
            <div class="margin-thin"></div>
            <div class="card-title"><?php echo osc_item_contact_name(); ?></div>
            
         </div>
         <div class="user-profile clearfix padding-top-none">
            <div class="user-rinfo">
              <?php if(osc_user_public_profile_url() !=''){ echo user_sm_profiles(osc_user()); }; ?>
            </div>
            <div class="buttons clearfix">
              <?php if(osc_user_public_profile_url() !=''){?>
                 <a class="btn btn-outlined icon-btn btn-transparent" href="mailto:<?php echo osc_item_contact_email(); ?>" target="blank"><span class="btn-glyphicon fa fa-envelope-o img-circle"></span><?php _e('Email Me.','frclassifieds')?></a>
        
                 <a class="btn btn-outlined icon-btn btn-transparent" href="<?php echo osc_user_public_profile_url($id = osc_item_user_id() ); ?>"><span class="btn-glyphicon fa fa-user img-circle"></span><?php _e('My Profile','frclassifieds')?></a>
               
               <?php } ?>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                 $(".seller-ratings").tooltip();
             });
         </script>
      </div>
   </div>
   <div class="margin-medium"></div>
   <div class="card hovercard item-details">
      <div class="card-header frc-brd-solid clearfix">
         <h2>
            <span class="card-header-left">
            <i class="px px-trolley"></i>
            </span>
            <span class="card-header-right">
            <span class="right-top"><?php _e('details of', 'frclassifieds');?></span>
            <span class="right-bottom"><?php _e('Product', 'frclassifieds');?></span>
            </span>
         </h2>
      </div>
      <div class="card-body product-details theme-grey-bk frc-bdr-dashed border-top-none">
         <div class="product-price">
            <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><span class="price btn btn-outlined btn-theme"><?php echo osc_item_formated_price(); ?></span> <?php } ?>
         </div>
         <div class="details-box text-left">
            <?php if ( osc_item_country() != "" ||  osc_item_region() != '') {
               echo '<div class="has-icon clearfix"><i class="glyphicon glyphicon-map-marker ico"></i>';
               if ( osc_item_region() != "" ) {
                   $tempData  = osc_item_region();
                   if(osc_item_field("fk_i_region_id") != "" ){
                       $tempData = '<a href="'.osc_search_url( array( 'sRegion' => osc_item_field("fk_i_region_id") ) ).'">'.osc_item_region().'</a>';
                   }
                   echo  $tempData;
               }
               echo  '<div class="mini">';
               if ( osc_item_city() != "" ) {
                   $tempData  = osc_item_city();
                   if(osc_item_field("fk_i_city_id") != "" ){
                       $tempData = '<a href="'.osc_search_url( array( 'sCity' => osc_item_field("fk_i_city_id") ) ).'">'.osc_item_city().'</a>';
                   }
                   echo  $tempData;
               }
                   echo '</div>';
               echo '</div>';
               }
               //echo join(', ',$regionData);
               ?>
            <div class="margin-thin"></div>
            <div class="has-icon clearfix dates">
               <i class="glyphicon glyphicon-time ico"></i>
               <div><?php if ( osc_item_pub_date() != '' ) echo __('Published', 'frclassifieds') . ': ' . osc_format_date( osc_item_pub_date() ) ; ?></div>
               <div><?php if ( osc_item_mod_date() != '' ) echo __('Modified', 'frclassifieds') . ': ' . osc_format_date( osc_item_mod_date() ) ; ?></div>
            </div>
            <div class="margin-thin"></div>
            <div class="has-icon author clearfix">
                  <div><?php if ( osc_user_phone(osc_item_user_id()) != '' ) { ?>
                     <i class="glyphicon glyphicon-earphone ico"></i>
                     <?php echo osc_user_phone() ; ?>
                     <div class="mini"><?php _e('&nbspCall Me!', 'frclassifieds')?></div>
                     <?php } ?>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- plugins -->          
</div>