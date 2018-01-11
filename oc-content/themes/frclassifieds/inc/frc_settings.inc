<?php
/*
/*
/* ------------------------------------------------------------------------- *
 *  Theme Settings
/* ------------------------------------------------------------------------- */

function theme_frclassifieds_actions_admin() {

        osc_enqueue_script('jquery');
        //REGISTER AND ENQUEUE SETTINGS PAGE SCRIPTS
        osc_register_script('admin-settings-js', osc_base_url() . 'oc-content/themes/frclassifieds/admin/js/settings.js', 'jquery');
        osc_enqueue_script('admin-settings-js');
        //REGISTER AND ENQUEUE SETTING PAGE STYLE
        osc_enqueue_style('settings-css', osc_base_url() . 'oc-content/themes/frclassifieds/admin/settings.css');
        osc_enqueue_style('settings-css', osc_base_url() . 'oc-content/themes/frclassifieds/admin/css/main.css'); 
        
        //if(OC_ADMIN)
        switch( Params::getParam('action_specific') ) {
            case('global-settings'):
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'frclassifieds');
                osc_set_preference('max_price', Params::getParam('max_price'), 'frclassifieds', 'INTEGER');
                osc_set_preference('min_price', Params::getParam('min_price'), 'frclassifieds', 'INTEGER');
                osc_set_preference('step_range', Params::getParam('step_range'), 'frclassifieds', 'INTEGER');
                osc_set_preference('copyright-info', Params::getParam('copyright-info'), 'frclassifieds');
                osc_set_preference('copyright-link', Params::getParam('copyright-link'), 'frclassifieds');
                osc_set_preference('copyright-link-text', Params::getParam('copyright-link-text'), 'frclassifieds');
                osc_set_preference('hide-copyright-info', Params::getParam('hide-copyright-info'), 'frclassifieds');
                osc_set_preference('help-line', Params::getParam('help-line'), 'frclassifieds');
                osc_set_preference('hide-help-line', Params::getParam('hide-help-line'), 'frclassifieds');
                osc_set_preference('terms-link', Params::getParam('terms-link'), 'frclassifieds');
                osc_set_preference('terms-link-activate', Params::getParam('terms-link-activate'), 'frclassifieds');
                osc_set_preference('hide-contact-link', Params::getParam('hide-contact-link'), 'frclassifieds');
                osc_set_preference('premium_number',       trim(Params::getParam('premium_number', false, false, false)), 'frclassifieds');
                osc_set_preference('num-popular-ads',       trim(Params::getParam('num-popular-ads', false, false, false)), 'frclassifieds');
                osc_set_preference('num-related-ads',       trim(Params::getParam('num-related-ads', false, false, false)), 'frclassifieds');
                osc_set_preference('show-locations', Params::getParam('show-locations'), 'frclassifieds');
                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'frclassifieds');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));


                osc_set_preference('defaultLocationShowAs', Params::getParam('defaultLocationShowAs'), 'frclassifieds');

                osc_add_flash_ok_message(__('Theme settings updated correctly', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('logo_items'):
                osc_set_preference('logo-preferences', Params::getParam('logo-preferences'), 'frclassifieds');
                osc_reset_preferences(); 
                if('logo'){
                    $package = Params::getFiles('logo');
                    if( $package['error'] == UPLOAD_ERR_OK ) {
                        $img = ImageResizer::fromFile($package['tmp_name']);
                        $ext = $img->getExt();
                        $logo_name     = 'logo';
                        $logo_name    .= '.'.$ext;
                        $path = osc_uploads_path() . $logo_name ; 
                        $img->saveToFile($path);

                        osc_set_preference('logo', $logo_name, 'frclassifieds');

                        osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'frclassifieds'), 'admin');
                    }

                }
                if ('favicon') {
                    $package = Params::getFiles('favicon');
                    if( $package['error'] == UPLOAD_ERR_OK ) {
                        $img = ImageResizer::fromFile($package['tmp_name']);
                        $ext = $img->getExt();
                        $favicon_name     = 'favicon';
                        $favicon_name    .= '.'.$ext;
                        $path = osc_uploads_path() . $favicon_name ;
                        $img->saveToFile($path);

                        osc_set_preference('favicon', $favicon_name, 'frclassifieds');

                        osc_add_flash_ok_message(__('The favicon has been uploaded correctly', 'frclassifieds'), 'admin');
                    }
                }if(!'favicon' && 'logo'){
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'frclassifieds'), 'admin');
                }
                
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('bg_items'):
                osc_set_preference('bg_header_prefence', Params::getParam('bg_header_prefence'), 'frclassifieds');
                osc_set_preference('bg_header_scroll', Params::getParam('bg_header_scroll'), 'frclassifieds');
                osc_set_preference('bg_search_scroll', Params::getParam('bg_search_scroll'), 'frclassifieds');
                osc_reset_preferences();
                if ('bg_header') {
                    $package = Params::getFiles('bg_header');
                    if( $package['error'] == UPLOAD_ERR_OK ) {
                        $img = ImageResizer::fromFile($package['tmp_name']);
                        $ext = $img->getExt();
                        $item_name     = 'bg_header';
                        $item_name    .= '.'.$ext;
                        $path = osc_uploads_path() . $item_name ;
                        $img->saveToFile($path);

                        osc_set_preference('bg_header', $item_name, 'frclassifieds');

                        osc_add_flash_ok_message(__('The Image has been uploaded correctly', 'frclassifieds'), 'admin');
                    }
                }
                if ('bg_search') {
                    $package = Params::getFiles('bg_search');
                    if( $package['error'] == UPLOAD_ERR_OK ) {
                        $img = ImageResizer::fromFile($package['tmp_name']);
                        $ext = $img->getExt();
                        $item_name     = 'bg_search';
                        $item_name    .= '.'.$ext;
                        $path = osc_uploads_path() . $item_name ;
                        $img->saveToFile($path);

                        osc_set_preference('bg_search', $item_name, 'frclassifieds');

                        osc_add_flash_ok_message(__('The Image has been uploaded correctly', 'frclassifieds'), 'admin');
                    }
                }
                if(!'bg_header' && 'bg_search' ){
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'frclassifieds'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('remove'):
                if(Params::getParam('item') == 'logo'){
                    $logo = osc_get_preference('logo','frclassifieds');
                    $path = osc_uploads_path() . $logo ;
                    if(file_exists( $path ) ) {
                        @unlink( $path );
                        osc_delete_preference('logo','frclassifieds');
                        osc_reset_preferences();
                    } else {
                        osc_add_flash_error_message(__("Logo not found", 'frclassifieds'), 'admin');
                    }

                }elseif(Params::getParam('item') == 'favicon'){
                    $favicon = osc_get_preference('favicon','frclassifieds');
                    $path = osc_uploads_path() . $favicon ;
                    if(file_exists( $path ) ) {
                        @unlink( $path );
                        osc_delete_preference('favicon','frclassifieds');
                        osc_reset_preferences();
                    } else {
                        osc_add_flash_error_message(__("favicon not found", 'frclassifieds'), 'admin');
                    }

                }elseif(Params::getParam('item') == 'bg_header'){
                    $bg_header = osc_get_preference('bg_header','frclassifieds');
                    $path = osc_uploads_path() . $bg_header ;
                    if(file_exists( $path ) ) {
                        @unlink( $path );
                        osc_delete_preference('bg_header','frclassifieds');
                        osc_reset_preferences();
                    } else {
                        osc_add_flash_error_message(__("Image not found", 'frclassifieds'), 'admin');
                    }
                }
                elseif(Params::getParam('item') == 'bg_search'){
                    $bg_search = osc_get_preference('bg_search','frclassifieds');
                    $path = osc_uploads_path() . $bg_search ;
                    if(file_exists( $path ) ) {
                        @unlink( $path );
                        osc_delete_preference('bg_search','frclassifieds');
                        osc_reset_preferences();
                    } else {
                        osc_add_flash_error_message(__("Image not found", 'frclassifieds'), 'admin');
                    }
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('layout_settings'):
                osc_set_preference('theme-color',       trim(Params::getParam('theme-color', false, false, false)), 'frclassifieds');
                osc_set_preference('smooth-scroll-activate',       trim(Params::getParam('smooth-scroll-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('scroll-top-activate',       trim(Params::getParam('scroll-top-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('scrollTop-On-Page-load-activate',       trim(Params::getParam('scrollTop-On-Page-load-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('load-content-on-scroll-activate',       trim(Params::getParam('load-content-on-scroll-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('theme-color-custom',       trim(Params::getParam('theme-color-custom', false, false, false)), 'frclassifieds');
                osc_set_preference('css-animations',       trim(Params::getParam('css-animations', false, false, false)), 'frclassifieds');
                osc_set_preference('custom-css-style',       trim(Params::getParam('custom-css-style', false, false, false)), 'frclassifieds');
                osc_set_preference('google-fonts',       trim(Params::getParam('google-fonts', false, false, false)), 'frclassifieds');

                osc_add_flash_ok_message(__('Settings updated Succesfully', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('ads_settings'):
                osc_set_preference('home-page-sidebar',       trim(Params::getParam('home-page-sidebar', false, false, false)), 'frclassifieds');
                osc_set_preference('home-page-center',         trim(Params::getParam('home-page-center', false, false, false)),  'frclassifieds');
                osc_set_preference('search-page-top',       trim(Params::getParam('search-page-top', false, false, false)),  'frclassifieds');
                osc_set_preference('search-page-bottom',     trim(Params::getParam('search-page-bottom', false, false, false)),  'frclassifieds');
                osc_set_preference('single-page-sidebar',  trim(Params::getParam('single-page-sidebar', false, false, false)),  'frclassifieds');

                osc_add_flash_ok_message(__('Settings updated Succesfully', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('advanced_settings'):
                osc_set_preference('show-rss-link',       trim(Params::getParam('show-rss-link', false, false, false)), 'frclassifieds');
                osc_set_preference('facebook-link',       trim(Params::getParam('facebook-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-facebook-link',       trim(Params::getParam('show-facebook-link', false, false, false)), 'frclassifieds');
                osc_set_preference('twitter-link',       trim(Params::getParam('twitter-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-twitter-link',       trim(Params::getParam('show-twitter-link', false, false, false)), 'frclassifieds');
                osc_set_preference('google-plus-link',       trim(Params::getParam('google-plus-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-google-plus-link',       trim(Params::getParam('show-google-plus-link', false, false, false)), 'frclassifieds');
                osc_set_preference('linkedin-link',       trim(Params::getParam('linkedin-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-linkedin-link',       trim(Params::getParam('show-linkedin-link', false, false, false)), 'frclassifieds');
                osc_set_preference('dribble-link',       trim(Params::getParam('dribble-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-dribble-link',       trim(Params::getParam('show-dribble-link', false, false, false)), 'frclassifieds');
                osc_set_preference('pinterest-link',       trim(Params::getParam('pinterest-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-pinterest-link',       trim(Params::getParam('show-pinterest-link', false, false, false)), 'frclassifieds');
                osc_set_preference('youtube-link',       trim(Params::getParam('youtube-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-youtube-link',       trim(Params::getParam('show-youtube-link', false, false, false)), 'frclassifieds');
                osc_set_preference('tumblr-link',       trim(Params::getParam('tumblr-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-tumblr-link',       trim(Params::getParam('show-tumblr-link', false, false, false)), 'frclassifieds');
                osc_set_preference('flickr-link',       trim(Params::getParam('flickr-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-flickr-link',       trim(Params::getParam('show-flickr-link', false, false, false)), 'frclassifieds');
                osc_set_preference('stumbleupon-link',       trim(Params::getParam('stumbleupon-link', false, false, false)), 'frclassifieds');
                osc_set_preference('show-stumbleupon-link',       trim(Params::getParam('show-stumbleupon-link', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-facebook',       trim(Params::getParam('share-on-facebook', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-twitter',       trim(Params::getParam('share-on-twitter', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-google-plus',       trim(Params::getParam('share-on-google-plus', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-linkedin',       trim(Params::getParam('share-on-linkedin', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-pinterest',       trim(Params::getParam('share-on-pinterest', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-tumblr',       trim(Params::getParam('share-on-tumblr', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-stumbleupon',       trim(Params::getParam('share-on-stumbleupon', false, false, false)), 'frclassifieds');
                osc_set_preference('share-on-email',       trim(Params::getParam('share-on-email', false, false, false)), 'frclassifieds');
                osc_set_preference('share-with-friend',       trim(Params::getParam('share-with-friend', false, false, false)), 'frclassifieds');
                osc_set_preference('google-analytics',       trim(Params::getParam('google-analytics', false, false, false)), 'frclassifieds');

                osc_add_flash_ok_message(__('Settings updated Succesfully', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('notify_settings'):
                osc_set_preference('header-notify-content',       trim(Params::getParam('header-notify-content', false, false, false)), 'frclassifieds');
                osc_set_preference('header-notify-activate',       trim(Params::getParam('header-notify-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('header-notify-bg',       trim(Params::getParam('header-notify-bg', false, false, false)), 'frclassifieds');
                osc_set_preference('footer-notify-content',       trim(Params::getParam('footer-notify-content', false, false, false)), 'frclassifieds');
                osc_set_preference('footer-notify-activate',       trim(Params::getParam('footer-notify-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('footer-notify-bg',       trim(Params::getParam('footer-notify-bg', false, false, false)), 'frclassifieds');
                osc_set_preference('on-load-notify-title',       trim(Params::getParam('on-load-notify-title', false, false, false)), 'frclassifieds');
                osc_set_preference('on-load-notify-footer',       trim(Params::getParam('on-load-notify-footer', false, false, false)), 'frclassifieds');
                osc_set_preference('on-load-notify-content',       trim(Params::getParam('on-load-notify-content', false, false, false)), 'frclassifieds');
                osc_set_preference('on-load-notify-activate',       trim(Params::getParam('on-load-notify-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('on-load-notify-bg',       trim(Params::getParam('on-load-notify-bg', false, false, false)), 'frclassifieds');
                osc_set_preference('on-exit-notify-title',       trim(Params::getParam('on-exit-notify-title', false, false, false)), 'frclassifieds');
                osc_set_preference('on-exit-notify-footer',       trim(Params::getParam('on-exit-notify-footer', false, false, false)), 'frclassifieds');
                osc_set_preference('on-exit-notify-content',       trim(Params::getParam('on-exit-notify-content', false, false, false)), 'frclassifieds');
                osc_set_preference('on-exit-notify-activate',       trim(Params::getParam('on-exit-notify-activate', false, false, false)), 'frclassifieds');
                osc_set_preference('on-exit-notify-bg',       trim(Params::getParam('on-exit-notify-bg', false, false, false)), 'frclassifieds');
                osc_set_preference('header-notify-bg-custom',       trim(Params::getParam('header-notify-bg-custom', false, false, false)), 'frclassifieds');
                osc_set_preference('footer-notify-bg-custom',       trim(Params::getParam('footer-notify-bg-custom', false, false, false)), 'frclassifieds');                
                osc_set_preference('on-exit-notify-bg-custom',       trim(Params::getParam('on-exit-notify-bg-custom', false, false, false)), 'frclassifieds');
                osc_set_preference('on-load-notify-bg-custom',       trim(Params::getParam('on-load-notify-bg-custom', false, false, false)), 'frclassifieds');
                osc_set_preference('useful-information',       trim(Params::getParam('useful-information', false, false, false)), 'frclassifieds');
                osc_set_preference('useful-information-activate',       trim(Params::getParam('useful-information-activate', false, false, false)), 'frclassifieds');             

                osc_add_flash_ok_message(__('Settings updated Succesfully', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('category_icons'):
                $categories = Category::newInstance()->toTreeAll();
                foreach($categories as $c) { 
                   osc_set_preference('icon-' . $c['pk_i_id'],       trim(Params::getParam('icon-' . $c['pk_i_id'], false, false, false)), 'frclassifieds');
                }
                osc_add_flash_ok_message(__('Settings updated Succesfully', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'));
            break;
            case('payment-settings'):
                osc_set_preference('paypal-enable',       trim(Params::getParam('paypal-enable', false, false, false)), 'frclassifieds'); 
                osc_set_preference('checkout-enable',       trim(Params::getParam('checkout-enable', false, false, false)), 'frclassifieds');
                osc_set_preference('money-bookers-enable',       trim(Params::getParam('money-bookers-enable', false, false, false)), 'frclassifieds');
                osc_set_preference('world-pay-enable',       trim(Params::getParam('world-pay-enable', false, false, false)), 'frclassifieds');
                osc_set_preference('payza-enable',       trim(Params::getParam('payza-enable', false, false, false)), 'frclassifieds');
                osc_set_preference('cc-avenue-enable',       trim(Params::getParam('cc-avenue-enable', false, false, false)), 'frclassifieds');
                osc_set_preference('webpay-enable',       trim(Params::getParam('webpay-enable', false, false, false)), 'frclassifieds');            

                osc_add_flash_ok_message(__('Settings updated Succesfully', 'frclassifieds'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php#tab8'));
            break;
        }
    }

    function frclassifieds_delete() {
        Preference::newInstance()->delete(array('s_section' => 'frclassifieds'));
    }

    osc_add_hook('init_admin', 'theme_frclassifieds_actions_admin');
    osc_add_hook('theme_delete_frclassifieds', 'frclassifieds_delete');
    osc_admin_menu_appearance(__('FRCLASSIFIEDS', 'frclassifieds'), osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'), 'frclassifieds_settings');

?>