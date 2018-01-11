<?php /**
    * 
    */
    class frc_user_location
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
         * @return an frc_user_location object.
         */
        public static function newInstance() {
                if(!self::$instance instanceof self) {
                        self::$instance = new self;
                }
                return self::$instance;
        }

	      //returns country code of the selected country
        public function frc_get_user_location_country_code(){
           $country = '';
           if(isset($_COOKIE['country'])) {
             $country = $_COOKIE['country'];

             return $country;
           }

           return false;
           
        }

        //returns country name of the selected country
        public function frc_get_user_location_country_name(){

           $country_code = $this->frc_get_user_location_country_code();
           $countries = Country::newInstance()->listAll();
           if(count($countries) > 0 ) {
              foreach($countries as $country) { 
                  if($country['pk_c_code'] == $country_code){
                     
                     return $country['s_name'];
                  }
                
              }
           }
           return false;
           
        }

        //returns user set region location
        public function frc_get_user_location_region(){
           $region = '';

           if(isset($_COOKIE['region'])) {
             $region = $_COOKIE['region'];
             return $region;
           }

           return false;

        }

        //sets user updated location
        public function frc_user_set_location(){
          
            if(Params::getParam('locationchange') == 'change') { 
                  $country = Params::getParam('country');
                  $region = Params::getParam('region');
                  $time = Params::getParam('time');
                  setcookie('country', $country, time() + ($time * 1), '/'); // 86400 = 1 day
                  setcookie('region', $region, time() + ($time * 1), '/'); // 86400 = 1 day
                  
             }

        }

        //Get current user ip address
        public function frc_getRealIpAddr()
  	    {
  	        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
  	        {
  	          $ip = $_SERVER['HTTP_CLIENT_IP'];
  	        }
  	        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
  	        {
  	          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  	        }
  	        else
  	        {
  	          $ip = $_SERVER['REMOTE_ADDR'];
  	        }
  	        return $ip;
  	    }

  	    //Returns user country
  	    public function frc_user_geolocation(){
            $country ='';
  	        
            if(!isset($_COOKIE['default_country'])) {
               $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$this->frc_getRealIpAddr());
               $default_country = $xml->geoplugin_countryName;
               setcookie('default_country', $default_country, time() + (86400 * 360), '/'); // 86400 = 1 day
               $country = $default_country;
               return $country;
            }else{
              $country = $_COOKIE['default_country'];
              return $country;
            }

           return false;
  	    }

        //returns country name of the default country if it exists
        public function frc_get_user_default_country_code(){
           $country_name = $this->frc_user_geolocation();
           $countries = Country::newInstance()->listAll();

           if(count($countries) > 0 ) {
              $code = '';
              foreach($countries as $country) { 
                  
                if($country['s_name'] == $country_name ){
                   
                     $code .= $country['pk_c_code'];
                }
                
              }
              return $code;
              
           }
           return false;
           
        }

    }
?>