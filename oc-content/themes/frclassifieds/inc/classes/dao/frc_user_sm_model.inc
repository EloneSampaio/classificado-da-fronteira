<?php
  class frc_user_sm_model extends DAO {
 
        function __construct() {
            parent::__construct();
            $this->setTableName('t_user_sm_links');
            $this->setPrimaryKey('pk_i_id');
            $this->setFields(array('pk_i_id','s_fb_link', 's_gl_link', 's_tw_link', 's_lk_link'));
        }
     
        /**
         * Singleton.
         */
        private static $instance;
     
        /**
         * Singleton constructor.
         * @return an frc_user_sm_model object.
         */
        public static function newInstance() {
                if(!self::$instance instanceof self) {
                        self::$instance = new self;
                }
                return self::$instance;
        }
   }
?>