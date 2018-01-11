<?php
/**

DEFINES

*/
    define('FRC_THEME_VERSION', '107');

    osc_register_script('jquery', osc_base_url() . 'oc-content/themes/frclassifieds/js/vendor/jquery-1.11.3.min.js');
    osc_enqueue_script('jquery');//Jquery
    osc_register_script('jquery-ui', osc_current_web_theme_js_url('jquery-ui/jquery-ui.min.js'), 'jquery');
    osc_enqueue_script('jquery-ui');//Jquery UI
    osc_register_script('jquery-ui-touch', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js', 'jquery-ui');
    osc_enqueue_script('jquery-ui-touch');//Jquery UI Touch
    osc_register_script('jquery-uniform', osc_current_web_theme_js_url('jquery.uniform.js'), 'jquery');

    // used for date/dateinterval custom fields
    osc_enqueue_script('php-date');
    if(!OC_ADMIN) {
        osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
        osc_enqueue_style('jquery-ui-1.10.2', osc_current_web_theme_url('css/jquery-ui/jquery-ui-1.10.2.custom.min.css'));/*Imports Jquery UI style library (https://jqueryui.com/)*/

        osc_enqueue_style('jquery-ui-structure', osc_current_web_theme_url('css/jquery-ui/jquery-ui.structure.css'));/*Imports Jquery UI style library (https://jqueryui.com/)*/

        osc_enqueue_style('jquery-ui-theme-min', osc_current_web_theme_url('css/jquery-ui/jquery-ui.theme.min.css'));/*Imports Jquery UI style library (https://jqueryui.com/)*/

        osc_enqueue_style('animation', osc_current_web_theme_url('css/fr-classifieds/animation.css'));/*imports all css animation*/

        osc_enqueue_style('animation', osc_current_web_theme_url('css/fr-classifieds/animate.css'));/*imports all css animation*/

        osc_enqueue_style('bootstrap-min', osc_current_web_theme_url('css/bootstrap.min.css'));/*Imports bootstrap 3.2.0 style library (http://getbootstrap.com/)*/

        osc_enqueue_style('bootstrap-theme', osc_current_web_theme_url('css/bootstrap-theme.min.css'));/*Imports bootstrap 3.2.0 style theme library (http://getbootstrap.com/)*/

        osc_enqueue_style('bootstrap-map', osc_current_web_theme_url('css/bootstrap.css.map'));/*Imports bootstrap 3.2.0 style map library (http://getbootstrap.com/)*/

        osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/font-awesome.min.css'));/*imports fontawesome 4.2.0 style library (http://fontawesome.com)*/

        osc_enqueue_style('pixa-fonts', osc_current_web_theme_url('css/pixa-fonts.css'));/*imports pixafonts 1.0 style library (http://pixafonts.pixadrop.com)*/

        osc_enqueue_style('flag-icon', osc_current_web_theme_url('css/fr-classifieds/flag-icon.css'));/*Imports Flags icosn*/

        osc_enqueue_style('owl-carousel', osc_current_web_theme_url('css/fr-classifieds/owl.carousel.css'));/*Imports Core Owl Carousel CSS File*/

        osc_enqueue_style('owl-theme', osc_current_web_theme_url('css/fr-classifieds/owl.theme.css'));/*Imports Owl Carousel Owl Demo Theme */

        osc_enqueue_style('owl-transitions', osc_current_web_theme_url('css/fr-classifieds/owl.transitions.css'));/*Imports Owl Carousel CSS3 Transitions*/

        osc_enqueue_style('ouibounce-min', osc_current_web_theme_url('css/fr-classifieds/ouibounce.min.css'));/* OutBounce CSS */

        osc_enqueue_style('magnific-popup', osc_current_web_theme_url('css/fr-classifieds/magnific-popup.css'));/* Magnific Popup CSS */

        osc_enqueue_style('style-css', osc_current_web_theme_url('css/fr-classifieds/style.css'));/* Theme Style CSS */
    }
    osc_enqueue_script('jquery-fineuploader');


/**

THEME INSTALL OPTIONS

*/

    // install options
    if( !function_exists('frc_theme_install') ) {
        function frc_theme_install() {
            osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'frclassifieds'), 'frclassifieds');
            osc_set_preference('help-line', __('+(22)2-2222-222', 'frclassifieds'), 'frclassifieds');
            osc_set_preference('max_price',  __('1000', 'frclassifieds'), 'frclassifieds', 'INTEGER');
            osc_set_preference('min_price',  __('0', 'frclassifieds'), 'frclassifieds', 'INTEGER');
            osc_set_preference('step_range',  __('500', 'frclassifieds'), 'frclassifieds', 'INTEGER');
            osc_set_preference('version', '1.0.7', 'frclassifieds');
            osc_set_preference('theme_version', '107', 'frclassifieds', 'INTEGER');
            osc_set_preference('premium_number', '10', 'frclassifieds', 'INTEGER');
            osc_set_preference('num-popular-ads', '10', 'frclassifieds', 'INTEGER');
            osc_set_preference('copyright-info', __('2016 © All Rights Reserved', 'frclassifieds'), 'frclassifieds');
            osc_set_preference('bg_header_scroll', 'fixed', 'frclassifieds');
            osc_set_preference('bg_search_scroll', 'fixed', 'frclassifieds');
            osc_set_preference('defaultLocationShowAs', 'dropdown', 'frclassifieds');
            osc_set_preference('icon-1', 'px px-paper-bag', 'frclassifieds');
            osc_set_preference('icon-2', 'px px-car', 'frclassifieds');
            osc_set_preference('icon-3', 'px px-book', 'frclassifieds');
            osc_set_preference('icon-4', 'px px-house', 'frclassifieds');
            osc_set_preference('icon-5', 'px px-tools', 'frclassifieds');
            osc_set_preference('icon-6', 'px px-mic', 'frclassifieds');
            osc_set_preference('icon-7', 'px px-heart', 'frclassifieds');
            osc_set_preference('icon-8', 'px px-briefcase', 'frclassifieds');
            osc_reset_preferences();
        }
    }
