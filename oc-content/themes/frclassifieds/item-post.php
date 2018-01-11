<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    frclassifieds_add_body_class('item item-post');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit') {
        $action = 'item_edit_post';
        $edit = true;
    }
    $terms_link = osc_get_preference('terms-link', 'frclassifieds');
    $terms_link_activate = osc_get_preference('terms-link-activate', 'frclassifieds');

    osc_current_web_theme_path('header.php') ;
    osc_current_web_theme_path('inc/message.php') ;
    
 ?>
    <script type="text/javascript">
        var frc_theme = window.frc_theme || {} ;
        frc_theme.text_select_subcategory = "<?php _e('Select a subcategory...', 'frclassifieds') ; ?>" ;
        frc_theme.category_selected_id    = "<?php echo frc_item_selected_category_id() ; ?>" ;
        frc_theme.subcategory_selected_id = "<?php echo frc_item_selected_subcategory_id() ; ?>" ;
        frc_theme.ajax_url                = "<?php if(OC_ADMIN) { echo osc_admin_base_url(true) . '?page=ajax' ;}else{ echo osc_base_url(true) . '?page=ajax' ;} ?>";
        frc_theme.page                          = "form" ;
        frc_theme.item_id                       = "" ;
    </script>
<?php frc_item_category_select_js(); ?>
    <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_form.js') ; ?>"></script>
<?php
    if (frc_default_location_show_as() == 'dropdown') {
        ItemForm::location_javascript();
    } else {
        ItemForm::location_javascript_new();
    }
    Session::newInstance()->_setForm('countryId', get_user_country_code());
