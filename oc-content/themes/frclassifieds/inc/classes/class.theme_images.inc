<?php
/**
* 
*/
class frc_theme_images
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

    //generate favicon_url
    public function frc_favicon_url() {
        $favicon = osc_get_preference('favicon','frclassifieds');
        if( $favicon ) {
            return osc_uploads_url($favicon);
        }
        return false; 
    }

    //genrate favicon
    public function frc_show_favicon() {
           $favicon = osc_get_preference('favicon','frclassifieds');
           $default_links ='<link rel="shortcut icon" href="' . osc_current_web_theme_url('favicon/favicon-48.png') . '">
                            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . osc_current_web_theme_url('favicon/favicon-144.png') . '">
                            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . osc_current_web_theme_url('favicon/favicon-114.png') . '">
                            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. osc_current_web_theme_url('favicon/favicon-72.png') .'">
                            <link rel="apple-touch-icon-precomposed" href="'.osc_current_web_theme_url('favicon/favicon-57.png').'">';

           $links = '<link rel="shortcut icon" href="' . $this->frc_favicon_url() . '">
                     <link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $this->frc_favicon_url() . '">
                     <link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $this->frc_favicon_url() . '">
                     <link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. $this->frc_favicon_url() .'">
                     <link rel="apple-touch-icon-precomposed" href="'. $this->frc_favicon_url() .'">';
           if( $favicon!='' && file_exists( osc_uploads_path() . $favicon ) ) {
              return $links;
           } else {
              return $default_links;
          }
    }


    //genarate logo url
    public function frc_logo_url() {
        $logo = osc_get_preference('logo','frclassifieds');
        if( $logo ) {
            return osc_uploads_url($logo);
        }
        return false;
    }


    //genarate theme logo
    public function frc_logo_header() {
         $preference = osc_get_preference('logo-preferences','frclassifieds');   
         $logo = osc_get_preference('logo','frclassifieds');
         if($preference!='' && $preference == 'logo' && $logo!='' && file_exists( osc_uploads_path() . $logo) ){
             
             $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_page_title() . '" src="' . $this->frc_logo_url() . '"></a>';
             return $html;

         }elseif($preference!='' && $preference == 'logo-title'){
             
             $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_page_title() . '" src="' . $this->frc_logo_url() . '">'.osc_page_title().'</a>';
             return $html;

         }elseif($preference!='' && $preference == 'title'){
            
             return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';

         }else{
             
             $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_page_title() . '" src="' . $this->frc_logo_url() . '"></a>';
             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
                return $html;
             } else {
                return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';
             }
         }
    }
 
    //header background image url
    public function frc_bg_header_url() {
        $bg_header = osc_get_preference('bg_header','frclassifieds');
        if( $bg_header ) {
            return osc_uploads_url($bg_header);
        }
        return false;
    }

    //genarate background header image 
    public   function frc_bg_header_preference() {
        $bg_header_prefence = osc_get_preference('bg_header_prefence', 'frclassifieds');
        if( $bg_header_prefence ) {
            return 'none';
        }else{
            return 'url('.$this->frc_bg_header_url().')'; 
        }
        return false;
        
    }
    //search background image url
        function frc_bg_search_url() {
        $bg_search = osc_get_preference('bg_search','frclassifieds');
        if( $bg_search ) {
            return osc_uploads_url($bg_search);
        }
        return false;
        
    }
    //genarate seach background image
    public function frc_bg_search_preference() {
        $bg_search = osc_get_preference('bg_search','frclassifieds');
        if( $bg_search ) {
            return 'url('.$this->frc_bg_search_url().')';
        }
        return false;
        
    }

    //background header scroll effects
    public function frc_bg_scroll_header() {
        $bg_scroll = osc_get_preference('bg_header_scroll', 'frclassifieds');
        if(  $bg_scroll!='' && $bg_scroll=='scroll' ) {
            return 'scroll';
        }elseif( $bg_scroll!='' && $bg_scroll=='fixed'){
            return 'fixed'; 
        }else{
            return 'fixed';
        }
        return false;
    }

    //background search scroll effects
    public function frc_bg_scroll_search() {
        $bg_scroll = osc_get_preference('bg_search_scroll', 'frclassifieds');
        if( $bg_scroll!='' && $bg_scroll=='scroll') {
            return 'scroll';
        }elseif($bg_scroll!='' && $bg_scroll=='fixed' ){
            return 'fixed'; 
        }else{
            return 'fixed';
        }
        return false;
    }
    


}
?>