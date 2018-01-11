<div class="search">
 <div class="filters">
     <div class="clearfix">
     	<form class="user-forms" action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf form-horizontal">
	        <input type="hidden" name="page" value="search"/>
	        <?php if(osc_is_search_page()){?>
	        <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
	        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
	        <?php } ?>
	        <?php foreach(osc_search_user() as $userId) { ?>
	        <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
	        <?php } ?>
	        <fieldset class="col-xs-12">
	            <div class="form-group">
	        		<div class="form-control border-radious-none input-lg">
		                <input type="text" name="sPattern"  id="query" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'frclassifieds'), 'frclassifieds')); ?>" />
		            </div>
		        </div>
	        </fieldset>
	        <fieldset class="col-xs-12">
	           <div class="form-group form-select">
	        		<div class="form-control border-radious-none input-lg">
				          <?php  if ( osc_count_categories() ) { ?>
				            <?php osc_goto_first_category() ; ?>
				            <span><?php _e('Choose Category', 'frclassifieds') ; ?></span>
				            <select name="sCategory" style="opacity:0;">
				                <option value=""><?php _e('Choose Category', 'frclassifieds') ; ?></option>
				                <?php while ( osc_has_categories() ) { ?>
				                        <option class="cat theme-color" value="<?php echo osc_category_id() ; ?>"><?php echo osc_category_name() ; ?></option>
				                        <?php if ( osc_count_subcategories() > 0 ) { ?>
				                            <?php while ( osc_has_subcategories() ) { ?>
				                                <option class="subcat select-item" value="<?php echo osc_category_id() ; ?>"><?php echo osc_category_name() ; ?></option>
				                            <?php } ?>
				                        <?php } ?>
				                    <?php } ?>
				            </select>
				         <?php  } ?>
	                </div>
	            </div>
	        </fieldset>
	        <fieldset class="col-xs-12">
	        	<div class="form-group form-select countries">
	        		<div class="form-control border-radious-none input-lg">
		        		<?php $aCountry = Country::newInstance()->listAll(); ?>
						<?php if(count($aCountry) > 0 ) { ?>
						    <span><?php _e('Select a country', 'frclassifieds') ; ?></span>
							<select name="sCountry" id="countryId" style="opacity:0;">
								<option class="reg" value=""><?php _e('Select a country')?></option>
								<?php foreach($aCountry as $country) { ?>
									<option class="selectreg select-item <?php if(get_user_country_code() == $country['pk_c_code'] ){ echo 'selected';}?>" <?php if(get_user_country_code() == $country['pk_c_code'] ){ echo 'selected="selected"';}?> value="<?php echo $country['pk_c_code'] ; ?>"><?php echo $country['s_name'] ; ?></option>
								<?php } ?>
							</select>
						<?php } ?>
		        	</div>
	        	</div>
	        </fieldset>
	        <fieldset class="col-xs-12">
	        	<div class="regions form-group">
	        		<div class="form-control border-radious-none input-lg">
		        		<input type="text" name="sRegion" id="sRegion-side" value="" placeholder="Enter a region" />
		        	</div>
	        	</div>
	        </fieldset>
	        <fieldset class="col-xs-12">
	        	<div class="cities form-group">
	        		<div class="form-control border-radious-none input-lg">
		        		<input type="text" name="sCity" id="sCity-side" value="" placeholder="Enter a city" />
		        	</div>
	        	</div>
	        </fieldset>
	        <?php if( osc_price_enabled_at_items() ) { ?>
	        <fieldset class="input-group ui-slider-box col-xs-12">
	            <div class="col-xs-12">
	            	<label><?php _e('Price Range:', 'frclassifieds');?></label>
	            </div>
                <div class="col-xs-6">
                   <div class="form-group clearfix">
        		      <div class="form-control border-radious-none input-lg">
                	      <input type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" placeholder="<?php _e('MIN Price', 'frclassifieds'); ?>" />
                      </div>
                   </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group clearfix">
        		      <div class="form-control border-radious-none input-lg">
        		           <div style="position:static;"></div>
                	       <input type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" placeholder="<?php _e('MAX Price', 'frclassifieds'); ?>" />
                           <div style="position:static;"></div>
                      </div>
                  </div>
                </div>
                <div class="margin-thin"></div>
                <div class="col-xs-12">
                   <div class="col-xs-12">
                      <div style="position:static;"></div>
	                  <div id="price-range"></div>
	                  <div style="position:static;"></div>
	               </div>
	            </div>
	        </fieldset>
            <?php } ?>
	        <?php if( osc_images_enabled_at_items() ) { ?>
	        <fieldset class="col-xs-12 clearfix">
	        <div class="margin-thin"></div>
	                <input type="checkbox" class="pull-left" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> />
	                <label for="withPicture" class="pull-left"><small><?php _e('Show only listings with pictures', 'frclassifieds') ; ?></small></label>
	        </fieldset>
	        <?php } ?>
	        
	        <div class="margin-thin"></div>
	        <div class="plugin-hooks">
	            <?php
	            if(osc_search_category_id()) {
	                osc_run_hook('search_form', osc_search_category_id()) ;
	            } else {
	                osc_run_hook('search_form') ;
	            }
	            ?>
	        </div>
	        <?php
	        $aCategories = osc_search_category();
	        foreach($aCategories as $cat_id) { ?>
	            <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
	        <?php } ?>
	        <div class="margin-thin"></div>
	        <fieldset class="col-xs-12  clearfix">
	        	<div class="form-group clearfix">
	              <button type="submit" class="btn btn-outlined btn-theme btn-xl"><?php _e('Search Now', 'frclassifieds') ; ?></button>
	            </div>
	        </fieldset>
	    </form>
     </div>
  </div>
