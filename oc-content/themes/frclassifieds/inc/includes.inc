<?php
/* ------------------------------------------------------------------------- *
 *  Load theme classes
/* ------------------------------------------------------------------------- */
  // Load user avatar class
   require_once('classes/class.body_classes.inc');
   require_once('classes/class.theme_images.inc');
   require_once('classes/class.theme_style.inc');
   require_once('classes/class.theme_js.inc');
   require_once('classes/class.social_media.inc');
   require_once('classes/class.notify.inc');
   require_once('classes/class.user_avatar.inc');
   require_once('classes/class.delete_user.inc');
   require_once('classes/class.user_location.inc');
   require_once('classes/class.user_sm.inc');
   require_once('classes/class.item_geolocation.inc');
   require_once('classes/class.facebook_user.inc');

/* ------------------------------------------------------------------------- *
 *  Helpers
/* ------------------------------------------------------------------------- */
/*
/*
/*Uploads url
/*-----------------------------------------*/
      if( !function_exists('osc_uploads_url')) {
          function osc_uploads_url($item = '') {
              
              $uploads_url = array('logo', 'favicon', 'bg_header', 'bg_search' );

              foreach ($uploads_url as $upload_url) {
                  $upload_url = osc_get_preference($upload_url, 'frclassifieds');
                  if ($upload_url != '' && file_exists(osc_uploads_path() . $upload_url)) {
                      $path = str_replace(ABS_PATH, '', osc_uploads_path() . '/');
                      return osc_base_url() . $path . $item;
                  }
              }
          }
      }

/*return nofollow construct
/*-----------------------------------------*/
    if(!function_exists('frclassifieds_nofollow_construct')) {
        /**
        * Hook for header, meta tags robots nofollos
        */
        function frclassifieds_nofollow_construct() {
            echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
            echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;

        }
    }

/*return follow construct
/*-----------------------------------------*/
    if( !function_exists('frclassifieds_follow_construct') ) {
        /**
        * Hook for header, meta tags robots follow
        */
        function frclassifieds_follow_construct() {
            echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
            echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;

        }
    }
    

/*return follow construct
/*-----------------------------------------*/
    if( !function_exists('frc_default_location_show_as') ){
        function frc_default_location_show_as(){
            return osc_get_preference('defaultLocationShowAs','frclassifieds');
        }
    }

/* ------------------------------------------------------------------------- *
 *  Theme body class
/* ------------------------------------------------------------------------- */
/*
/*
/*return body clas object
/*-----------------------------------------*/
    if(!function_exists('frclassifieds_add_body_class_construct')) {
        function frclassifieds_add_body_class_construct($classes){
            $frcBodyClass = frc_body_classes::newInstance();
            $classes = array_merge($classes, $frcBodyClass->get());
            return $classes;
        }
    }

/*Print body classes.
/*-----------------------------------------*/
    if(!function_exists('frclassifieds_body_class')) {
        function frclassifieds_body_class($echo = true){
            osc_add_filter('frclassifieds_bodyClass','frclassifieds_add_body_class_construct');
            $classes = osc_apply_filter('frclassifieds_bodyClass', array());
            if($echo && count($classes)){
                echo 'class="'.implode(' ',$classes).'"';
            } else {
                return $classes;
            }
        }
    }

/*Add new body class to body class array.
/*-----------------------------------------*/
    if(!function_exists('frclassifieds_add_body_class')) {
        function frclassifieds_add_body_class($class){
            $frcBodyClass = frc_body_classes::newInstance();
            $frcBodyClass->add($class);
        }
    }
/*Search page body class.
/*-----------------------------------------*/
    if(osc_is_home_page() || osc_is_search_page()){
       frclassifieds_add_body_class('has-searchbox');
    }
/* ------------------------------------------------------------------------- *
 *  Theme images
/* ------------------------------------------------------------------------- */
/*
/*displays favicon url
/*-----------------------------------------*/
    if( !function_exists('favicon_url') ) {
        function favicon_url() {
            $fav_url = frc_theme_images::newInstance()->frc_favicon_url();
        return $fav_url; 
        }
    }
