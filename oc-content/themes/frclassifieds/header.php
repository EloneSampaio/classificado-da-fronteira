<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php') ; ?>
    </head>
    <?php echo header_js(); ?>
<body <?php frclassifieds_body_class(); ?>>
<header>
<!--information bar header-->
 <?php echo notify_header(); ?>
<!--Navigation-->
  <div class="navbar navbar-default"> 
     <div class="links">
        <div class="container-fluid">
            <nav class="nav-links clearfix">
                <ul class="nav-links-left"> 
                    <li>
                       <?php 
                           $help_line_hide = osc_get_preference('hide-help-line', 'frclassifieds');
                           if($help_line_hide==''){
                                echo '<span>Call Us: </span><span class="left-span" >'.osc_esc_html(__(osc_get_preference('help-line', 'frclassifieds'), 'frclassifieds')).'</span>';
                           }
                        ?>
                    </li>
                 </ul>
                 <ul id="navbar_links" class="nav-links-right">
                    <?php 
                          $hide_contact_link = osc_get_preference('hide-contact-link', 'frclassifieds');
                           if($hide_contact_link==''){
                               echo '<li><a href="'.osc_contact_url().'" class="left-span" >'. __('Contact', 'frclassifieds').'</a></li>';
                           }
                    ?>
                    <?php if ( osc_count_web_enabled_locales()) { ?>
                         <li class="dropdown languages no-pointer">
                              <?php osc_goto_first_locale(); ?>
                              <?php 
                                  $ulocales = osc_get_current_user_locale();
                                  $ulocalescode = osc_locale_code();
                              ?>
                              <a class="<?php echo $ulocales['pk_c_code']; ?>" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $ulocales['s_name'];  ?><span class="flag-icon flag-icon-<?php echo $ulocales['pk_c_code']; ?>"></span></a>
                              <?php if(osc_count_web_enabled_locales() > 1) {?>
                              <ul class="dropdown-menu" aria-labelledby="slectLanguage">
                                  <?php while ( osc_has_web_enabled_locales() ) { ?>
                                    <?php if (osc_locale_code() != osc_current_user_locale()){ ?>
                                        <li>
                                             <a id="<?php echo osc_locale_code(); ?>" class="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?><span class="flag-icon flag-icon-<?php echo osc_locale_code(); ?>"></span></a>
                                        </li>
                                    <?php }?> 
                                  <?php } ?>
                              </ul>
                              <?php } ?>
                        </li>
                    <?php } ?>
                 </ul>
            </nav>
        </div>
     </div>
     <div class="container nav-container">
           <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle-nav" aria-expanded="false">
                  <!--Toggle navigation-->
                  <span class="sr-only"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <!--brand-->
               <div class="navbar-brand">
                  <?php echo logo_header();?>
                  <!--log site name here-->
               </div>
           </div>
        <!--Nav content-->
           <div class="collapse navbar-collapse" id="toggle-nav">
               <ul class="nav navbar-nav navbar-right">
                <?php if( osc_users_enabled() ) { ?>
                    <li class="set-nav-icon dropdown account">
                         <?php if( osc_is_web_user_logged_in() ) { ?>
                             <a href="#" id="account" class="dropdown-toggle theme-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="nav-icon"><i class="px px-unlocked"></i></span>
                                 <span class="nav-icon-text"><?php _e('Account', 'frclassifieds'); ?></span>
                             </a>
                             <ul id="login-dp" class="dropdown-menu" aria-labelledby="account"> 
                                <li>
                                    <a href="<?php echo osc_user_dashboard_url(); ?>"><i class="fa fa-dashboard"></i> <?php _e('Dashboard', 'frclassifieds'); ?> </a>
                                </li>
                                <li>
                                   <a href="<?php echo osc_user_public_profile_url(osc_logged_user_id()); ?>"><i class="fa fa-user"></i><?php _e('Profile', 'frclassifieds'); ?> </a>
                                 </li>
                                 <li>
                                 <a href="<?php echo osc_user_list_items_url( ); ?>"><i class="fa fa-list fa-lg"></i><?php _e("Listings", 'frclassifieds'); ?></a>
                                 </li>
                                 <li>
                                   <a href="<?php echo osc_user_profile_url(); ?>"><i class="fa fa-gear"></i><?php _e('Account Settings', 'frclassifieds'); ?></a>
                                 </li>
                                 <li>
                                   <a href="<?php echo osc_user_logout_url(); ?>"><?php _e('<i class="glyphicon glyphicon-log-out"></i>Logout', 'frclassifieds'); ?></a>
                                 </li>
                             </ul>
                        <?php } else { ?>
                            <a href="#" id="account" class="dropdown-toggle theme-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="nav-icon"><i class="px px-locked"></i></span>
                                 <span class="nav-icon-text"><?php _e('Account', 'frclassifieds'); ?></span>
                             </a>
                             <ul id="login-dp" class="dropdown-menu user-forms" aria-labelledby="account">
                                   <div class="margin-medium"></div>
                                   <div class="col-xs-12">
                                        <form action="<?php echo osc_base_url(true); ?>" method="post" >
                                            <input type="hidden" name="page" value="login" />
                                            <input type="hidden" name="action" value="login_post" />
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="email"><?php _e('Email', 'frclassifieds'); ?></label>
                                                        <div class="form-control border-radious-none input-sm">
                                                            <?php UserForm::email_login_text(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password"><?php _e('Password', 'frclassifieds'); ?></label>
                                                        <div class="form-control border-radious-none input-sm">
                                                            <?php UserForm::password_login_text(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <span class="button-checkbox p-link">
                                                      <a href="<?php echo osc_recover_user_password_url(); ?>" class="pull-right theme-color"><?php _e('Forgot Password?', 'frclassifieds');?></a>
                                                    </span>
                                                    <div class="margin-thin"></div>
                                                    <div class="margin-thin"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group" >
                                                        <button class="btn btn-outlined btn-theme btn-block" type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Log in", 'frclassifieds');?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom">
                                        <?php if(osc_user_registration_enabled()) { ?>
                                          <?php _e('New here ?', 'frclassifieds')?> <a href="<?php echo osc_register_account_url(); ?>" class="theme-color"><b><?php _e('Join Us', 'frclassifieds')?></b></a>
                                        <?php }?>
                                    </div>
                                </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
               <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
                  <li class="set-nav-icon">
                     <a href="<?php echo osc_item_post_url_in_category() ; ?>" class="theme-color">
                     <span class="nav-icon"><i class="px px-add"></i></span>
                     <span class="nav-icon-text"><?php _e("Publish", 'frclassifieds');?></span>
                     </a>
                  </li>
              <?php } ?>
                  <?php $uCountry = osc_country(); ?>
                  <li class="set-nav-icon dropdown  location-setting">
                     <a  href="#" class="theme-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="nav-icon"><i class="px px-map-pin-o"></i></span>
                        <span class="nav-icon-text"><?php _e("Location", 'frclassifieds');?></span>
                     </a>
                     <ul id="geolocation" class="dropdown-menu location-menu" role="menu">
                       <div class="row">
                          <div class="col-xs-12">
                              <h5><?php _e('Current <em>Location</em> is set to:', 'frclassifieds' )?>  
                                 <div class="margin-thin"></div>
                                 <p class="theme-color">
                                    <ul class="text-left padding-none margin-none">
                                       <i class="glyphicon glyphicon-hand-right theme-color"></i>
                                       <span class="theme-color"><u><?php echo get_country_location(); ?></u></span>
                                    </ul>
                                  </p>
                              </h5>
                             <hr>
                          </div>
                          <li class="col-xs-12">
                            <div class="form-group" id="setLocation">
                                <ul>
                                    <label class="theme-color" for="u_Location"><h5><strong><?php _e('Change Location:', 'frclassifieds' )?></strong></h5></label>
                                    <input type="submit" class="form-control border-radious-none"  value="Select Location"/>
                                    <ul class="location-menu">
                                        <?php $aCountry = Country::newInstance()->listAll(); ?>
                                        <?php if(count($aCountry) > 0 ) { ?>
                                        <?php foreach($aCountry as $country) { ?>
                                            <?php $aRegions = RegionStats::newInstance()->listRegions($country['pk_c_code']); ?>
                                            <li class='<?php if(count($aRegions) > 1 ) {echo 'has-sub ';} if($country['pk_c_code'] == get_user_country_code() ){echo'active';}?>'>
                                              <a class="dropdown-toggle" href='#'>
                                                 <input id="sCountry" type="checkbox" name="sCountry" value="<?php echo $country['pk_c_code'] ; ?>" style="opacity:0;"/>
                                                 <i class="glyphicon <?php if($country['pk_c_code'] == get_user_country_code() ){echo' glyphicon-check';}else{echo' glyphicon-unchecked';}?>"></i>
                                                 <span><?php _e($country['s_name'], 'frclassifieds' ); ?></span>
                                              </a>
                                              <?php if(count($aRegions) > 0 ) { ?>
                                                  <ul>
                                                    <?php foreach($aRegions as $region) { ?>
                                                     <li>
                                                        <a href='#' class="<?php if(get_region_location() == $region['region_name']){echo' current';}?>">
                                                          <input type="checkbox" id="sRegion" name="sRegion" value="<?php echo $region['region_name'] ; ?>" style="opacity:0;"  />
                                                          <i class="glyphicon<?php if(get_region_location() == $region['region_name']){echo' glyphicon-check';}else{echo' glyphicon-unchecked';}?>"></i>
                                                          <span><?php _e($region['region_name'], 'frclassifieds' ); ?></span>
                                                        </a>
                                                      </li>
                                                    <?php } ?>
                                                  </ul>
                                              <?php } ?>
                                            </li>
                                        <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </ul>
                            </div>
                          </li>
                          <script type="text/javascript">
                             $(document).ready(function(){
                                $( "#setLocation li a i" ).click(function(){
                                    $check = $(this);
                                    $(this).parent().find('input').prop( "checked", true );
                                    $('#setLocation li a i.glyphicon-check').toggleClass('glyphicon-check glyphicon-unchecked');
                                    $check.toggleClass('glyphicon-check glyphicon-unchecked');
                                    $('a.current').removeClass('current');
                                    $check.parent().addClass('current');
                                //$( "#setLocation li a input" ).change(function() {
                                  var $input = $(this).parent().find('input');
                                  var $country = $( this ).parents('li.has-sub').find('input#sCountry');
                                  var $region = $('#setLocation input#sRegion');

                                  if ($input.is($region)) {
                                    //$check.parents('.has-sub').find('.dropdown-toggle i').toggleClass('glyphicon-check glyphicon-unchecked');
                                    if ( $( $input).prop( "checked" )){
                                         $( $country ).prop( "checked", true );
                                         $( $input ).prop( "checked", true );
                                         var country_val = $country.val();
                                         var region_val = $input.val();
                                         var locationchange = 'change';
                                         var time = 86400;

                                         var dataString = 'locationchange='+ locationchange + '&country=' + country_val + '&region=' + region_val + '&time=' + time;

                                         $('body').addClass('refresh-page');
                                         //alert (dataString);
                                         
                                         //Initiate a ajax request
                                         $.ajax({
                                            type: "POST",
                                            url: "<?php echo osc_base_url(true); ?>",
                                            data: dataString,
                                            success: function(data) {
                                              location.reload();
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                              alert('Failed to load location');
                                              location.reload();
                                            }
                                          });
                                          $( $country ).prop( "checked", false );
                                          $( $input ).prop( "checked", false );
                                         
                                    }
                                  }else{
                                    if ( $( $input).prop( "checked" )){
                                         $( $input ).prop( "checked", true );
                                         var country_val  = $input.val();
                                         var locationchange = 'change';
                                         var time = 86400;

                                         var dataString = 'locationchange='+ locationchange + '&country=' + country_val + '&time=' + time;
                                         
                                         $('body').addClass('refresh-page');
                                         //alert (dataString);
                                         //Initiate a ajax request
                                         $.ajax({
                                            type: "POST",
                                            url: "<?php echo osc_base_url(true); ?>",
                                            data: dataString,
                                            success: function(data) {
                                              location.reload();
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                              alert('Failed to load location');
                                              location.reload();
                                            }
                                          });
                                         $( $input ).prop( "checked", false );
                                    }
                                  }
                                  
                                //}).change();
                                });
                                
                                $('.clear-location').click(function(e){
                                         e.preventDefault();
                                         var country_val = 'empty';
                                         var region_val = 'empty';
                                         var locationchange = 'change';
                                         var time = -86400;

                                         var dataString = 'locationchange='+ locationchange + '&country=' + country_val + '&region=' + region_val + '&time=' + time;

                                         //alert (dataString);
                                         
                                         //Initiate a ajax request
                                         $.ajax({
                                            type: "POST",
                                            url: "<?php echo osc_base_url(true); ?>",
                                            data: dataString,
                                            success: function(data) {
                                              location.reload();
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                              alert('Failed to load location');
                                            }
                                          });
                                });
                             });
                          </script>
                          <?php set_location(); ?>
                       </div>
                       <div class="bottom">
                            <?php _e('Back to', 'frclassifieds')?> <a href="<?php echo osc_register_account_url(); ?>" class="theme-color clear-location refresh"><b><?php _e('Default', 'frclassifieds')?></b></a>            
                      </div>
                     </ul>
                  </li>
               </ul>
           </div>
     </div>
  </div>
</header>

