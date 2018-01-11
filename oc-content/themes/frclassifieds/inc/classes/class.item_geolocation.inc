<?php 
  /**
  * 
  */
  class frc_item_geolacation
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
	     * @return an Item_geolacation object.
	     */
	    public static function newInstance() {
	            if(!self::$instance instanceof self) {
	                    self::$instance = new self;
	            }
	            return self::$instance;
	    }

	    //Generates items location cordinates
	  	public function frc_item_geolocation($item) {

			    $lat = 40.000;
			    
			    $lon = -35.00;
			    $formatted_address = array();
			    
			    
			    if ( $item['d_coord_lat'] != '' && $item['d_coord_long'] != '') {
			                
			        $lat = $item['d_coord_lat'];
			        
			        $lon = $item['d_coord_long'];

			        $formatted_address[] = $item['s_country'];

			        $formatted_address[] = $item['s_region'];

			        $formatted_address[] = $item['s_city'];
			                
			    }

			    if($lat == 40.000 && $lon = -35.00 ){
                    ?>
                       <script type="text/javascript">
                           $('#map-canvas').remove();
                       </script>
                    <?php
			    }
			            
			?>
			        
			<script type="text/javascript"> 
			                      
			     var itemLocation = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>);

			      function initialize() {
			                  var mapOptions = {
			                    center: itemLocation,
			                    zoom: 12,
			                    mapTypeId: google.maps.MapTypeId.ROADMAP
			                  };
			                  
			                  var map = new google.maps.Map(document.getElementById("map-canvas"),
			                      mapOptions);
			                  var marker=new google.maps.Marker({
			                    position:itemLocation,
			                    animation:google.maps.Animation.BOUNCE
			                    });

			                  marker.setMap(map);
			                  var infowindow = new google.maps.InfoWindow({
			                    content: '<?php echo implode ( ',', $formatted_address ); ?>'
			                    });

			                  infowindow.open(map,marker);
			                }
			      google.maps.event.addDomListener(window, 'load', initialize);
			             
			</script>
			<?php
		}

        //Geocode item location
	    public function frc_insert_geo_location ( $itemId) {
	        
	        $aItem = Item::newInstance()->findByPrimaryKey ( $itemId );
	        
	        $address = '';
	        
	        $addr_comp =  array();
	        
	        
	        if ( isset ( $aItem['s_city'] ) ) {
	            
	            $addr_comp[] = $aItem['s_city'];
	            
	        } 
	        
	        if ( isset ( $aItem['s_country'] ) ) {
	            
	            $addr_comp[] = $aItem['s_country'];
	            
	        }

	        // function to geocode address, it will return false if unable to geocode address
	        function geocode($address){
	         
	            // url encode the address
	            $address = urlencode($address);
	             
	            // google map geocode api url
	            $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
	         
	            // get the json response
	            $resp_json = file_get_contents($url);
	             
	            // decode the json
	            $resp = json_decode($resp_json, true);
	         
	            // response status will be 'OK', if able to geocode given address 
	            if($resp['status']=='OK'){
	         
	                // get the important data
	                $lati = $resp['results'][0]['geometry']['location']['lat'];
	                $longi = $resp['results'][0]['geometry']['location']['lng'];
	                 
	                // verify if data is complete
	                if($lati && $longi){
	                 
	                    // put the data in the array
	                    $data_arr = array();            
	                     
	                    array_push(
	                        $data_arr, 
	                            $lati, 
	                            $longi
	                        );
	                     
	                    return $data_arr;
	                     
	                }else{
	                    return false;
	                }
	                 
	            }else{
	                return false;
	            }
	        }

	        // get latitude, longitude
	        $data_arr = geocode(implode ( ',', $addr_comp ));
	     
	        // if able to geocode the address
	        if($data_arr){
	             
	            $lat = $data_arr[0];
	            $lng = $data_arr[1];

	            ItemLocation::newInstance()->update ( array ( 'd_coord_lat' => $lat ,'d_coord_long' => $lng ) , array('fk_i_item_id' => $itemId ) );      

	        }

	    }
  }
?>