/*displays favicon
/*-----------------------------------------*/
    if( !function_exists('show_favicon') ) {
        function show_favicon() {
            $fav = frc_theme_images::newInstance()->frc_show_favicon();
        return $fav; 
        }
    }

/*displays logo url
/*-----------------------------------------*/
    if( !function_exists('logo_url') ) {
        function logo_url() {
            $logo_url = frc_theme_images::newInstance()->frc_logo_url();
        return $logo_url; 
        }
    }
/*displays logo
/*-----------------------------------------*/
    if( !function_exists('logo_header') ) {
        function logo_header() {
           $logo = frc_theme_images::newInstance()->frc_logo_header();  
           return $logo;
        }
    }


/*displays header image url
/*-----------------------------------------*/
    if( !function_exists('bg_image_header_url') ) {
        function bg_image_header_url() {
            $image_url = frc_theme_images::newInstance()->frc_bg_header_url();
        return $image_url; 
        }
    }
/*header image preference
/*-----------------------------------------*/
    if( !function_exists('bg_header_preference') ) {
        function bg_header_preference() {
           $preference = frc_theme_images::newInstance()->frc_bg_header_preference();  
           return $preference;
        }
    }


/*displays header image url
/*-----------------------------------------*/
    if( !function_exists('bg_image_search_url') ) {
        function bg_image_search_url() {
            $image_url = frc_theme_images::newInstance()->frc_bg_search_url();
        return $image_url; 
        }
    }
/*search image preference
/*-----------------------------------------*/
    if( !function_exists('bg_search_preference') ) {
        function bg_search_preference() {
           $preference = frc_theme_images::newInstance()->frc_bg_search_preference();  
           return $preference;
        }
    }

/*header background image scroll effects
/*-----------------------------------------*/
    if( !function_exists('bg_scroll_header') ) {
        function bg_scroll_header() {
           $effects = frc_theme_images::newInstance()->frc_bg_scroll_header();  
           return $effects;
        }
    }

/*search background image scroll effects
/*-----------------------------------------*/
    if( !function_exists('bg_scroll_search') ) {
        function bg_scroll_search() {
           $effects = frc_theme_images::newInstance()->frc_bg_scroll_search();  
           return $effects;
        }
    }

/* ------------------------------------------------------------------------- *
 *  Theme Custom Style
/* ------------------------------------------------------------------------- */

/*hide/display header image
/*-----------------------------------------*/
    if( !function_exists('bg_header_height') ) {
        function bg_header_height() {
           $height = frc_theme_style::newInstance()->frc_bg_header_height();  
           return $height;
        }
    }

/*hide/display header image
/*-----------------------------------------*/
    if( !function_exists('bg_search_height') ) {
        function bg_search_height() {
           $height = frc_theme_style::newInstance()->frc_bg_search_height();  
           return $height;
        }
    }

/*custom css
/*-----------------------------------------*/
  function custom_style() {
     $style = frc_theme_style::newInstance()->frc_custom_style();  
     return $style;
  }
    osc_add_hook('header', 'custom_style');


/* ------------------------------------------------------------------------- *
 *  Theme Custom Javascript
/* ------------------------------------------------------------------------- */

/*loads in footer
/*-----------------------------------------*/
   if(!function_exists('footer_js')){
       function footer_js(){
           $output = frc_theme_js::newInstance()->onPageLoad_ScrollTop_activate(). 
                     frc_theme_js::newInstance()->scrollTo_Top_button().
                     frc_theme_js::newInstance()->animate_classes().
                     frc_theme_js::newInstance()->scrollTop_animation_activate().
                     frc_theme_js::newInstance()->google_analytics(); 

           return $output;
       }
   }
/*loads in header
/*-----------------------------------------*/
   if(!function_exists('header_js')){
       function header_js(){
           $output = frc_theme_js::newInstance()->nice_scroll_activate(); 
           return $output;
       }
   }

