<?php
/**
* 
*/
class frc_theme_style
{
	
	function __construct()
	{
		# code...
	}
	/**
     * Singleton.
     */
    private static $instance;
 
    /**
     * Singleton constructor.
     * @return an theme_images object.
     */
    public static function newInstance() {
            if(!self::$instance instanceof self) {
                    self::$instance = new self;
            }
            return self::$instance;
    }
    
    public function frc_header_notify_bg(){
         $header_notify_bg = osc_get_preference('header-notify-bg', 'frclassifieds');
         
         if($header_notify_bg!='' && $header_notify_bg == 'default'){
            return '#f0f1f2';
         }
         elseif($header_notify_bg!='' && $header_notify_bg == 'theme'){
            return $this->frc_theme_color();
         }
         elseif($header_notify_bg!='' && $header_notify_bg == 'custom'){
            $header_custom_bg = osc_get_preference('header-notify-bg-custom', 'frclassifieds');
            return $header_custom_bg;
         }else{
           
           return '#f0f1f2';
         }
    }


    //Footer Notification backgorund color
    public function frc_footer_notify_bg(){
         $footer_notify_bg = osc_get_preference('footer-notify-bg', 'frclassifieds');
         
         if($footer_notify_bg!='' && $footer_notify_bg == 'default'){
            return '#f0f1f2';
         }
         elseif($footer_notify_bg!='' && $footer_notify_bg == 'theme'){
            return $this->frc_theme_color();
         }
         elseif($footer_notify_bg!='' && $footer_notify_bg == 'custom'){
            $footer_custom_bg = osc_get_preference('footer-notify-bg-custom', 'frclassifieds');
            return $footer_custom_bg;
         }else{
           
           return '#f0f1f2';
         }
    }
    //onload notifiacation background color
    public function frc_on_load_notify_bg(){
         $on_load_notify_bg = osc_get_preference('on-load-notify-bg', 'frclassifieds');
         
         if($on_load_notify_bg!='' && $on_load_notify_bg == 'default'){
            return '#f0f1f2';
         }
         elseif($on_load_notify_bg!='' && $on_load_notify_bg == 'theme'){
            return $this->frc_theme_color();
         }
         elseif($on_load_notify_bg!='' && $on_load_notify_bg == 'custom'){
            $on_load_custom_bg = osc_get_preference('on-load-notify-bg-custom', 'frclassifieds');
            return $on_load_custom_bg;
         }else{
           
           return '#f0f1f2';
         }
    }
    //exit notification background color
    public function frc_on_exit_notify_bg(){
         $on_exit_notify_bg = osc_get_preference('on-exit-notify-bg', 'frclassifieds');
         
         if($on_exit_notify_bg!='' && $on_exit_notify_bg == 'default'){
            return '#f0f1f2';
         }
         elseif($on_exit_notify_bg!='' && $on_exit_notify_bg == 'theme'){
            return $this->frc_theme_color();
         }
         elseif($on_exit_notify_bg!='' && $on_exit_notify_bg == 'custom'){
            $on_exit_custom_bg = osc_get_preference('on-exit-notify-bg-custom', 'frclassifieds');
            return $on_exit_custom_bg;
         }else{
           
           return '#f0f1f2';
         }
    }
    //background header image height
    public function frc_bg_header_height() {
        $bg_header_prefence = osc_get_preference('bg_header_prefence', 'frclassifieds');
        if( $bg_header_prefence ) {
            return '0';
        }else{
            return '150'; 
        }
        return false;
    }

    //backgraud search image height
    public function frc_bg_search_height() {
        $bg_search_prefence = osc_get_preference('bg_search_prefence', 'frclassifieds');
        if( $bg_search_prefence ) {
            return '0';
        }else{
            return '150'; 
        }
        return false;
    }


    //Hex to rgba color option
    public function frc_rgba_theme_color($colour){
            if ( $colour[0] == '#' ) {
                    $colour = substr( $colour, 1 );
            }
            if ( strlen( $colour ) == 6 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
            } elseif ( strlen( $colour ) == 3 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
            } else {
                    return false;
            }
            $r = hexdec( $r );
            $g = hexdec( $g );
            $b = hexdec( $b );
            //return array( 'red' => $r, 'green' => $g, 'blue' => $b );
            return 'rgba('.$r.', '.$g.', '.$b.',0.1)';
    }


