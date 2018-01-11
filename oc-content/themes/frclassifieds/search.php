<?php
    // meta tag robots
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','frclassifieds_nofollow_construct');
    } else {
        osc_add_hook('header','frclassifieds_follow_construct');
    }

    frclassifieds_add_body_class('search');
    $listClass = '';
    $buttonClass = '';
    if(osc_search_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
    osc_add_hook('footer','autocompleteCity');
    function autocompleteCity(){ ?>
    <script type="text/javascript">
    $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php echo osc_esc_html( __('Selected', 'frclassifieds') ); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php echo osc_esc_html( __('Nothing selected, input was', 'frclassifieds') ); ?> " + this.value );
                        }
                    });
                });
    </script>
    <?php
    }
?>
<?php 
  osc_current_web_theme_path('header.php') ; 
  osc_current_web_theme_path('inc/message.php') ;

?>
<div class="margin-medium"></div>
<div class="container listed">
    <div class="row">
        <div class="col-md-4">
            <?php osc_current_web_theme_path('inc/search.php'); ?><!--/search-->
        </div>
        <div class="col-md-8">
            <?php osc_current_web_theme_path('inc/premium-search.php') ; ?><!--/premium-->
            <div class="ads-wrapper">
               <div class="margin-medium"></div>
               <div class="ads">
                    <?php if( osc_get_preference('search-page-top', 'frclassifieds') != '') {?>
                    <!-- ad top -->
                      <div class="ads">
                         <?php echo osc_get_preference('search-page-top', 'frclassifieds'); ?>
                      </div>
                    <!-- /ad top -->
                    <?php } ?>
               </div>
            </div><!--ads-->
        </div>
    </div>
    <div class="margin-thin"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
              <?php
                  $breadcrumb = osc_breadcrumb(false, get_breadcrumb_lang());
                  if( $breadcrumb !== '') { ?>
                      <?php echo $breadcrumb; ?>
              <?php  } ?>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
          <?php if(osc_count_items() == 0) { ?>
             <p class="alert alert-info"><?php printf(__("There aren't listings available for this search at the moment", 'frclassifieds'), osc_search_pattern()) ; ?></p>
          <?php } else { ?>
            <div class="well clearfix">
                <?php 
                      $orders = osc_list_orders();
                      $current = '';
                ?>
                <div class="btn-group pull-left dropdown">
                   <button class="btn dropdown-toggle btn btn-outlined btn-sm btn-transparent" tabindex="-1" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown">
                       <span><?php _e('Sort by', 'soko'); ?>: 
                          <?php
                              foreach($orders as $label => $params) {
                                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                                  if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                                      $current = $label;
                                  }
                              }
                            ?>
                            <?php echo $current; ?>
                          <?php $i = 0; ?>
                       </span> 
                       <span class="caret"></span>
                   </button>
                   <ul class="dropdown-menu">
                      <?php
                          foreach($orders as $label => $params) {
                              $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                              <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                  <li><a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                              <?php } else { ?>
                                  <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                              <?php } ?>
                              <?php $i++; ?>
                      <?php } ?>
                   </ul> <!-- END sort by-->
                </div>
                <div class="btn-group pull-right">
                   <a href="#" id="list" class="btn btn-default btn-sm">
                   <i class="glyphicon glyphicon-th-list"></i>
                   <span>List</span>
                   </a> 
                </div><!--End of filters-->
              </div>
          <?php } ?>
          <div id="products" class="list-group">
              <?php if(osc_count_items() > 0) { ?>
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
                                  echo '<div class="tringle-up-right"></div><div class="tringle-up-right-back"></div><i id="item-'. osc_item_id().'-search" class="fa fa-star premium-icon"  title="Premium!" ></i>
                                  <script type="text/javascript">
                                   //PREMIUM ITEM STAR ICON TOOLTIP
                                      $(document).ready(function() {
                                          $("#item-'. osc_item_id().'-search").uitooltip({
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
                               <li><a href="<?php echo osc_search_category_url() ; ?>" class="brown"><?php echo osc_item_category(); ?></a></li>
                               <?php if(osc_item_region()){?>
                                  <div><li><i class="px px-map-pin"></i><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_item_country().', &nbsp'.osc_item_region();?></a></li></div>
                                <?php } ?>
                               <p class="group inner media-text">
                                  <?php echo osc_highlight( strip_tags( osc_item_description() ), 90 ) ;  ?>
                               </p>
                               <div class="row media-body-footer">
                                  <div class="col-xs-12 details">
                                     <a class="theme-color text-underline" href="<?php echo osc_item_url(); ?>" class="lead"><u>more+</u></a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                  <?php } ?>
                    <div class="pagination-container clearfix">
                         <div class="btn btn-outlined btn-theme pull-left listings-showing">
                            <?php $search_number = frc_search_number();
                                 printf(__('Showing %1$d - %2$d of %3$d listings.', 'frclassifieds'), $search_number['from'], $search_number['to'], $search_number['of']); ?>
                        </div>
                        <div class="pagination pull-left">
                            <?php echo osc_search_pagination(); ?>
                        </div>
                    </div><!--pagination wrap-->
                    <?php
                      if(osc_rewrite_enabled()){
                      $footerLinks = osc_search_footer_links();
                      if(count($footerLinks)>0) {
                      ?>
                      <div class="container">
                        <div id="related-searches">
                          <h3><?php _e('Other searches that may interest you','frclassifieds'); ?></h3>
                          <ul class="footer-links">
                            <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
                            <?php if($f['total'] < 3) continue; ?>
                              <li><a  href="<?php echo osc_footer_link_url(); ?>" class="btn btn-outlined btn-sm btn-transparent-theme"><?php echo osc_footer_link_title(); ?></a></li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                      <?php }
                    } ?>
                  
              <?php } ?>
          </div>
      </div>
    </div>
    <?php osc_run_hook('search')?>
</div>
<?php osc_current_web_theme_path('common/parallax.php') ; ?>
<div class="container">
  <div class="margin-medium"></div>
  <div class="row">
      <div class="col-xs-12">
        <div class="ads-wrapper">
             <div class="ads">
                   <?php if( osc_get_preference('search-page-bottom', 'frclassifieds') != '') {?>
                  <!-- ad bottom -->
                    <div class="ads">
                       <?php echo osc_get_preference('search-page-bottom', 'frclassifieds'); ?>
                    </div>
                  <!-- /ad bottom -->
                   <?php } ?>
             </div>
          </div><!--ads-->
      </div>
    </div>
</div>
<div class="bottom-carousel">
  <?php osc_current_web_theme_path('inc/popular-listings.php') ; ?>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>