<?php /**
    * 
    */
    class frc_user_avatar
    {
        
        function __construct()
        {

        }
        /**
         * Singleton.
         */
        private static $instance;
     
        /**
         * Singleton constructor.
         * @return an frc_user_avatar object.
         */
        public static function newInstance() {
                if(!self::$instance instanceof self) {
                        self::$instance = new self;
                }
                return self::$instance;
        }

        //create default avatar url
        public function frc_user_default_avatar(){
        	$avatar = osc_current_web_theme_url('images/user/user_default.jpg');
            return  $avatar;
        }

        //create avatar url
        public function frc_user_avatar_url($user_id){
            $avatar_url ='';
	        //genarate an avatar url
	        if (file_exists($avatar = osc_uploads_path().'users/user-'.$user_id.'/user-avatar.png')) {
	            
	             $avatar_url = osc_uploads_url('users/user-'.$user_id.'/user-avatar.png');
	             return $avatar_url;

	        }elseif (file_exists($avatar = osc_uploads_path().'users/user-'.$user_id.'/user-avatar.jpg')) {
	            
	             $avatar_url = osc_uploads_url('users/user-'.$user_id.'/user-avatar.jpg');
	             return $avatar_url;

	        }elseif (file_exists($avatar = osc_uploads_path().'users/user-'.$user_id.'/user-avatar.gif')) {
	            
	             $avatar_url = osc_uploads_url('users/user-'.$user_id.'/user-avatar.gif');
	             return $avatar_url;

	        }else{
	                $avatar_url = $this->frc_user_default_avatar();
	                return  $avatar_url;
	        }

	        return false;

       }
       
       //create a directory if it does not exists
	   public function  frc_user_avatar_create_dir($userId){

	        $path = osc_uploads_path().'users/user-'.$userId;

	        //create a user folder it it does not exist
	        if (!file_exists($path)) {
	            $frc_user_avatar_dir = $path; 

	            mkdir($path, 0777, true);

	            return false;
	        }
	    }

	    //upload avatar to directory
	    function frc_upload_user_avatar($user_id){

            $package = Params::getFiles('user-avatar');

            if($package['tmp_name']!=''){
                    if(  $package['error'] == UPLOAD_ERR_OK  ) {
                    
                    if( !is_writable(osc_uploads_path()) ) {
                           osc_add_flash_error_message( _m('Upload path is not writable profile picture was not saved...'));
                    }else{
                        
                        $glob_path =osc_uploads_path().'users/user-'.$user_id.'/';

                        if (count(glob($glob_path.'*')) === 0 ) {
                            //upload images
                            $img = $package['tmp_name'];
                            $img_size =$package['size'];
                            $ext = strtolower(end(explode('.',$package['name'])));
                            $user_avatar_name  = 'user-avatar';
                            $expensions= array("jpg","png",'gif');

                            $path = osc_uploads_path().'users/user-'.$user_id.'/' . $user_avatar_name . '.'.$ext ; 

                            if(in_array($ext,$expensions)=== false){

                                 osc_add_flash_warning_message( _m('Please upolad a valid avatar. allowed image types jpg/png/gif'));

                            }else{
                                if($img_size > 999152){
                                  osc_add_flash_warning_message( _m('Avatar size must be less than 1 MB.'));
                                }else{
                                   move_uploaded_file($img, $path);

                                }

                            }

                        }else{
                            array_map('unlink', glob($glob_path.'*'));
                            if (count(glob($glob_path.'*')) === 0 ) {
                                //upload images
                                $img = $package['tmp_name'];
                                $img_size =$package['size'];
                                $ext = strtolower(end(explode('.',$package['name'])));
                                $user_avatar_name  = 'user-avatar';
                                $expensions= array("jpeg","jpg","png",'gif');

                                $path = osc_uploads_path().'users/user-'.$user_id.'/' . $user_avatar_name . '.'.$ext ; 

                                if(in_array($ext,$expensions)=== false){

                                     osc_add_flash_warning_message( _m('Please upolad a valid avatar. allowed image types jpg/png/gif'));

                                }else{
                                    if($img_size > 999152){
                                      osc_add_flash_warning_message( _m('Avatar size must be less than 1 MB.'));
                                    }else{
                                       move_uploaded_file($img, $path);

                                    }

                                }

                            }

                        }
         
                    }            

                }else{
                    osc_add_flash_warning_message( _m('There was an error updating your avatar. try again later'));
                }

                return false;
            }
        }

    }
?>