<?php
/**
* 
*/
class frc_notify
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
    
    //header slidein notofication    
    public function frc_notify_top(){
         $header_notify_activate = osc_get_preference('header-notify-activate', 'frclassifieds');
         if($header_notify_activate!='' && $header_notify_activate == 'activated'){
          
             $output = '<div class="info-bar-top info-bar clearfix" style="background-color:'.frc_theme_style::newInstance()->frc_header_notify_bg().';">
                            <button class="hide-bar btn btn-round btn-trasparrent pull-right">Got it!</button>
                            <div class="container">
                                <span>'.osc_esc_html( osc_get_preference('header-notify-content', 'frclassifieds') ).'</span>
                            </div>
                        </div>';
             return $output;
         
         }

    } 

    //footer  slidein notofication
    public function frc_notify_bottom(){
         $footer_notify_activate = osc_get_preference('footer-notify-activate', 'frclassifieds');
         if($footer_notify_activate!='' && $footer_notify_activate == 'activated'){
          
             $output = '</div><div class="info-bar-bottom info-bar clearfix" style="background-color:'.frc_theme_style::newInstance()->frc_footer_notify_bg().';">
                          <button class="hide-bar btn btn-round btn-trasparrent pull-right">Close!</button>
                          <div class="container">
                             <span>'.osc_esc_html( osc_get_preference('footer-notify-content', 'frclassifieds') ).'</span>
                          </div>
                        </div>';
             return $output;
         
         }

    } 
    
    //Exit popup notification
    public function frc_notify_popup_exit(){
         $on_exit_notify_activate = osc_get_preference('on-exit-notify-activate', 'frclassifieds');
         if($on_exit_notify_activate!='' && $on_exit_notify_activate == 'activated'){
          
             $output = '<div id="ouibounce-modal" class="ouibounce-modal ">
                          <div class="underlay"></div>
                          <div class="modal" style="background-color:'.frc_theme_style::newInstance()->frc_on_exit_notify_bg().';">
                                <div class="modal-header theme-bk-color">
                                    <button type="button" class="close"><span>&times;</span></button>
                                    <h4>'.osc_esc_html( osc_get_preference('on-exit-notify-content', 'frclassifieds') ).'</h4>
                                </div>

                                <div class="modal-body">
                                   '.osc_esc_html( osc_get_preference('on-exit-notify-content', 'frclassifieds') ).'
                                </div>

                                 <div class="modal-footer">
                                  '.osc_esc_html( osc_get_preference('on-load-notify-footer', 'frclassifieds') ).'
                                </div>
                          </div>
                        </div>';
             return $output;
         
         }

    } 

    //onload popup notofication  
    public function frc_notify_popup_load(){
         $on_load_notify_activate = osc_get_preference('on-load-notify-activate', 'frclassifieds');
         if($on_load_notify_activate!='' && $on_load_notify_activate == 'activated'){
          
             $output = '<div class="modal fade" id="on-Load" tabindex="-1" role="dialog" aria-labelledby="load">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content" style="background-color:'.frc_theme_style::newInstance()->frc_on_load_notify_bg().';">
                              <div class="modal-header theme-bk-color">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4>'.osc_esc_html( osc_get_preference('on-load-notify-title', 'frclassifieds') ).'</h4>
                              </div>
                              <div class="modal-body">
                                '.osc_esc_html( osc_get_preference('on-load-notify-content', 'frclassifieds') ).'
                              </div>
                              <div class="modal-footer">
                                '.osc_esc_html( osc_get_preference('on-load-notify-footer', 'frclassifieds') ).'
                              </div>
                            </div>
                          </div>
                        </div>';
             return $output;
         
         }

    } 
    

}
?>