/* ------------------------------------------------------------------------- *
 *  Notifications
/* ------------------------------------------------------------------------- */
/*header header
/*-----------------------------------------*/
   if(!function_exists('notify_header')){
       function notify_header(){
           $output = frc_notify::newInstance()->frc_notify_top(); 
           return $output;
       }
   }

/*footer header
/*-----------------------------------------*/
   if(!function_exists('notify_footer')){
       function notify_footer(){
           $output = frc_notify::newInstance()->frc_notify_bottom().
                     frc_notify::newInstance()->frc_notify_popup_load().
                     frc_notify::newInstance()->frc_notify_popup_exit(); 
           return $output;
       }
   }
/* ------------------------------------------------------------------------- *
 *  Helpers used at view
/* ------------------------------------------------------------------------- */
/*title
/*-----------------------------------------*/
    if( !function_exists('frclassifieds_item_title') ) {
        function frclassifieds_item_title() {
            $title = osc_item_title();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('title') != "" ) {
                    $title_ = Session::newInstance()->_getForm('title');
                    if( @$title_[$locale['pk_c_code']] != "" ){
                        $title = $title_[$locale['pk_c_code']];
                    }
                }
            }
            return $title;
        }
    }
/*category icons
/*-------------------------------------------*/
    if(!function_exists('frc_category_icon')){
      function frc_category_icon($catId){
        $icon = osc_esc_html( strtolower(osc_get_preference('icon-'.$catId, 'frclassifieds') ) );
        if($icon!="")
        return strtolower($icon);
        else
        return "px px-trolley";
      }
    }
/*description
/*-----------------------------------------*/
    if( !function_exists('frclassifieds_item_description') ) {
        function frclassifieds_item_description() {
            $description = osc_item_description();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('description') != "" ) {
                    $description_ = Session::newInstance()->_getForm('description');
                    if( @$description_[$locale['pk_c_code']] != "" ){
                        $description = $description_[$locale['pk_c_code']];
                    }
                }
            }
            return $description;
        }
    }
/*Conatc page
/*-----------------------------------------*/
    if( !function_exists('osc_is_contact_page') ) {
        function osc_is_contact_page() {
            if( Rewrite::newInstance()->get_location() === 'contact' ) {
                return true;
            }

            return false;
        }
    }
/*breadcrumb
/*-----------------------------------------*/
    if( !function_exists('get_breadcrumb_lang') ) {
        function get_breadcrumb_lang() {
            $lang = array();
            $lang['item']               = __('View a listing', 'frclassifieds');
            return $lang;
        }
    }
/* ------------------------------------------------------------------------- *
 *  Number of Premium ads to show
/* ------------------------------------------------------------------------- */
  function premium_num_ads() {
      $num = osc_get_preference('premium_number', 'frclassifieds');
      if($num!='' && $num == osc_get_preference('premium_number', 'frclassifieds') ){
         return(osc_get_preference('premium_number', 'frclassifieds')) ;
      }else{
         return 10;
      }
      
  }
/* ------------------------------------------------------------------------- *
 *  Number of Popular ads to show
/* ------------------------------------------------------------------------- */
    function popular_num_ads() {
        $num = osc_get_preference('num-popular-ads', 'frclassifieds');
        if($num!='' && $num == osc_get_preference('num-popular-ads', 'frclassifieds') ){
           return(osc_get_preference('num-popular-ads', 'frclassifieds')) ;
        }else{
           return 10;
        }       
    }
/* ------------------------------------------------------------------------- *
 *  Number of Related ads to show
/* ------------------------------------------------------------------------- */
    function related_num_ads() {
        $num = osc_get_preference('num-related-ads', 'frclassifieds');
        if($num!='' && $num == osc_get_preference('num-related-ads', 'frclassifieds') ){
           return(osc_get_preference('num-related-ads', 'frclassifieds')) ;
        }else{
           return 10;
        }
        
    }
