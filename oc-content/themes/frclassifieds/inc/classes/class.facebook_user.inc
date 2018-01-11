<?php
/**
* 
*/
class frc_facebook_user
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
     * @return an facebook_user object.
     */
    public static function newInstance() {
            if(!self::$instance instanceof self) {
                    self::$instance = new self;
            }
            return self::$instance;
    }

    //Eetruns access token
    public function get_access_token(){
        $app_id = "YOU_APP_ID";
 
        $app_secret = "YOUR_APP_SECRET";
         
        $my_url = "YOUR_APP_REDIRECT_URL";
         
        $token_url = "https://graph.facebook.com/oauth/access_token?"
         
        . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
         
        . "&client_secret=" . $app_secret . "&code=" . $code . "&scope=publish_stream,email";
         
         
        $response = @file_get_contents($token_url);
         
        $params = null;
         
        parse_str($response, $params);
    }

    //make a request to facebook
    public function new_request(){
        $htis->get_access_token();
        $graph_url = "https://graph.facebook.com/me?access_token="
 
        . $params['access_token'];
         
         
        $user = json_decode(file_get_contents($graph_url));
         
        $username = $user->username;
         
        $email = $user->email;
         
        $facebook_id = $user->id;
    }
    
    //facebook login button    
    public function login_button(){
        $button = '<a class="btn btn-fb btn-xs btn-block" href="https://www.facebook.com/dialog/oauth?client_id=YOUR_APP_ID&redirect_uri=YOUR_APP_REDIRECT_URL&scope=publish_stream,email" type="button">Login With Facebook</a><div class="section-header">
                                       <h4><?php _e("OR", "frclassifieds")?></h4>
                                       <hr class="straight-line">
                                   </div>';
         return $button;
    }

    //facebook register button    
    public function register_button(){
        $button = '<a class="btn btn-fb btn-xl btn-block" href="https://www.facebook.com/dialog/oauth?client_id=YOUR_APP_ID&redirect_uri=YOUR_APP_REDIRECT_URL&scope=publish_stream,email" type="button">Register With Facebook</a>';
        return $button;
    }
    

}
?>