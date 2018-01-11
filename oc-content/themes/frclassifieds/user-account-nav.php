<?php $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  ?>
<div id="profile_sidebar" class="col-sm-4 padding-left-right-none">
    <div class="profile-box">
      <div class="profile-pic">
             <img src="<?php echo user_avatar_url(osc_user_id()); ?>" alt="<?php echo osc_user_name(); ?>"/>
      </div>
      <div class="text-center"><span class="name"><?php echo osc_user_name(); ?></span></div>
      <div class="margin-thin"></div>
      <div class="margin-thin"></div>
      <ul class="nav nav-stacked">
        <li role="presentation" class="<?php if($url == osc_user_dashboard_url()){ echo 'active';}?>"><a href="<?php echo osc_user_dashboard_url(); ?>"><i class="fa fa-dashboard fa-lg"></i><?php _e("Dashboard", 'frclassifieds'); ?></a></li>
        <li role="presentation" class="<?php if($url == osc_user_public_profile_url()){ echo 'active';}?>"><a href="<?php echo osc_user_public_profile_url(); ?>"><i class="fa fa-user fa-lg"></i><?php _e("Public Profile", 'frclassifieds'); ?></a></li>
        <li role="presentation" class="<?php if($url == osc_user_list_items_url()){ echo 'active';}?>"><a href="<?php echo osc_user_list_items_url(); ?>"><i class="fa fa-list fa-lg"></i><?php _e("Manage Listings", 'frclassifieds'); ?></a></li>
        <li role="presentation" class="<?php if($url == osc_user_alerts_url()){ echo 'active';}?>"><a href="<?php echo osc_user_alerts_url(); ?>"><i class="fa fa-info-circle fa-lg"></i><?php _e("Manage Alerts", 'frclassifieds'); ?></a></li>
        <li class="dropdown" role="presentation">
            <a class="dropdown-toggle"   href="#" data-toggle="dropdown"><i class="fa fa-gear fa-lg"></i><?php _e("Settings", 'frclassifieds'); ?><i class="pull-right fa fa-angle-down"></i></a>
            <ul  class="dropdown-menu dropdown-slide" role="menu">
                <li role="presentation" class="<?php if($url == osc_user_profile_url()){ echo 'active';}?>"><a href="<?php echo osc_user_profile_url(); ?>" ><i class="fa fa-user-secret "></i><?php _e("Profile", 'frclassifieds'); ?></a></li>
                <li role="presentation" class="<?php if($url == osc_change_user_username_url()){ echo 'active';}?>"><a href="<?php echo osc_change_user_username_url(); ?>" ><i class="fa fa-user"></i><?php _e("Change Username", 'frclassifieds'); ?></a></li>
                <li role="presentation" class="<?php if($url == osc_change_user_email_url()){ echo 'active';}?>"><a href="<?php echo osc_change_user_email_url(); ?>"><i class="fa fa-envelope"></i><?php _e("Change Email", 'frclassifieds'); ?></a></li>
                <li role="presentation" class="<?php if($url == osc_change_user_password_url()){ echo 'active';}?>"><a href="<?php echo osc_change_user_password_url(); ?>"><i class="fa fa-lock"></i><?php _e("Change Password", 'frclassifieds'); ?></a></li>
           </ul>
        </li>
     </ul>
     <div class="margin-wide"></div>
     <div class="margin-medium"></div>
  </div>      
</div>
<script>
    $('.profile-box ul li').hover(function(){
       $('.profile-box ul .active').removeClass('active');
       $(this).addClass('active'); 
    });
    $('.profile-box ul li').focus(function(){
       $('.profile-box ul .active').removeClass('active');
       $(this).addClass('active'); 
    });
    $('.profile-box ul li .active').parents('.dropdown').addClass('open');
</script>