/* ------------------------------------------------------------------------- *
 *  Search listings
/* ------------------------------------------------------------------------- */
  if( !function_exists('frc_search_number') ) {
        function frc_search_number() {
            $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);
            $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());
            if( $search_to > osc_search_total_items() ) {
                $search_to = osc_search_total_items();
            }

            return array(
                'from' => $search_from,
                'to'   => $search_to,
                'of'   => osc_search_total_items()
            );
        }
  }
/* ------------------------------------------------------------------------- *
 *  Popular listings
/* ------------------------------------------------------------------------- */
    if(!function_exists('popular_listings')){
        function popular_listings(){
             $popularItems = Item::newInstance()->mostViewed(popular_num_ads()) ;
             View::newInstance()->_exportVariableToView("customItems", $popularItems);
        }
    }
/* ------------------------------------------------------------------------- *
 *  Related listings
/* ------------------------------------------------------------------------- */
    if( !function_exists('related_listings') ) {
        function related_listings() {
            $num_related_ads = related_num_ads(); 
            View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addRegion(osc_item_region());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', $num_related_ads);

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == $num_related_ads ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', $num_related_ads);

            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            return 0;
        }
    }

/* ------------------------------------------------------------------------- *
 *  Instantiate location functions
/* ------------------------------------------------------------------------- */
/*
/*Displays user Geolocation
/*-----------------------------------------*/
    if(!function_exists('user_geolocation')){
      function user_geolocation(){
          
          $geolocation = frc_user_location::newInstance()->frc_user_geolocation();

          return $geolocation;

      }
    }
/*User change loaction
/*-----------------------------------------*/
    if(!function_exists('set_location')){
      function set_location(){
          
          frc_user_location::newInstance()->frc_user_set_location();

          return false;

      }
    }
/*Displays user set country loaction
/*-----------------------------------------*/
    if(!function_exists('get_country_location')){
      function get_country_location(){
          
          $country = frc_user_location::newInstance()->frc_get_user_location_country_name();

          if($country !=''){
              return $country;
          }else{
             $country = frc_user_location::newInstance()->frc_user_geolocation();
             return $country ;
          }
           
      }
    }

/*Displays listing country name
/*-----------------------------------------*/
    if(!function_exists('get_listed_country_location')){
      function get_listed_country_location(){
          
          $country_name = frc_user_location::newInstance()->frc_get_user_location_country_name();

          if($country_name !=''){
              return $country_name;
          }else{
             $country_name = frc_user_location::newInstance()->frc_user_geolocation();
             $countries = Country::newInstance()->listAll();
             if(count($countries) > 0 ) {
                foreach($countries as $country) { 
                    if($country['s_name'] == $country_name){
                       
                       return $country['s_name'];
                    }
                  
                }
            }
          } 

          return false;    
      }
    }

/*Displays user set region loaction
/*-----------------------------------------*/
    if(!function_exists('get_region_location')){
      function get_region_location(){
          
          $location = frc_user_location::newInstance()->frc_get_user_location_region();

          return $location;

      }
    }
/*Displays user set country code
/*-----------------------------------------*/
    if(!function_exists('get_user_country_code')){
      function get_user_country_code(){
          
          $country = frc_user_location::newInstance()->frc_get_user_location_country_name();

          if($country !=''){
              $code = frc_user_location::newInstance()->frc_get_user_location_country_code();
              return $code;
          }else{
             $code = frc_user_location::newInstance()->frc_get_user_default_country_code();
             return $code ;
          }

      }
    }
/* ------------------------------------------------------------------------- *
 *  Instantiate multiple category functions
/* ------------------------------------------------------------------------- */

