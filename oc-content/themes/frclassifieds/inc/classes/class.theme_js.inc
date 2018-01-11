<?php
/**
* 
*/
class frc_theme_js
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
    

    //Scroll smooth scrolling
    public function nice_scroll_activate() {
        $smooth_scroll_activate = osc_get_preference('smooth-scroll-activate', 'frclassifieds'); 
        if($smooth_scroll_activate!='' && $smooth_scroll_activate == 'activated') {
            $output ="<script>
//INSATANTIATE JQUERY NICE SCROLL
$(document).ready(function() {
  $('body, .modal').niceScroll({
      cursorwidth: '12px',
      cursorheight: '50px', // Scroll cursor width
      cursorcolor: '#ccc', // Scroll cursor color
      cursoropacitymin: '0.3',
      cursorborderradius: '10px',
      scrollspeed: '200',
      zindex: '2000'
  });
});
</script>";
     return $output;
        }
    }


    //Scroll to top on button click
    public function scrollTo_Top_button() {
        $scroll_top_button = osc_get_preference('scroll-top-activate', 'frclassifieds'); 
        if($scroll_top_button!='' && $scroll_top_button == 'activated') {
            $output ='<script>
//CLICK TO SCROLL TOP FUNCTION
 $(window).scroll(function() {
      if ($(this).scrollTop() > 200) {
          $(".scrollToTop").fadeIn();
      } else {
          $(".scrollToTop").fadeOut();
      }
  });
$(document).ready(function(){
    $(".scrollToTop").click(function() {
      $("html, body").animate({
        scrollTop: 0
      }, 3000, "easeOutExpo");
      return false;
    });
});
</script>';
     return $output;
        }
    }


    //Scroll to top on pageload/refresh
    public function onPageLoad_ScrollTop_activate() {
        $scrollTop_onLoad_activate   = osc_get_preference('scrollTop-On-Page-load-activate', 'frclassifieds');
        if($scrollTop_onLoad_activate!='' && $scrollTop_onLoad_activate == 'activated') {
            $output ='<script>
//SCROLL TO TOP ON PAGELOAD FINCTION
$(window).load(function() {
    $("html, body").animate({
        scrollTop: 0
    }, 3000, "easeOutExpo");
    return false;
});
</script>';
     return $output;
        }
    }


    //scroll to top animation class
    public function animate_classes(){
             $load_content_on_scroll_activate = osc_get_preference('load-content-on-scroll-activate', 'frclassifieds'); 
             if($load_content_on_scroll_activate!='' && $load_content_on_scroll_activate == 'activated'){
                echo "hidden scroll-animate";
             }
    }


    //Scroll to load show content
    public function scrollTop_animation_activate() {
        $animations = osc_get_preference('css-animations', 'frclassifieds'); 
        $load_content_on_scroll_activate = osc_get_preference('load-content-on-scroll-activate', 'frclassifieds'); 
        if($load_content_on_scroll_activate!='' && $load_content_on_scroll_activate == 'activated') {
            $output ='<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(".scroll-animate").viewportChecker({
        classToAdd: "visible animated  '.$animations.'",
        offset: 100
       });
});
</script>';
     return $output;
        }
    }


    //Google analytics
    public function google_analytics() {
        $google_analytics_code = osc_get_preference('google-analytics', 'frclassifieds'); 
        if($google_analytics_code!='') {
            $output ='<script>'.$google_analytics_code.'</script>';
     return $output;
        }
    }

}
?>