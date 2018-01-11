<div class="row">
	<div class="col-xs-12">
		<?php $location_widget_activated = osc_get_preference('show-locations', 'frclassifieds'); ?>
		<?php $contry_code = get_user_country_code();
            if($contry_code !=''){
               $code = $contry_code;
            }else{
            	$code = 0;
            }
		?>
		<?php if($location_widget_activated=!'' && $location_widget_activated == 'activated'){?>
		   	<?php if(osc_count_list_regions($code) > 0 ) { ?>
		        <div class="box location">
			        <ul>
			        <?php while(osc_has_list_regions() ) { ?>
			            <li><a class="btn btn-outlined btn-sm btn-transparent-theme <?php if(get_region_location() == osc_list_region_name() ){ echo 'active'; }?>" href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name() ; ?> <em>(<?php echo osc_list_region_items() ; ?>)</em></a></li>
			        <?php } ?>
			        </ul>
		        </div>
		    <?php } ?>
		<?php } ?>
	</div>
</div>