/*Category multiple category id
/*-----------------------------------------*/
    if(!function_exists('frc_item_selected_category_id')){
      function frc_item_selected_category_id () {
              $category_id = Params::getParam('catId') ;
              if(Session::newInstance()->_getForm('catId') != ""){
                  $category_id = Session::newInstance()->_getForm('catId') ;
              }

              if( osc_item() != null ) {
                  $item        = osc_item() ;
                  $category_id = $item['fk_i_category_id'] ;
              }
              
              if( empty($category_id) ) {
                  return "null" ;
              }
              
              if( method_exists( Category::newInstance(), 'is_root' ) ) {
                  if( !Category::newInstance()->is_root($category_id) ) {
                      $category = Category::newInstance()->findRootCategory($category_id) ;
                      return $category['pk_i_id'];
                  }
              } else {
                  if( !Category::newInstance()->isRoot($category_id) ) {
                      $category = Category::newInstance()->findRootCategory($category_id) ;
                      return $category['pk_i_id'];
                  }
              }
              
              return $category_id ;
        }
    }


/*Category multiple subcategory id
/*-----------------------------------------*/
    if(!function_exists('frc_item_selected_subcategory_id')){
      function frc_item_selected_subcategory_id () {
          $category_id = Params::getParam('catId') ;
          if(Session::newInstance()->_getForm('catId') != ""){
              $category_id = Session::newInstance()->_getForm('catId') ;
          }

          if( osc_item() != null ) {
              $item        = osc_item() ;
              $category_id = $item['fk_i_category_id'] ;
          }
          
          if( empty($category_id) ) {
              return "null" ;
          }

          if( method_exists( Category::newInstance(), 'is_root' ) ) {
              if( Category::newInstance()->is_root($category_id) ) {
                  return "null" ;
              }
          } else {
              if( Category::newInstance()->isRoot($category_id) ) {
                  return "null" ;
              }
          }

          return $category_id ;
      }
    }
    
/*Category multiple select js
/*-----------------------------------------*/
    if(!function_exists('frc_item_category_select_js')){
      function frc_item_category_select_js() {
          ?>
              <script type="text/javascript">
                  frc_theme.categories = {} ;
              <?php
              $aCategories = osc_get_categories() ;
              foreach($aCategories as $category) {
                  if( is_array($category['categories']) && (count($category['categories']) > 0) ) {
                      echo 'frc_theme.categories.id_' . $category['pk_i_id'] . ' = {' . PHP_EOL ;
                      for($i = 0; $i < count($category['categories']); $i++) {
                          echo $category['categories'][$i]['pk_i_id'] . ': { id: ' . $category['categories'][$i]['pk_i_id'] . ', slug: "' . addslashes($category['categories'][$i]['s_slug']) . '", name: "' . addslashes($category['categories'][$i]['s_name']) . '"' ;
                          if( $i == (count($category['categories']) - 1) ) {
                              echo '}' . PHP_EOL ;
                          } else {
                              echo '} ,' . PHP_EOL ;
                          }
                      }
                      echo '} ;' ;
                  } else {
                      echo 'frc_theme.categories.' . $category['s_slug'] . ' = { } ;' . PHP_EOL  ;
                  }
              }
              ?>
              </script>
          <?php
      }
    }