?>
    <div class="container">
       <div class="margin-wide"></div>
       <div class="user-forms">
           <div class="row">
               <div class="col-xs-12">
                   <ul id="error_list"></ul>
               </div><!--display errors-->
               <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data" id="item-post">
                   <input type="hidden" name="action" value="<?php echo $action; ?>" />
                   <input type="hidden" name="page" value="item" />
                    <?php if($edit){ ?>
                        <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                    <?php } ?>
                       <div class="col-md-8">
                           <div class="add-new-widget">
                               <div class="add-new-header">
                                    <h3 class="theme-color frc-bdr-dotted">
                                        <i class="px px-notepad"></i>
                                        <?php _e('Product Information', 'frclassifieds')?>
                                    </h3>
                               </div><!--widget header-->
                               <div class="add-new-body padding-none">
                                  <div class="add-new-body-content clearfix row">
                                          <?php frc_item_category_select( __('Select a category...', 'frclassifieds') ) ; ?>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                   <div class="frc-bdr-dotted">
                                                      <div class="des-wrapper frc_rgba_bc_color">
                                                        <?php ItemForm::multilanguage_title_description(); ?>
                                                        <?php //ItemForm::description_textarea('description',osc_current_user_locale(), osc_esc_html( frclassifieds_item_description() )); ?>
                                                      </div>
                                                   </div>
                                               </div>
                                               <div class="margin-thin"></div> 
                                          </div>
                                      
                                      <div class="col-xs-12">
                                            <?php if( osc_images_enabled_at_items() ) {
                                                    ItemForm::ajax_photos();
                                            } ?>     
                                      </div>
                                      <div class="margin-thin"><div>
                                      <div class="col-xs-12">
                                          <div class="form-group form-inline">  
                                               <div class="form-pricing clearfix theme-grey-bk frc-bdr-dotted">
                                                   <?php if( osc_price_enabled_at_items() ) { ?>
                                                        <span><?php _e('Price', 'frclassifieds')?></span>
                                                        <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-outlined btn-theme btn-sm active free">
                                                              <input id="free" type="radio" value="0" name="free" checked="checked"><?php _e('Free', 'frclassifieds')?>
                                                            </label>
                                                            <label class="btn btn-outlined btn-theme btn-sm">
                                                              <input id="checkSeller" type="radio" value="" name="check-with-seller"><?php _e('Check with Seller', 'frclassifieds')?>
                                                            </label>
                                                            <label class="input-group amount">
                                                              <input id="price" type="text" value="0" name="price">
                                                              <div class="input-group-addon theme-bk-color frc-brd-solid">
                                                                  <span>$</span>
                                                                  <?php ItemForm::currency_select(); ?>
                                                              </div>
                                                            </label>
                                                        </div>
                                                   <?php } ?>
                                               </div>
                                          </div>
                                      </div>
                                    </div> <!--widget body content-->
                                 </div><!--widget body-->
                              </div>
                            </div>
                         </div><!--left sidebar-->
                       </div>
                       <div class="col-md-4">
                           <div class="add-new-widget">
                               <div class="add-new-header">
                                    <h3 class="theme-color frc-bdr-dotted">
                                        <i class="px px-user"></i>
                                        <?php _e("Seller's Information", 'frclassifieds')?>
                                    </h3>
                               </div><!--widget header-->
                               <div class="add-new-body theme-grey-bk">
                                  <div class="add-new-body-content clearfix row">
                                      <?php if(!osc_is_web_user_logged_in() ) { ?>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                  <label class="form-label" for="contactName"><?php _e('Name', 'frclassifieds'); ?></label>
                                                  <div class="form-control border-radious-none input-sm">
                                                        <?php ItemForm::contact_name_text(); ?>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                  <label class="form-label" for="contactEmail"><?php _e('Mobile Phone', 'frclassifieds'); ?></label>
                                                  <div class="form-control border-radious-none input-sm">
                                                         <?php UserForm::mobile_text(osc_user()); ?>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                  <label class="form-label" for="contactEmail"><?php _e('E-mail', 'frclassifieds'); ?></label>
                                                  <div class="form-control border-radious-none input-sm">
                                                        <?php ItemForm::contact_email_text(); ?>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                   <?php ItemForm::show_email_checkbox(); ?>
                                                    <label for="showEmail">
                                                        <?php _e('Show e-mail on the listing page', 'frclassifieds'); ?>
                                                    </label>
                                              </div>
                                          </div>
                                      <?php } else { ?>
                                         <?php if( osc_logged_user_name() != '' ) { ?>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                  <label class="form-label" for="contactName"><?php _e('Publish as', 'frclassifieds'); ?></label>
                                                  <div class="text-left" id="contactName">
                                                        <?php echo osc_logged_user_name(); ?>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php } ?>
                                          <?php if( osc_user_phone_mobile() != '' ) { ?>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                  <label class="form-label" for="contactEmail"><?php _e('Mobile Phone', 'frclassifieds'); ?></label>
                                                  <div class="text-left" id="contactEmail">
                                                        <?php printf(osc_user_phone_mobile()); ?>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php } ?>
                                          <?php if( osc_logged_user_email() != '' ) { ?>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                  <label class="form-label" for="contactEmail"><?php _e('E-mail', 'frclassifieds'); ?></label>
                                                  <div class="text-left" id="contactEmail">
                                                        <?php echo osc_logged_user_email(); ?>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php } ?>
                                          <div class="col-xs-12">
                                              <div class="form-group">
                                                   <?php ItemForm::show_email_checkbox(); ?>
                                                    <label for="showEmail"><small><?php _e('Show e-mail on the listing page', 'frclassifieds'); ?></small></label>
                                              </div>
                                          </div>
                                         <?php } ?>
                                  </div> <!--widget body content-->
                               </div><!--widget body-->
                           </div>
                           <div class="add-new-widget">
                               <div class="add-new-header">
                                    <h3 class="theme-color frc-bdr-dotted">
                                        <i class="px px-map-pin"></i>
                                        <?php _e('Listing Location', 'frclassifieds')?>
                                    </h3>
                               </div><!--widget header-->
                               <div class="add-new-body theme-grey-bk">
                                   <div class="add-new-body-content clearfix row">
                                       <?php if(count(osc_get_countries()) > 1) { ?>
                                            <div class="col-xs-12">
                                                 <div class="form-group form-select countries">
                                                    <label class="form-label" for="country"><?php _e('Country', 'frclassifieds'); ?></label>
                                                    <div class="form-control border-radious-none input-sm">
                                                        <span><?php _e('Select a country...', 'frclassifieds')?></span>
                                                        <?php ItemForm::country_select(osc_get_countries(), osc_user());?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">

                                                 <?php if (frc_default_location_show_as() == 'dropdown') { 
                                                     $aCountries = osc_get_countries();
                                                     $aRegions = osc_get_regions($aCountries[0]['pk_c_code']);
                                                  ?>
                                                         <div class="form-group form-select regions">
                                                            <label class="form-label" for="region"><?php _e('Region', 'frclassifieds'); ?></label>
                                                            <div class="form-control border-radious-none input-sm">
                                                                   <?php
                                                                      _e('<span>Select a region</span>', 'frclassifieds');
                                                                       ItemForm::region_select($aRegions, osc_user());
                                                                    ?>
                                                               
                                                            </div>
                                                        </div>

                                                  <?php } else { ?>
                                                      <div class="form-group">
                                                      <label class="form-label" for="region"><?php _e('Region', 'frclassifieds'); ?></label>
                                                          <div class="form-control border-radious-none input-sm">
                                                             <?php ItemForm::region_text(osc_user()); ?>
                                                          </div>
                                                      </div>
                                                  <?php } ?>
                                            </div>
                                            <?php
                                            } else {
                                                $aCountries = osc_get_countries();
                                                $aRegions = osc_get_regions($aCountries[0]['pk_c_code']);
                                                ?>
                                            <input type="hidden" id="countryId" name="countryId" value="<?php echo osc_esc_html($aCountries[0]['pk_c_code']); ?>"/>
                                            <div class="col-xs-12">
                                              <?php
                                                  if (frc_default_location_show_as() == 'dropdown') { ?>
                                                         <div class="form-group form-select regions">
                                                            <label class="form-label" for="region"><?php _e('Region', 'frclassifieds'); ?></label>
                                                            <div class="form-control border-radious-none input-sm">
                                                                   <?php
                                                                    _e('<span>Select a region</span>', 'frclassifieds');
                                                                    ItemForm::region_select($aRegions, osc_user());
                                                                    ?>
                                                               
                                                            </div>
                                                        </div>
                                              <?php } else { ?>
                                                  <div class="form-group">
                                                  <label class="form-label" for="region"><?php _e('Region', 'frclassifieds'); ?></label>
                                                      <div class="form-control border-radious-none input-sm">
                                                         <?php ItemForm::region_text(osc_user()); ?>
                                                      </div>
                                                  </div>
                                              <?php } ?>
                                            </div>
                                            <?php } ?>

                                            <div class="col-xs-12">
                                                      <?php if (frc_default_location_show_as() == 'dropdown') {?>
                                                            <div class="form-group form-select">
                                                              <label class="form-label" for="city"><?php _e('City', 'frclassifieds'); ?></label>
                                                                <div class="form-control border-radious-none input-sm">
                                                                    <?php
                                                                    _e('<span>Select a city...</span>', 'frclassifieds');
                                                                    if(Params::getParam('action') != 'item_edit') {
                                                                        ItemForm::city_select(null, osc_item());
                                                                    } else { // add new item
                                                                        ItemForm::city_select(osc_get_cities(osc_user_region_id()), osc_user());
                                                                    }?>
                                                                </div>
                                                            </div>
                                                      <?php } else { ?>
                                                            <div class="form-group">
                                                              <label class="form-label" for="cityArea"><?php _e('City Area', 'frclassifieds'); ?></label>
                                                                <div class="form-control border-radious-none input-sm">
                                                                   <?php ItemForm::city_text(osc_user()); ?>
                                                                </div>
                                                            </div>
                                                      <?php }?>
                                            </div>
                                            <div class="col-xs-12">
                                                 <div class="form-group">
                                                    <label class="form-label" for="cityArea"><?php _e('City Area', 'frclassifieds'); ?></label>
                                                    <div class="form-control border-radious-none input-sm">
                                                        <?php ItemForm::city_area_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                 <div class="form-group">
                                                    <label class="form-label" for="address"><?php _e('Address', 'frclassifieds'); ?></label>
                                                    <div class="form-control border-radious-none input-sm">
                                                      <?php ItemForm::address_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                            </div>
                                   </div>
                                   
                               </div>
                           </div>
                           <div class="add-new-widget">
                                  <div class="add-new-body theme-grey-bk">
                                     <div class="add-new-body-content plugin-hook clearfix row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                              <?php osc_run_hook('item_contact_form'); ?>
                                            </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="add-new-widget">
                                  <div class="add-new-body theme-grey-bk">
                                     <div class="add-new-body-content plugin-hook clearfix row">
                                       <div class="col-xs-12">
                                            <div class="form-group">
                                               <script type="text/javascript">
                                                   var catPriceEnabled = new Array();
                                                    <?php
                                                        $categories = Category::newInstance()->listAll(false);
                                                        foreach($categories as $c) {
                                                            echo 'catPriceEnabled['.$c['pk_i_id'].'] = '.$c['b_price_enabled'].';';
                                                        }
                                                    ?>
                                                     $("select.subcategory").bind('change', function(event) {
                                                            var cat_id = $(this).val();
                                                            if( cat_id != "" ) {
                                                                if(catPriceEnabled[cat_id] == 1) {
                                                                        $("#price").closest("div").show();
                                                                                        // trigger show-price event
                                                                                        $('.form-pricing').show();
                                                                    } else {
                                                                        $(".form-pricing").hide();
                                                                        $('#price').val('');
                                                                    }
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: frc_theme.ajax_url,
                                                                    data: { action: "runhook", hook: "item_" + frc_theme.page, catId: cat_id, itemId: frc_theme.item_id } ,
                                                                    dataType: 'html',
                                                                    success: function(data){
                                                                        $("#plugin-hook").html(data);
                                                                    }
                                                                });
                                                            }
                                                        });
                                                        $(document).ready(function(){
                                                            var cat_id = $(this).val();
                                                            if( cat_id != "" ) {
                                                                if(catPriceEnabled[cat_id] == 1) {
                                                                        $("#price").closest("div").show();
                                                                                        // trigger show-price event
                                                                                        $('.form-pricing').show();
                                                                    } else {
                                                                        $(".form-pricing").hide();
                                                                        $('#price').val('');
                                                                    }
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: frc_theme.ajax_url,  
                                                                    data: { action: "runhook", hook: "item_" + frc_theme.page, catId: cat_id, itemId: frc_theme.item_id } ,
                                                                    dataType: 'html',
                                                                    success: function(data){
                                                                        $("#plugin-hook").html(data);
                                                                    }
                                                                });
                                                            }
                                                            });
                                                </script>
                                                <div id="plugin-hook"></div>
                                            </div>
                                        </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="add-new-widget">
                                  <div class="add-new-body theme-grey-bk">
                                     <div class="add-new-body-content plugin-hook clearfix row">
                                         <div class="col-xs-12">
                                            <div class="form-group">
                                             <?php if($edit){osc_run_hook('item_edit');}else{osc_run_hook('new_item');} ?>
                                            </div>
                                        </div>
                                     </div>
                                  </div>
                                </div>
                           <div class="clearfix">
                             <?php osc_show_widgets('Item-Post-Sidebar');?>
                           </div>
                       </div><!--rigth sidebar-->
                   <?php if( osc_recaptcha_items_enabled() ) { ?>
                       <div class="col-xs-8">   
                               <?php osc_show_recaptcha(); ?>  
                       </div>
                   <?php }?>
                   <?php if($terms_link_activate !='' && $terms_link_activate == 'activate'){ ?>
                        <div class="col-xs-12">
                             <?php 
                               if($edit) {  
                                  _e('<p>By clicking <strong class="label label-primary">Update</strong>, you agree to the<a href="'.$terms_link.'" class="theme-color p-link"> Terms and Conditions </a>set out by this site, including our Cookie Use.</p>', 'frclassifieds');
                               } else {
                                    _e('<p>By clicking <strong class="label label-primary">Publish</strong>, you agree to the<a href="'.$terms_link.'" class="theme-color p-link"> Terms and Conditions </a>set out by this site, including our Cookie Use.</p>', 'frclassifieds');
                               } 

                             ?>
                          </div>
                   <?php } ?>
                         <div class="col-xs-12">
                           <button type="submit" class="btn btn-outlined btn-theme btn-xl"><?php if($edit) { _e("Update", 'frclassifieds'); } else { _e("Publish", 'frclassifieds'); } ?></button>
                         </div><!--submit button-->
               </form>
               <div class="add-new-widget">
                    <div class="add-new-body">
                            <div class="add-new-body-content plugin-hook clearfix row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                       <?php osc_run_hook('item_form'); ?>
                                    </div>
                                </div>
                         </div>
                    </div>
               </div>
           </div>
       </div>    
    </div>
    <script type="text/javascript">
        $('#price').bind('hide-price', function(){
            $('.control-group-price').hide();
        });

        $('#price').bind('show-price', function(){
            $('.control-group-price').show();
        });

        <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
        $(document).ready(function(){
            $("#price").blur(function(event) {
                var price = $("#price").prop("value");
                <?php if(osc_locale_thousands_sep()!='') { ?>
                while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                    price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
                }
                <?php }; ?>
                <?php if(osc_locale_dec_point()!='') { ?>
                var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
                if(tmp.length>2) {
                    price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
                }
                <?php }; ?>
                $("#price").prop("value", price);
            });
        });
        <?php }; ?>
    </script>
    <script type="text/javascript">
         $(function(){
           $('#countryId').parent().find('span').text($('#countryId').find("option:selected" ).text()); 
        });
    </script>

