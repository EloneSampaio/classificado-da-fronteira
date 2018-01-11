<?php
/**
*Import DAO Object
*/
  require('dao/frc_user_sm_model.inc');
/**
* 
*/
class frc_user_sm_links
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
     * @return an user_sm_links object.
     */
    public static function newInstance() {
            if(!self::$instance instanceof self) {
                    self::$instance = new self;
            }
            return self::$instance;
    }

    //Inserts user social media links to db
    public function frc_insert_user_sm_links($user_id){
         
         // Get columns from our model layer.
         $_dao = frc_user_sm_model::newInstance();
         $check_field = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);
         $row_key = $check_field['pk_i_id'];
         if($row_key == ''){
               //Create new row if it does not exist
               $_dao->insert(array('pk_i_id' => ''.$user_id.'', 's_fb_link' => ''.Params::getParam("s_fb_link").'', 's_tw_link' => ''.Params::getParam("s_tw_link").'','s_lk_link' => ''.Params::getParam("s_lk_link").'','s_gl_link' => ''.Params::getParam("s_gl_link").'' ));
         }else{
            if($user_id == $user_id) {

                // UPDATE field  by their primary key
                $_dao->update(array('pk_i_id' => ''.$user_id.'', 's_fb_link' => ''.Params::getParam("s_fb_link").'', 's_tw_link' => ''.Params::getParam("s_tw_link").'','s_lk_link' => ''.Params::getParam("s_lk_link").'','s_gl_link' => ''.Params::getParam("s_gl_link").'' ), array('pk_i_id' => ''.$user_id.''));

            }
         }
        
        
    }

    //Generates a link to user facebook profile/page
    public function frc_user_fb_link($user_id){
            
        // Get columns from our model layer.
        $facebook_link = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        if( Session::newInstance()->_getForm('s_fb_link') != '' ) {
             $facebook_link['s_fb_link'] = Session::newInstance()->_getForm('s_fb_link');
        }
        if($facebook_link !=''){
           return $facebook_link['s_fb_link'];
        }

        return false;
    }

    //Generates a link to user twitter profile
    public function frc_user_tw_link($user_id){

        // Get columns from our model layer.
        $twitter_link = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        if( Session::newInstance()->_getForm('s_tw_link') != '' ) {
             $twitter_link['s_tw_link'] = Session::newInstance()->_getForm('s_tw_link');
        }
        if($twitter_link !=''){
           return $twitter_link['s_tw_link'];
        }            

        return false;
    }

    //Generates a link to user linkedIn profile
    public function frc_user_lk_link($user_id){
          
        // Get columns from our model layer.
        $linkedIn_link = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        if( Session::newInstance()->_getForm('s_lk_link') != '' ) {
            $linkedIn_link['s_lk_link'] = Session::newInstance()->_getForm('s_lk_link');
        }
        if($linkedIn_link !=''){
            return $linkedIn_link['s_lk_link'];
        }

        return false;
    }
     
    //Generates a link to user google plus proflie/page
    public function frc_user_gl_link($user_id){
        
        // Get columns from our model layer.
        $google_link = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        if( Session::newInstance()->_getForm('s_gl_link') != '' ) {
             $google_link['s_gl_link'] = Session::newInstance()->_getForm('s_gl_link');
        }
        if($google_link !=''){
           return $google_link['s_gl_link'];
        }

        return false;
    }

    //show facebook icon if field values exist
    public function frc_user_fb_icon($user_id){

        $check_fields = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        //Check if field is emplty
        if($check_fields['s_fb_link'] !=''){
            $output = '<li class="fb-icon user-sm-icons">
              <a href="'.$this->frc_user_fb_link($user_id).'" target="_blank">
                <i class="fa fa-facebook"></i>
              </a>
            </li>';

            return $output;
        }
        return false;

    }

    //show twitter icon if field values exist
    public function frc_user_tw_icon($user_id){

        $check_fields = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        //Check if field is emplty
        if($check_fields['s_tw_link'] !=''){
            $output = '<li class="tw-icon user-sm-icons">
              <a href="'.$this->frc_user_tw_link($user_id).'" target="_blank">
                <i class="fa fa-twitter"></i>
              </a>
            </li>';

            return $output;
        }
        return false;

    }

    //show linkedin icon if field values exist
    public function frc_user_lk_icon($user_id){

        $check_fields = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        //Check if field is emplty
        if($check_fields['s_lk_link'] !=''){
            $output = '<li class="lk-icon user-sm-icons">
              <a href="'.$this->frc_user_lk_link($user_id).'" target="_blank">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>';

            return $output;
        }
        return false;

    }

    //show google plus icon if field values exist
    public function frc_user_gl_icon($user_id ){

        $check_fields = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        //Check if field is emplty
        if($check_fields['s_gl_link'] !=''){
            $output = '<li class="gl-icon user-sm-icons">
              <a href="'.$this->frc_user_gl_link($user_id).'" target="_blank">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>';

            return $output;
        }
        return false;

    }

    //show user profiles link
    public function frc_user_sm_profiles($user_id){
  
        
        $check_fields = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

        //Check if field is emplty

        if($check_fields !=''){
            $output = '<div class="user-sm-accounts">
        <div class="row">
          <div class="col-xs-12 ">
              <ul>
                '.$this->frc_user_fb_icon($user_id).'
                '.$this->frc_user_tw_icon($user_id).'
                '.$this->frc_user_lk_icon($user_id).'
                '.$this->frc_user_gl_icon($user_id).'
              </ul>
          </div>
        </div>
      </div>';

            return $output;
        }

        return false;
            
    }
}
?>