/*Outputs category multiple select
/*-----------------------------------------*/
    if(!function_exists('frc_item_category_select')){
      function frc_item_category_select($default_option) {
          $categories = Category::newInstance()->findRootCategoriesEnabled() ; ?>
          <?php if( count($categories) > 0 ) { ?>
          <div class="col-sm-6">
              <label for="select_1" class="form-label"><?php _e('Category', 'frclassifieds')?></label>
              <div class="form-group form-select">
                  <div class="form-control border-radious-none">
                      <span> <?php _e('Select a category', 'frclassifieds'); ?></span>
                      <select class="category">
                          <option><?php echo $default_option ; ?></option>
                          <?php foreach($categories as $c) { ?>
                          <option value="<?php echo $c['pk_i_id'] ; ?>"><?php echo $c['s_name'] ; ?></option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
          </div>
          <div class="col-sm-6">
              <label for="select_2" class="form-label"><?php _e('Sub-Category', 'frclassifieds')?></label>
              <div class="form-group form-select subcat">
                  <div class="form-control border-radious-none disabled">
                      <span> <?php _e('Select a subcategory...', 'frclassifieds'); ?></span>
                      <select class="subcategory" name="catId" style="display:none"></select>
                  </div>
              </div>
          </div>
          <?php } ?>
          <?php
      }
    }

/* ------------------------------------------------------------------------- *
 *  Instantiate Item Location Cordinates
/* ------------------------------------------------------------------------- */
/*
/*  Create Items location cordnates
/* ------------------------------------ */
  function item_cordinates(){
        
         frc_item_geolacation::newInstance()->frc_item_geolocation(osc_item());
  }
  osc_add_hook('location', 'item_cordinates');

/*  Item location geocode
/* ------------------------------------ */
  function item_geocode($item){
        
         $itemId = $item['pk_i_id'];
         frc_item_geolacation::newInstance()->frc_insert_geo_location($itemId);
  }
  osc_add_hook('posted_item', 'item_geocode');
    osc_add_hook('edited_item', 'item_geocode');


/* ------------------------------------------------------------------------- *
 *  Social media
/* ------------------------------------------------------------------------- */
/*  Sharing
/* ------------------------------------ */
    if(!function_exists('social_media_sharing')){
        function social_media_sharing(){
           $output = frc_social_media::newInstance()->frc_social_media_sharing();
           return $output;
        }
    }

/*  Links
/* ------------------------------------ */
   if(!function_exists('social_media_links')){
        function social_media_links(){
           $output = frc_social_media::newInstance()->frc_social_media_links();
           return $output;
        }
    }

/* ------------------------------------------------------------------------- *
 *  Social Media Register/Login
/* ------------------------------------------------------------------------- */

/*
/*facebook register
/*-----------------------------------------*/
    if(!function_exists('facebook_login')) {
        function facebook_login(){
            $output = frc_facebook_user::newInstance()->login_button();
            return $output;
        }
    }

/*facebook login
/*-----------------------------------------*/
    if(!function_exists('facebook_register')) {
        function facebook_register(){
            $output = frc_facebook_user::newInstance()->register_button();
            return $output;
        }
    }

/* ------------------------------------------------------------------------- *
 *  Instantiate User Social Media Links functions
/* ------------------------------------------------------------------------- */

/*  Create social media links table
/* ------------------------------------ */
  if(osc_user_registration_enabled()) { 
        $conn = getConnection() ;
        $conn->autocommit(false);
        try {
            $path = osc_themes_path().'frclassifieds/inc/setup/struct.sql';
            $sql = file_get_contents($path);
            $conn->osc_dbImportSQL($sql);
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }
        $conn->autocommit(true);
    }//extend user fields

/*  Create social media links
/* ------------------------------------ */
    if(!function_exists('insert_user_sm_links')){
    function insert_user_sm_links($userid){
        
        //$user_id = $userid['pk_i_id'];//gets the current user id
        frc_user_sm_links::newInstance()->frc_insert_user_sm_links($userid);

        return false;

    }
    }
    osc_add_hook('user_edit_completed','insert_user_sm_links');

/*  Genarate User facebook  Links
/* ------------------------------------ */
    if(!function_exists('user_fb_link')){
    function user_fb_link($userid){
        
        $user_id = $userid['pk_i_id'];//gets the current user id

        $link = frc_user_sm_links::newInstance()->frc_user_fb_link($user_id);

        return $link;

    }
    }


/*  Genarate User twitter  Link
/* ------------------------------------ */
    if(!function_exists('user_tw_link')){
    function user_tw_link($userid){
        
        $user_id = $userid['pk_i_id'];//gets the current user id

        $link = frc_user_sm_links::newInstance()->frc_user_tw_link($user_id);

        return $link;

    }
    }


/*  Genarate User LinkedIn  Link
/* ------------------------------------ */
    if(!function_exists('user_lk_link')){
    function user_lk_link($userid){
        
        $user_id = $userid['pk_i_id'];//gets the current user id

        $link = frc_user_sm_links::newInstance()->frc_user_lk_link($user_id);

        return $link;

    }
    }

/*  Genarate User google plus  Link
/* ------------------------------------ */
    if(!function_exists('user_gl_link')){
    function user_gl_link($userid){
        
        $user_id = $userid['pk_i_id'];//gets the current user id

        $link = frc_user_sm_links::newInstance()->frc_user_gl_link($user_id);

        return $link;

    }
    }



/*  Display User Social Media Links
/* ------------------------------------ */
    if(!function_exists('user_sm_profiles')){
    function user_sm_profiles($userid){
        
        $user_id = $userid['pk_i_id'];//gets the current user id

        $output = frc_user_sm_links::newInstance()->frc_user_sm_profiles($user_id); 

        return $output;

    }
    }
/* ------------------------------------------------------------------------- *
 *  Instantiate User Avatar functions
/* ------------------------------------------------------------------------- */
/*
/*  Delete user
/* ------------------------------------ */
    if( !function_exists('delete_user_js') ) {
        function delete_user_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();
            if( ($location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items'))) || (Params::getParam('page') ==='custom' && Params::getParam('in_user_menu')==true ) ) {
                osc_enqueue_script('delete-user-js');
            }
        }
        osc_add_hook('footer', 'delete_user_js', 1);
    }

/*  User info
/* ------------------------------------ */
    if( !function_exists('user_info_js') ) {
        function user_info_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();

            if( $location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items')) ) {
                $user = User::newInstance()->findByPrimaryKey( Session::newInstance()->_get('userId') );
                View::newInstance()->_exportVariableToView('user', $user);
                ?>
<script type="text/javascript">
    frclassifieds.user = {};
    frclassifieds.user.id = '<?php echo osc_user_id(); ?>';
    frclassifieds.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
            <?php }
        }
        osc_add_hook('header', 'user_info_js');
    }