    //theme color options
    public function frc_theme_color() {
        $theme_color = osc_get_preference('theme-color', 'frclassifieds');
        $theme_color_custom = osc_get_preference('theme-color-custom', 'frclassifieds');
        if($theme_color!='' && $theme_color == 'green' ){

            return '#c4e17f'; 

        }elseif($theme_color!='' && $theme_color == 'brown' ){

            return '#fecf71'; 

        }elseif($theme_color!='' && $theme_color == 'purple' ){

            return '#db9dbe'; 

        }elseif($theme_color!='' && $theme_color == 'blue' ){

            return '#62c2e4'; 

        }elseif($theme_color!='' && $theme_color == 'nice' ){

            return '#3fbda5'; 

        }elseif($theme_color!='' && $theme_color == 'custom' ){

            return $theme_color_custom; 

        }elseif($theme_color!='' && $theme_color == 'default' ){

            return '#f0776c'; 

        }else{

           return '#f0776c'; 

        }

        return false;
    }

    //theme custom style
    public function frc_custom_style() {
            $custom_css_style = osc_get_preference('custom-css-style',  'frclassifieds');
            $output="<style>
                        .ui-widget-header, .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{background-color: ".$this->frc_theme_color()." !important; background-image:none; border-color: ".$this->frc_theme_color()." !important;}
                        .ui-slider .ui-slider-handle{height:2em !important; width:2em !important;}
                        .ui-slider-horizontal .ui-slider-handle{top:-0.7em !important; margin-left:-1em !important; cursor:grab !important;}
                        .ui-slider-horizontal .ui-slider-range {height: 150% !important; top: -0.2em !important;}
                        .banner {height:".bg_header_height()."px; background: ".bg_header_preference()." no-repeat ".bg_scroll_header()." 50% 20%; background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-background-size: cover;-o-background-size: cover;}
                        .parallax {min-height: 150px; background: ".bg_search_preference()." no-repeat ".bg_scroll_search()." center center; background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-background-size: cover;-o-background-size: cover;}
                        header .navbar-brand a{color: ".$this->frc_theme_color().";}
                        li.languages ul li a:hover,li.languages ul li a:focus{ color: ".$this->frc_theme_color()." !important;}
                        .theme-color{color: ".$this->frc_theme_color().";}
                        a.theme-color{color: ".$this->frc_theme_color()." !important; text-decoration: none;}
                        a.theme-color:hover,a.theme-color:focus{ opacity: 0.7; color: ".$this->frc_theme_color()." !important; text-decoration: none;}
                        .theme-bk-color{ background-color: ".$this->frc_theme_color()." !important;}
                        .frc_rgba_bc_color{background-color: ".$this->frc_rgba_theme_color($this->frc_theme_color())." !important;}
                        .section-title{border-bottom: solid 2px ".$this->frc_theme_color()."; }
                        .location ul li:hover a,.location ul li:focus a{ color: ".$this->frc_theme_color()."; text-decoration: none;}
                        .location ul li:hover a:before{color: ".$this->frc_theme_color().";}
                        .itm-box-border{ border:solid 2px ".$this->frc_theme_color()." !important;}
                        .label-primary{ background:".$this->frc_theme_color()."; }
                        .frc-brd-solid{ border: solid 1px ".$this->frc_theme_color()."; }
                        .frc-bdr-dotted{border: dotted 1px ".$this->frc_theme_color()."; }
                        .frc-bdr-dashed{ border: dashed 1px ".$this->frc_theme_color()."; }
                        header .navbar-default .navbar-nav li a:focus,header .navbar-default .navbar-nav li a:hover,header .navbar-default .navbar-nav li .active{color: ".$this->frc_theme_color().";}
                        header .navbar-default .navbar-nav > .open > a, header .navbar-default .navbar-nav > .open > a:focus, header .navbar-default .navbar-nav > .open > a:hover{color: ".$this->frc_theme_color().";}
                        #setLocation ul ul li a:hover, #setLocation > ul > ul  > li.active a.dropdown-toggle{color:#fff; background:".$this->frc_theme_color().";}
                        #setLocation > ul > ul  > li.active li a{color:".$this->frc_theme_color().";border-bottom:solid 1px ".$this->frc_theme_color().";}
                        .btn-outlined.btn-theme {background:".$this->frc_theme_color().";}
                        .btn-outlined.btn-transparent { color: ".$this->frc_theme_color()."; border:1px solid ".$this->frc_theme_color().";}
                        .btn-outlined.btn-transparent-theme{color: ".$this->frc_theme_color()."; border:1px solid ".$this->frc_theme_color().";}
                        .btn-outlined.btn-transparent-theme:hover,.btn-outlined.btn-transparent-theme:focus,.btn-outlined.btn-transparent-theme.active {background-color: ".$this->frc_theme_color()." !important;}
                        .premium-bar{background-color: ".$this->frc_theme_color()." !important;}
                        .item-cell{border-color:  ".$this->frc_theme_color()." !important;}
                        .breadcrumb a{color: ".$this->frc_theme_color()."; text-decoration: none;}
                        .breadcrumb a:hover,.breadcrumb a.focus{color: ".$this->frc_theme_color().";}
                        .listed .btn-group ul{border:1px solid ".$this->frc_theme_color().";}
                        .listed .btn-group .dropdown-menu:before {border-bottom: 9px solid ".$this->frc_theme_color()." !important;}
                        .listed .btn-group ul li{border-top:1px solid ".$this->frc_theme_color()."; }
                        .listed .btn-group ul li a{color:".$this->frc_theme_color().";}
                        .tringle-up-right:after{border-top: 500px solid ".$this->frc_theme_color().";}
                        select option:hover{color: #fff; background-color: ".$this->frc_theme_color().";}
                        .form-select:hover .form-control:before {color: ".$this->frc_theme_color().";}
                        ul.tabbernav{border-bottom: 2px solid ".$this->frc_theme_color().";}
                        ul.tabbernav li.tabberactive a{background-color: ".$this->frc_theme_color().";}
                        ul.tabbernav li.tabberactive a:hover,ul.tabbernav li.tabberactive a:focus{background-color: ".$this->frc_theme_color().";}
                        ul.tabbernav li a:hover,ul.tabbernav li a:focus{background-color: ".$this->frc_theme_color().";}
                        .tabberlive .tabbertab{background-color: ".$this->frc_rgba_theme_color($this->frc_theme_color())." !important;}
                        .details-box .has-icon a:hover,.details-box .has-icon a:focus{color:".$this->frc_theme_color().";}
                        option:hover .select-item:before{color: ".$this->frc_theme_color()."; margin-right: -20%;}
                        span.searchPaginationSelected,.pagination-container .pagination ul li a:hover{background-color: ".$this->frc_theme_color()."; color: #fff;}
                        .pagination-container .pagination ul li span{border:solid 1px ".$this->frc_theme_color().";}
                        .pagination-container .pagination ul li a{color: ".$this->frc_theme_color()."; border:solid 1px ".$this->frc_theme_color().";}
                        #sub_alert button.sub_button{background-color: ".$this->frc_theme_color().";}
                        .card.hovercard .card-header  h2{color: ".$this->frc_theme_color().";}
                        .card.hovercard .seller-ratings{background: ".$this->frc_theme_color().";}
                        .card.hovercard  .seller-ratings:after{border-top-color: ".$this->frc_theme_color()." !important;}
                        .product-description ul li a:hover,.product-description ul li a:focus,.product-description ul li.active a:hover,.product-description ul li.active a:focus,.product-description ul li.active a{color: ".$this->frc_theme_color().";}
                        .social-share .share-btn{background-color: ".$this->frc_theme_color().";}
                        .profile-box .nav-stacked li a:hover,.profile-box .nav-stacked li a:focus,.profile-box .nav-stacked > li.active > a, .profile-box .nav-stacked > li.active > a:focus, .profile-box .nav-stacked > li.active > a:hover,.profile-box .dropdown-menu > .active > a, .profile-box .dropdown-menu > .active > a:focus, .profile-box .dropdown-menu > .active > a:hover,.profile-box .nav .open > a, .profile-box .nav .open > a:focus, .profile-box .nav .open > a:hover{color: ".$this->frc_theme_color().";} 
                        .dropdown-menu.mark-as:after {border-bottom: 10px solid ".$this->frc_theme_color()." !important; border-bottom-color: ".$this->frc_theme_color()." !important;}
                        #item_head #report ul li ul li a:hover,#item_head #report ul li ul li a:focus {background: ".$this->frc_theme_color()." !important;}
                        .form-pricing input{ border:solid 1px ".$this->frc_theme_color().";}
                        .form-pricing #currency{ background:".$this->frc_theme_color().";}
                        .bottom-carousel .owl-buttons .owl-prev:hover i,.bottom-carousel .owl-buttons .owl-next:hover i{color:".$this->frc_theme_color()." !important;}
                        .social .ico:hover{color: ".$this->frc_theme_color()." !important;}
                        .copyright a{color: ".$this->frc_theme_color()." !important; text-decoration:underline;}
                        ".$custom_css_style."
                     </style>";

            echo $output;
             
    }
}
?>