/**

THEME UPDATE OPTIONS

*/
    // update options
    if( !function_exists('frc_theme_update') ) {
        function frc_theme_update($current_version) {
            if($current_version == 0){
                frc_theme_install();
            }
            $items = array("logo", "favicon", "bg_header", "bg_search");
            foreach($items as $item) {
                osc_delete_preference('default_'.$item, 'frclassifieds');

                $item = osc_get_preference($item, 'frclassifieds');
                $item_name     = $item;
                $temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/'.$item.'/'.$item.'/.png';
                if( file_exists( $temp_name ) && !$item) {

                    $img = ImageResizer::fromFile($temp_name);
                    $ext = $img->getExt();
                    $item_name .= '.'.$ext;
                    $img->saveToFile(osc_uploads_path().$item_name);
                    osc_set_preference($item, $item_name, 'frclassifieds');
                }

                if($current_version=='1.0.7') {
                    // add preferences
                    osc_set_preference('version', '1.0.7', 'frclassifieds');
                }
                osc_reset_preferences();
    
            }
            osc_set_preference('version', '1.0.7', 'frclassifieds');
            osc_set_preference('theme_version', '107', 'frclassifieds', 'INTEGER');
            osc_reset_preferences();
        }
    }
    if(!function_exists('check_install_frc_theme')) {
        function check_install_frc_theme() {
            $current_version = osc_get_preference('version', 'frclassifieds');
            $theme_version = osc_get_preference('theme_version', 'frclassifieds');

            //check if current version is installed or need an update<
            if( $current_version=='' ) {
                frc_theme_update(0);
            } else if($theme_version < FRC_THEME_VERSION){
                frc_theme_update($current_version);
            }
        }
    }
/*trigger function
*/
   check_install_frc_theme();
/**

LOAD THEME FILES

*/

osc_current_web_theme_path('inc/includes.inc'); 
osc_current_web_theme_path('inc/frc_settings.inc');

?>
