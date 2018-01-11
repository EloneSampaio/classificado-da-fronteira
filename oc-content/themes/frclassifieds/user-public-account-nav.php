
<div id="profile_sidebar" class="col-sm-4 padding-left-right-none">
    <div class="profile-box">
      <div class="profile-pic">
             <img src="<?php echo user_avatar_url(osc_user_id()); ?>" alt="<?php echo osc_user_name(); ?>"/>
      </div>
      <div class="margin-thin"></div>
      <div class="text-center"><span class="name"><?php echo osc_user_name(); ?></span></div>
      <div class="margin-thin"></div>
      <div class="margin-thin"></div>
      <div class="clearfix">
        <div class="profile-buttons">
           <a href="mailto:<?php if( osc_user_email() !== '' ) { echo osc_user_email(); } ?>" class="btn btn-outlined btn-theme btn-xl">
              <i class="fa fa-envelope"></i><?php _e('Email Me', 'frclassifieds')?>
           </a>
        </div>
        <div class="profile-buttons">
          <a href="<?php if( osc_user_website() !== '' ) { echo osc_user_website(); } ?>" target="blank" class="btn btn-outlined btn-theme btn-xl">
              <i class="fa fa-globe"></i><?php _e('My Website', 'frclassifieds')?>
           </a>
        </div>
      </div>
      <ul class="nav nav-stacked" role="tablist">
        <?php if(osc_is_web_user_logged_in() && osc_logged_user_id() ==  osc_user_id()) { ?>
          <li role="presentation"><a href="<?php echo osc_user_dashboard_url(); ?>"><i class="fa fa-dashboard fa-lg"></i><?php _e("My Dashboard", 'frclassifieds'); ?></a></li>
        <?php } ?>
        <li role="presentation" class="active"><a href="#public_profile" aria-controls="public_profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i><?php _e("My Profile", 'frclassifieds'); ?></a></li>
        <li role="presentation"><a href="#my_Listings" aria-controls="my_Listings" role="tab" data-toggle="tab"><i class="fa fa-list"></i><?php _e("My Listings", 'frclassifieds'); ?></a></li>
        <li role="presentation"><a href="#contact_me"  data-toggle="modal" data-target="#contact_me"><i class="fa fa-phone"></i><?php _e("Contact Me", 'frclassifieds'); ?></a></li>
     </ul>
     <div class="margin-wide"></div>
       <?php echo user_sm_profiles(osc_user()); ?>
     <div class="margin-wide"></div>
  </div>
</div>
<script>
   var profileNavWidht = $('.profile-box').width();

   if(profileNavWidht < 320){
      $('.profile-box .profile-buttons').css("width","100%");
   };
</script>