</div><!--search-->
<?php if(get_user_country_code() !=''){
	?>
	<script type="text/javascript">
	//Set default location when page loads
			$(function(){
				var pk_c_code = '<?php echo get_user_country_code(); ?>';
			    <?php $path = "front" ?>
				<?php if($path=="admin") { ?>
	                var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
	            <?php } else { ?>
	                var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
	            <?php }; ?>
			    var result = '';
			    if(pk_c_code != '') {
			        $("#regionId").attr('disabled',false);
			        $("#cityId").parent().removeClass('disabled');
			        $("#cityId").attr('disabled',true);
			        $("#cityId").parent().addClass('disabled'); 

		        $.ajax({
		          type: "POST",
		          url: '<?php echo osc_base_url();?>/index.php?page=ajax&action=regions&countryId='+ pk_c_code,
		          dataType: 'json',
		          success: function(data){
		            var length = data.length;
		            
		            if(length > 0) {
		              result += '<option value="">Select a region</option>';
		              for(key in data) {
		                result += '<option class="select-item" value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
		              }

		              $(".regions.form-group").addClass('form-select');
		              $("#sRegion-side").before('<span>Select a region</span><select name="sRegion" id="regionId" ></select>');
		              $("#sRegion-side").remove();

		              $(".cities.form-group").addClass('form-select');
		              $("#sCity-side").before('<span>Select a city</span><select name="sCity" id="cityId" ></select>');
		              $("#sCity-side").remove();
		              
		              $("#regionId").val("");
		            } else {

		              $(".regions.form-group").removeClass('form-select');
		              $("#regionId").parent().before('<input placeholder="Enter a region" type="text" name="sRegion" id="sRegion-side" />');
		              $("#regionId").parent().remove();
		              
		              $(".cities.form-group").removeClass('form-select');
		              $("#cityId").parent().before('<input placeholder="Enter a city" type="text" name="sCity" id="sCity-side" />');
		              $("#cityId").parent().remove();

		              $("#sCity-side").val('');
		            }

		            $("#regionId").html(result);
		            $("#cityId").html('<option selected value="">Select a city</option>');
		          }
		         });

		       } else {

		         // add empty select
		         $(".regions.form-group").addClass('form-select');
		         $("#sRegion-side").before('<select name="sRegion" id="regionId" ><option value="">Select a region</option></select>');
		         $("#sRegion-side").remove();
		         
		         $(".cities.form-group").addClass('form-select');
		         $("#sCity-side").before('<select name="sCity" id="cityId" ><option value="">Select a city</option></select>');
		         $("#sCity-side").remove();

		         if( $("#regionId").length > 0 ){
		           $("#regionId").html('<option value="">Select a region</option>');
		         } else {
		           $(".regions.form-group").addClass('form-select');
		           $("#sRegion-side").before('<select name="sRegion" id="regionId" ><option value="">Select a region</option></select>');
		           $("#sRegion-side").remove();
		         }

		         if( $("#cityId").length > 0 ){
		           $("#cityId").html('<option value="">Select a city</option>');
		         } else {
		           $(".citiess.form-group").addClass('form-select');
		           $("#sCity-side").parent().before('<select name="sCity" id="cityId" ><option value="">Select a city</option></select>');
		           $("#sCity-side").parent().remove();
		         }

		         $("#regionId").attr('disabled',true);
		         $("#cityId").parent().addClass('disabled');
		         $("#cityId").attr('disabled',true);

		      }
		      $('#countryId').parent().find('span').text($('#countryId').find(".selected" ).text()); 
			});
	</script>
	<?php
}?>
<!--JAVASCRIPT SEARCH LOCATION DROPDOWN-->
<script type="text/javascript">
	$(document).ready(function(){
		$('.form-select').on('change','#countryId',function(){
			var pk_c_code = $(this).val();
		    <?php $path = "front" ?>
			<?php if($path=="admin") { ?>
                var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
            <?php } else { ?>
                var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
            <?php }; ?>
		    var result = '';
		    if(pk_c_code != '') {
		        $("#regionId").attr('disabled',false);
		        $("#regionId").parent().removeClass('disabled');
		        $("#cityId").attr('disabled',false);
		        $("#cityId").parent().removeClass('disabled'); 

	        $.ajax({
	          type: "POST",
	          url: '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId=";?>'+ pk_c_code,
	          dataType: 'json',
	          success: function(data){
	            var length = data.length;
	            
	            if(length > 0) {
	              result += '<option value="">Select a region</option>';
	              for(key in data) {
	                result += '<option class="select-item" value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
	              }

	              $(".regions.form-group").addClass('form-select');
	              $("#sRegion-side").before('<span>Select a region</span><select name="sRegion" id="regionId" ></select>');
	              $("#sRegion-side").remove();

	              $(".cities.form-group").addClass('form-select');
	              $("#sCity-side").before('<span>Select a city</span><select name="sCity" id="cityId" ></select>');
	              $("#sCity-side").remove();
	              
	              $("#regionId").val("");
	            } else {

	              $(".regions.form-group").removeClass('form-select');
	              $("#regionId").parent().before('<input placeholder="Enter a region" type="text" name="sRegion" id="sRegion-side" />');
	              $("#regionId").parent().remove();
	              
	              $(".cities.form-group").removeClass('form-select');
	              $("#cityId").parent().before('<input placeholder="Enter a city" type="text" name="sCity" id="sCity-side" />');
	              $("#cityId").parent().remove();

	              $("#sCity-side").val('');
	            }

	            $("#regionId").html(result);
	            $("#cityId").html('<option selected value="">Select a city</option>');
	          }
	         });

	       } else {

	         // add empty select
	         $(".regions.form-group").addClass('form-select');
	         $("#sRegion-side").before('<select name="sRegion" id="regionId" ><option value="">Select a region</option></select>');
	         $("#sRegion-side").remove();
	         
	         $(".cities.form-group").addClass('form-select');
	         $("#sCity-side").before('<select name="sCity" id="cityId" ><option value="">Select a city</option></select>');
	         $("#sCity-side").remove();

	         if( $("#regionId").length > 0 ){
	           $("#regionId").html('<option value="">Select a region</option>');
	         } else {
	           $(".regions.form-group").addClass('form-select');
	           $("#sRegion-side").before('<select name="sRegion" id="regionId" ><option value="">Select a region</option></select>');
	           $("#sRegion-side").remove();
	         }

	         if( $("#cityId").length > 0 ){
	           $("#cityId").html('<option value="">Select a city</option>');
	         } else {
	           $(".citiess.form-group").addClass('form-select');
	           $("#sCity-side").parent().before('<select name="sCity" id="cityId" ><option value="">Select a city</option></select>');
	           $("#sCity-side").parent().remove();
	         }

	         $("#regionId").attr('disabled',true);
	         $("#cityId").attr('disabled',true);
	         $('#regionId').parent().addClass('disabled');
	         $('#cityId').parent().addClass('disabled');
	         $('#regionId').parent().find('span').text('select a region...');
		     $('#cityId').parent().find('span').text('select a city...');

	      }
		});
	    $('.form-group').on('change','#regionId',function(){
		      var pk_c_code = $(this).val();
		      <?php $path = "front" ?>
			  <?php if($path=="admin") { ?>
	                var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
	          <?php } else { ?>
	                var url = '<?php echo osc_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
	          <?php }; ?>
		      var result = '';

		      if(pk_c_code != '') {
		        
		        $("#cityId").attr('disabled',false);
		        $('#cityId').parent().removeClass('disabled');
		        $.ajax({
		          type: "POST",
		          url: url,
		          dataType: 'json',
		          success: function(data){
		            var length = data.length;
		            if(length > 0) {
		              result += '<option selected value="">Select a city</option>';
		              for(key in data) {
		                result += '<option class="select-item" value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
		              }

		              $("#sCity-side").before('<span>Select a city</span><select name="sCity" id="cityId" ></select>');
		              $("#sCity-side").remove();

		              $("#cityId").val("");
		            } else {
		              result += '<option selected value="">No cities found</option>';
		              $("#cityId").before('<input type="text" placeholder="Enter a city" name="sCity" id="sCity-side" />');
		              $("#cityId").remove();
		              $(".cities.form-group").removeClass('form-select');
		            }
		            $("#cityId").html(result);
		          }
		        });
		      } else {
		        $("#cityId").attr('disabled',true);
		        $("#cityId").parent().addClass('disabled');
		        $('#cityId').parent().find('span').text('select a city...');
		      }
		      $(this).parent().find('span').text($(this).find("option:selected" ).text());
		    });

		    if( $("#regionId").attr('value') == "")  {
		      $("#cityId").attr('disabled',true);
		      $("#cityId").parent().addClass('disabled');
		    } else {
		      $("#cityId").attr('disabled',false);
		      $("#cityId").parent().removeClass('disabled');
		    }

		    if($("#countryId").length != 0) {
		      if( $("#countryId").attr('value') == "")  {
		        $("#regionId").attr('disabled',true);
		        $("#cityId").parent().addClass('disabled');
		      }
		    }


		    //Make sure when select loads after input, span wrap is correctly filled
		    $('.form-group').on('change','#cityId',function(){
		      $(this).parent().find('span').text($(this).find("option:selected" ).text());
		    });
		    
	});
	$("#price-range").slider({
	    range: true,
	    min: <?php echo osc_esc_html( osc_get_preference('min_price', 'frclassifieds') ); ?>,
	    max: <?php echo osc_esc_html( osc_get_preference('max_price', 'frclassifieds') ); ?>,
	    step: <?php echo osc_esc_html( osc_get_preference('step_range', 'frclassifieds') ); ?>,
	    values: [<?php echo osc_esc_html( osc_get_preference('min_price', 'frclassifieds') ); ?>, <?php echo osc_esc_html( osc_get_preference('max_price', 'frclassifieds') ); ?>],
	    slide: function(event, ui) {
	        $('#priceMin').val(ui.values[0]);
	        $('#priceMax').val(ui.values[1]);
	    },
	    create:function(){
	        var values = $(this).slider( "option", "values" );
	        $('#priceMin').val(values[0]);
	        $('#priceMax').val(values[1]);
	    }
	});
</script>



