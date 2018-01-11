<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    define('BRASIL_THEME_VERSION', '3.1.0');

    osc_enqueue_script('php-date');

    if( !OC_ADMIN ) {
        if( !function_exists('add_close_button_action') ) {
            function add_close_button_action(){
                echo '<script type="text/javascript">';
                    echo '$(".flashmessage .ico-close").click(function(){';
                        echo '$(this).parent().hide();';
                    echo '});';
                echo '</script>';
            }
            osc_add_hook('footer', 'add_close_button_action');
        }
    }
    
    osc_add_hook('init_admin', 'theme_brasil_actions_admin');
    function theme_brasil_actions_admin() {
        if( Params::getParam('file') == 'oc-content/themes/brasil/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'brasil');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $footerLink  = Params::getParam('footer_link');
                $defaultLogo = Params::getParam('default_logo');
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'brasil');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'brasil');
                osc_set_preference('default_logo', ($defaultLogo ? '1' : '0'), 'brasil');

                osc_set_preference('defaultLocationShowAs', Params::getParam('defaultLocationShowAs'), 'brasil');
                echo Params::getParam('defaultLocationShowAs') . "...";

                osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'brasil');
                osc_set_preference('homepage-728x90',       trim(Params::getParam('homepage-728x90', false, false, false)),                'brasil');
                osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'brasil');
                osc_set_preference('search-results-top-728x90',     trim(Params::getParam('search-results-top-728x90', false, false, false)),          'brasil');
                osc_set_preference('search-results-middle-728x90',  trim(Params::getParam('search-results-middle-728x90', false, false, false)),       'brasil');

                osc_add_flash_ok_message(__('Theme settings updated correctly', 'brasil'), 'admin');
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/brasil/admin/settings.php')); exit;
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                        osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'brasil'), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again", 'brasil'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'brasil'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/brasil/admin/header.php')); exit;
            break;
            case('remove'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    @unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" );
                    osc_add_flash_ok_message(__('The logo image has been removed', 'brasil'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'brasil'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/brasil/admin/header.php')); exit;
            break;
        }
    }

    if( !function_exists('logo_header') ) {
        function logo_header() {
            $html = '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/logo.jpg') . '" />';
            if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                return $html;
            } else if( osc_get_preference('default_logo', 'brasil') && (file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/default-logo.jpg")) ) {
                return '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/default-logo.jpg') . '" />';
            } else {
                return osc_page_title();
            }
        }
    }

    // install update options
    if( !function_exists('brasil_theme_install') ) {
        function brasil_theme_install() {
            osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'brasil'), 'brasil');
            osc_set_preference('version', '3.1.0', 'brasil');
            osc_set_preference('footer_link', true, 'brasil');
            osc_set_preference('donation', '0', 'brasil');
            osc_set_preference('default_logo', '1', 'brasil');
            osc_set_preference('defaultLocationShowAs', 'dropdown', 'brasil');
            osc_reset_preferences();
        }
    }

    if(!function_exists('check_install_brasil_theme')) {
        function check_install_brasil_theme() {
            $current_version = osc_get_preference('version', 'brasil');
            //check if current version is installed or need an update
            if( !$current_version ) {
                brasil_theme_install();
            }
            if( osc_get_preference('defaultLocationShowAs','brasil')=='') {
                osc_set_preference('defaultLocationShowAs', 'dropdown', 'brasil');
            }
        }
    }

    require_once WebThemes::newInstance()->getCurrentThemePath() . 'inc.functions.php';

    check_install_brasil_theme();

    if(!function_exists('brasil_default_location_show_as')) {
        function brasil_default_location_show_as() {
            return osc_get_preference('defaultLocationShowAs','brasil');
        }
    }

    /* ads  SEARCH */
    if (!function_exists('search_ads_listing_top_fn')) {
        function search_ads_listing_top_fn() {
            if(osc_get_preference('search-results-top-728x90', 'brasil')!='') {
                echo '<div class="clear"></div>' . PHP_EOL;
                echo '<div class="ads_728">' . PHP_EOL;
                echo osc_get_preference('search-results-top-728x90', 'brasil');
                echo '</div>' . PHP_EOL;
            }
        }
    }
    osc_add_hook('search_ads_listing_top', 'search_ads_listing_top_fn');

    if (!function_exists('search_ads_listing_medium_fn')) {
        function search_ads_listing_medium_fn() {
            if(osc_get_preference('search-results-middle-728x90', 'brasil')!='') {
                echo '<div class="clear"></div>' . PHP_EOL;
                echo '<div class="ads_728">' . PHP_EOL;
                echo osc_get_preference('search-results-middle-728x90', 'brasil');
                echo '</div>' . PHP_EOL;
            }
        }
    }
    osc_add_hook('search_ads_listing_medium', 'search_ads_listing_medium_fn');

    /* remove theme */
    function brasil_delete_theme() {
        osc_remove_preference('keyword_placeholder', 'brasil');
        osc_remove_preference('footer_link', 'brasil');
        osc_remove_preference('default_logo', 'brasil');
        osc_remove_preference('donation', 'brasil');

        osc_remove_preference('defaultLocationShowAs', 'brasil');

        osc_remove_preference('header-728x90', 'brasil');
        osc_remove_preference('homepage-728x90', 'brasil');
        osc_remove_preference('sidebar-300x250', 'brasil');
        osc_remove_preference('search-results-top-728x90', 'brasil');
        osc_remove_preference('search-results-middle-728x90', 'brasil');
    }
    osc_add_hook('theme_delete_brasil', 'brasil_delete_theme');
?>