/* ------------------------------------------------------------------------- *
 *  Instantiate User Avatar functions
/* ------------------------------------------------------------------------- */
/*
/*  User avatar url
/* ------------------------------------ */
    if(!function_exists('user_avatar_url')){
       function user_avatar_url($user_id){
         $url = frc_user_avatar::newInstance()->frc_user_avatar_url($user_id);
         return $url;
       }
    }

/*User author avatar url
/*-----------------------------------------*/
    if(!function_exists('user_avatar_dir')){
      function user_avatar_dir($userid){
          
          //$user_id = $userid['pk_i_id'];//gets the current user id
          frc_user_avatar::newInstance()->frc_user_avatar_create_dir($userid);

          return false;
          
      }
    }
    osc_add_hook('user_register_completed','user_avatar_dir');

/*User author avatar url
/*-----------------------------------------*/
    if(!function_exists('user_upload_avatar')){
      function user_upload_avatar($userid){
          
          //$user_id = $userid['pk_i_id'];//gets the current user id
          frc_user_avatar::newInstance()->frc_upload_user_avatar($userid);

          return false;

      }
    }
    osc_add_hook('user_edit_completed','user_upload_avatar');

/*Delete user
/*-----------------------------------------*/
    if(!function_exists('delete_user')){
      function delete_user(){
          $user = '';
          $user_id = '';
          
          if(!OC_ADMIN){
            $user = osc_user();
            $user_id = $user['pk_i_id'];//gets the current user id

          }else{
            $user = Params::getParam('id');
            $user_id =  $user['0'];

          }
          frc_delete_user::newInstance()->frc_user_avatar_del_dir($user_id);
          frc_delete_user::newInstance()->frc_user_drop_row($user_id);

          return false;

      }
    }
    osc_add_hook('delete_user','delete_user');

/*Redirect after publishing item
/*-----------------------------------------*/
function redirect_after_publish($item) {

    $page = '';

    if($page != ''){
      osc_get_static_page($page);
      header('Location: ' . osc_static_page_url()); exit;
    }else{
      View::newInstance()->_exportVariableToView('item', $item);
      header('Location: ' . osc_item_url()); exit;
    }

}
osc_add_hook('posted_item', 'redirect_after_publish');
osc_add_hook('edited_item', 'redirect_after_publish');

?>