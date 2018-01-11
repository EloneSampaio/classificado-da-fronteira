<?php
/**
* 
*/
class frc_social_media
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

    //Social media links
    function frc_social_media_links() {
         $rss_show = osc_get_preference('show-rss-link', 'frclassifieds');
         $facebook_link = osc_get_preference('facebook-link', 'frclassifieds');
         $facebook_show = osc_get_preference('show-facebook-link', 'frclassifieds');
         $twitter_link = osc_get_preference('twitter-link', 'frclassifieds');
         $twitter_show = osc_get_preference('show-twitter-link', 'frclassifieds');
         $linkedin_link = osc_get_preference('linkedin-link', 'frclassifieds');
         $linkedin_show = osc_get_preference('show-linkedin-link', 'frclassifieds');
         $google_plus_link = osc_get_preference('google-plus-link', 'frclassifieds');
         $google_plus_show = osc_get_preference('show-google-plus-link', 'frclassifieds');
         $dribble_link = osc_get_preference('dribble-link', 'frclassifieds');
         $dribble_show = osc_get_preference('show-dribble-link', 'frclassifieds');
         $pinterest_link = osc_get_preference('pinterest-link', 'frclassifieds');
         $pinterest_show = osc_get_preference('show-pinterest-link', 'frclassifieds');
         $stumbleupon_link = osc_get_preference('stumbleupon-link', 'frclassifieds');
         $stumbleupon_show = osc_get_preference('show-stumbleupon-link', 'frclassifieds');
         $youtube_link = osc_get_preference('youtube-link', 'frclassifieds');
         $youtube_show = osc_get_preference('show-youtube-link', 'frclassifieds');
         $tumblr_link = osc_get_preference('tumblr-link', 'frclassifieds');
         $tumblr_show = osc_get_preference('show-tumblr-link', 'frclassifieds');
         $flickr_link = osc_get_preference('flickr-link', 'frclassifieds');
         $flickr_show = osc_get_preference('show-flickr-link', 'frclassifieds');
         ?>
        <ul class="social list-inline">
        <?php

             if($rss_show!=''){
                 
                    echo ' <li><a href="'.osc_base_url().'feed"  title="Rss" target="blank"><i class="ico rss fa fa-rss"></i></a></li>';
             }
             if($facebook_show!=''){
                 if($facebook_link!=''){
                    echo ' <li><a href="'.$facebook_link.'"  title="Facebook" target="blank"><i class="ico facebook fa fa-facebook"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://web.facebook.com"  title="Facebook" target="blank"><i class="ico facebook fa fa-facebook"></i></a></li>';

                 }
             }
             if($twitter_show!=''){
                 if($twitter_link!=''){
                    echo ' <li><a href="'.$twitter_link.'"  title="Twitter" target="blank"><i class="ico twitter fa fa-twitter"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://web.twitter.com"  title="Twitter" target="blank"><i class="ico twitter fa fa-twitter"></i></a></li>';

                 }
             }
             if($google_plus_show!=''){
                 if($google_plus_link!=''){
                    echo ' <li><a href="'.$google_plus_link.'"  title="Google-plus" target="blank"><i class="ico google-plus fa fa-google-plus"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://twitter.com"  title="Google-plus" target="blank"><i class="ico google-plus fa fa-google-plus"></i></a></li>';

                 }
             }
             if($linkedin_show!=''){
                 if($linkedin_link!=''){
                    echo ' <li><a href="'.$linkedin_link.'"  title="LinkedIn" target="blank"><i class="ico linkedin fa fa-linkedin"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://linkedin.com"  title="LinkedIn" target="blank"><i class="ico linkedin fa fa-linkedin"></i></a></li>';

                 }
             }
             if($dribble_show!=''){
                 if($dribble_link!=''){
                    echo ' <li><a href="'.$dribble_link.'"  title="Dribble" target="blank"><i class="ico dribble fa fa-dribbble"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://dribble.com"  title="Dribble" target="blank"><i class="ico dribble fa fa-dribbble"></i></a></li>';

                 }
             }
             if($pinterest_show!=''){
                 if($pinterest_link!=''){
                    echo ' <li><a href="'.$pinterest_link.'"  title="Pinterest" target="blank"><i class="ico pinterest fa fa-pinterest"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://pinterest.com"  title="Pinterest" target="blank"><i class="ico pinterest fa fa-pinterest"></i></a></li>';

                 }
             }
             if($youtube_show!=''){
                 if($youtube_link!=''){
                    echo ' <li><a href="'.$youtube_link.'"  title="Youtube" target="blank"><i class="ico youtube fa fa-youtube"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://web.youtube.com"  title="Youtube" target="blank"><i class="ico youtube fa fa-youtube"></i></a></li>';

                 }
             }
             if($tumblr_show!=''){
                 if($tumblr_link!=''){
                    echo ' <li><a href="'.$tumblr_link.'"  title="Tumblr" target="blank"><i class="ico tumblr fa fa-tumblr"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://web.tumblr.com"  title="Tumblr" target="blank"><i class="ico tumblr fa fa-tumblr"></i></a></li>';

                 }
             }
             if($flickr_show!=''){
                 if($flickr_link!=''){
                    echo ' <li><a href="'.$flickr_link.'"  title="Flickr" target="blank"><i class="ico flickr fa fa-flickr"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://web.flickr.com"  title="Flickr" target="blank"><i class="ico flickr fa fa-flickr"></i></a></li>';

                 }
             }
             if($stumbleupon_show!=''){
                 if($stumbleupon_link!=''){
                    echo ' <li><a href="'.$stumbleupon_link.'"  title="Stumbleupon" target="blank"><i class="ico stumbleupon fa fa-stumbleupon"></i></a></li>';
                 }else{
                    echo ' <li><a href="https://web.stumbleupon.com"  title="Stumbleupon" target="blank"><i class="ico stumbleupon fa fa-stumbleupon"></i></a></li>';

                 }
             }

         ?>
          </ul>
         <?php
    }
    
    //Social sharing
    function frc_social_media_sharing(){
          $url =  'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

          $share_on_facebook = osc_get_preference('share-on-facebook', 'frclassifieds');
          $share_on_twitter = osc_get_preference('share-on-twitter', 'frclassifieds');
          $share_on_google_plus = osc_get_preference('share-on-google-plus', 'frclassifieds');
          $share_on_linkedin = osc_get_preference('share-on-linkedin', 'frclassifieds');
          $share_on_pinterest = osc_get_preference('share-on-pinterest', 'frclassifieds');
          $share_on_tumblr = osc_get_preference('share-on-tumblr', 'frclassifieds');
          $share_on_stumbleupon = osc_get_preference('share-on-stumbleupon', 'frclassifieds');
          $share_on_email = osc_get_preference('share-on-email', 'frclassifieds');
          $share_with_frined = osc_get_preference('share-with-friend', 'frclassifieds');
          echo '<div class="social-share"><ul>';
          if($share_on_facebook!='' && $share_on_facebook == 'share'){
            echo '<li class="share-btn"><a class="facebook_share">Share on Facebook<i class="fa fa-facebook"></i></a></li>'; 
          }
          if($share_on_twitter!='' && $share_on_twitter == 'share'){
            echo '<li class="share-btn"><a class="twitter_share">Share on Twitter<i class="fa fa-twitter"></i></a></li>'; 
          }
          if($share_on_google_plus!='' && $share_on_google_plus == 'share'){
            echo '<li class="share-btn"><a class="google_share">Share on Google+<i class="fa fa-google-plus"></i></a></li>'; 
          }
          if($share_on_linkedin!='' && $share_on_linkedin == 'share'){
            echo '<li class="share-btn"><a class="linkedin_share">Share on LinkedIn<i class="fa fa-linkedin"></i></a></li>'; 
          }
          if($share_on_pinterest!='' && $share_on_pinterest == 'share'){
            echo '<li class="share-btn"><a class="pinterest_share">Share on Pinterest<i class="fa fa-pinterest"></i></a></li>'; 
          }
          if($share_on_tumblr!='' && $share_on_tumblr == 'share'){
            echo '<li class="share-btn"><a class="tumblr_share">Share on Tumblr<i class="fa fa-tumblr"></i></a></li>'; 
          }
          if($share_on_stumbleupon!='' && $share_on_stumbleupon == 'share'){
            echo '<li class="share-btn"><a class="stumbleupon_share">Share on Stumbleupon<i class="fa fa-stumbleupon"></i></a></li>'; 
          }
          if($share_with_frined!='' && $share_with_frined == 'share'){
            echo '<li class="share-btn"><a href="'.osc_item_send_friend_url().'" class="friend_share" target="blank">Share With Friend<i class="fa fa-user"></i></a></li>'; 
          }
          if($share_on_email!='' && $share_on_email == 'share'){
            echo '<li class="share-btn"><a class="email_share">Share on Email<i class="fa fa-envelope-o"></i></a></li>'; 
          }
          if($share_on_facebook!='' || $share_on_twitter!='' || $share_on_linkedin!='' || $share_with_frined!='' ){
             echo '<li class="share-btn whatsapp-share"><a href="whatsapp://send?text='. $url .'" data-action="share/whatsapp/share">Share on whatsapp<i class="fa fa-whatsapp"></i></a></li>'; 
          }
          echo '</ul></div>';
    }
    

}
?>