<?php if (frc_default_location_show_as() == 'dropdown') { ?>
   <script type="text/javascript">
     $(function(){
       $('#regionId').parent().find('span').text($('#regionId').find("option:selected" ).text());
       $('#cityId').parent().find('span').text($('#cityId').find("option:selected" ).text());  
       
    });
   </script>
<?php }?>
<script type="text/javascript">
   $(function(){
    if ($('input').is($('#city'))) {
       $('input#city').parent().addClass('disabled');
    }
   });
</script>
<script type="text/javascript">
  //Reset form fields when no value is found
    $('.form-select.countries').on('change','select',function(){
      var value = $('#countryId').find("option:selected" ).val();
      
      if(value ==''){
         $('#regionId').parent().find('span').text('select a region...');
         $('#cityId').parent().find('span').text('select a city...');
         $("#regionId").attr('disabled',true);
         $("#region").attr('disabled',true);
         $('#regionId').parent().addClass('disabled');
         $("#cityId").attr('disabled',true);
         $("#city").attr('disabled',true);
         $('#cityId').parent().addClass('disabled');
      }else{
         $('#regionId').parent().removeClass('disabled');
         $("#region").attr('disabled',false);
      }
    });
    $('.form-select.regions').on('change','select',function(){
      var value = $('#regionId').find("option:selected" ).val();
      
      if(value ==''){
         $('#cityId').parent().find('span').text('select a region...');
         $("#cityId").attr('disabled',true);
         $("#city").attr('disabled',true);
         $('#cityId').parent().addClass('disabled');
      }else{
         $('#cityId').parent().removeClass('disabled');
         $('#city').parent().removeClass('disabled');
         $("#city").attr('disabled',false);
      }
    });
</script>
<?php
   if(get_user_country_code() == '' && frc_default_location_show_as() == 'dropdown'){ 
        if(!$edit){ 
      ?>
       <script type="text/javascript">
           $("#regionId").attr('disabled',true);
           $('#regionId').parent().addClass('disabled');
           $("#city").attr('disabled',true);
           $('#city').parent().addClass('disabled');
       </script>
      <?php }
    }
?>
<div class="margin-medium"></div>

<?php osc_current_web_theme_path('footer.php'); ?>