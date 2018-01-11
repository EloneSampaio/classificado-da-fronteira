<?php  
/**
    * 
    */
    class frc_delete_user
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
         * @return an frc_delete_user object.
         */
        public static function newInstance() {
                if(!self::$instance instanceof self) {
                        self::$instance = new self;
                }
                return self::$instance;
        }

        //removes user avatar directory if user is deleted
	    public function  frc_user_avatar_del_dir($user_id){

	        $glob_path =osc_uploads_path().'users/user-'.$user_id;

	        osc_deleteDir($glob_path);

	        return false;
	    }

        //drop exteneded field row when user is deleted
        public function frc_user_drop_row($user_id){

           $_dao = frc_user_sm_model::newInstance(); 
           $field = frc_user_sm_model::newInstance()->findByPrimaryKey($user_id);

           $row_key = $field['pk_i_id'];

           if($row_key !=''){
              $_dao->deleteByPrimaryKey($row_key);
           }
        }
        

    }
?>