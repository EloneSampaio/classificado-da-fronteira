<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('user user-items');
    osc_add_hook('before-main','sidebar');
    osc_current_web_theme_path('header.php') ;
    osc_current_web_theme_path('inc/message.php') ;
    View::newInstance()->_exportVariableToView('alerts', Alerts::newInstance()->findByUser(osc_logged_user_id()));
    
    //get total user premium items
    $premium_items = Item::newInstance()->countItemTypesByUserID(osc_logged_user_id(), 'premium');

    //get total active
    $active_items = Item::newInstance()->countItemTypesByUserID(osc_logged_user_id(), 'active');

    //get total blocked
    $blocked_items = Item::newInstance()->countItemTypesByUserID(osc_logged_user_id(), 'blocked');

    //get total spam
    $allUser_items = Item::newInstance()->findItemTypesByUserID(osc_logged_user_id());
    $spam_items = "";
    foreach ($allUser_items as $user_item) {
      $spam_items += $user_item["b_spam"];
    }

    //get total expired
    $expired_items = Item::newInstance()->countItemTypesByUserID(osc_logged_user_id(), 'expired');

    //get total pending_validate
    $pending_validate_items = Item::newInstance()->countItemTypesByUserID(osc_logged_user_id(), 'pending_validate');

    //marked as
    //$markedas_items = Item::newInstance()->findItemTypesByUserID(osc_logged_user_id())

    //find total user premium items
    $premium_details = Item::newInstance()->findItemTypesByUserID(osc_logged_user_id(), 0, null,'premium');

    $premium_active = 0;
    $premium_enable = 0;
    $premium_spam = 0;
    foreach ($premium_details as $premium) {
      $premium_enable += $premium["b_enabled"];
      $premium_active += $premium["b_active"];
      $premium_spam += $premium["b_spam"];
    }

    //get all items by user
    $items = Item::newInstance()->findByUserID(osc_logged_user_id());

    $comments = 0;
    
    foreach ($items as $item) {

      //get total user items comments
      $comments += ItemComment::newInstance()->totalComments($item["pk_i_id"]);

    }
    
    //store current user locale
    $locales   = __get('locales');  
    
    //osc_add_flash_error_message( _m($items['pk_i_id']));
    
?>
<section class="container-fluid dashboard">
    <div class="row">
      <!-- Nav tabs -->
      <?php osc_current_web_theme_path('user-account-nav.php'); ?>

      <!-- Tab panes -->
      <div class="col-sm-8">
          <div class="row">
                <div class="col-xs-12 text-left">
                    <h1><?php _e('Dashboard', 'frclassifieds')?></h1>
                    <hr class="straight-line">
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-4 col-md-6 info-panel">
                    <div class="panel panel-green">
                        <div class="panel-content">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo osc_user_items_validated(); ?></div>
                                        <div class="margin-thin"></div>
                                        <div><?php _e('Listings!', 'frclassifieds')?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-dropdown">
                                <a class="DropdwonToggle">
                                    <div class="panel-footer">
                                        <span class="pull-left"><?php _e('View Details', 'frclassifieds')?></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="panel-menu panel-details">
                                   <li><span><?php echo $active_items; ?></span><?php _e('Acive Items.', 'frclassifieds');?></li>
                                   <li><span><?php echo $blocked_items; ?></span><?php _e('Blocked Items.', 'frclassifieds');?></li>
                                   <li><span><?php echo $spam_items;  ?></span><?php _e('Marked as Spam.', 'frclassifieds');?></li>
                                   <li><span><?php echo $expired_items; ?></span><?php _e('Expired Items', 'frclassifieds');?></li>
                                   <li><span><?php echo $pending_validate_items; ?></span><?php _e('Pending Validation.', 'frclassifieds');?></li>
                                   <li><span><?php echo $expired_items; ?></span><?php _e('Acive Items', 'frclassifieds');?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 info-panel">
                    <div class="panel panel-yellow">
                        <div class="panel-content">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-star-o fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge"><?php echo $premium_items; ?></div>
                                      <div class="margin-thin"></div>
                                      <div><?php _e('Premimum Listings!', 'frclassifieds')?></div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel-dropdown">
                              <a class="DropdwonToggle">
                                  <div class="panel-footer">
                                      <span class="pull-left"><?php _e('View Details', 'frclassifieds')?></span>
                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                      <div class="clearfix"></div>
                                  </div>
                              </a>
                              <ul class="panel-menu panel-details">
                                 <li><span><?php echo $premium_active; ?></span><?php _e('Acive Premimum.', 'frclassifieds');?></li>
                                 <li><span><?php echo $premium_enable; ?></span><?php _e('Enabled Premimum.', 'frclassifieds');?></li>
                                 <li><span><?php echo $premium_spam;  ?></span><?php _e('Marked as Spam.', 'frclassifieds');?></li>
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 info-panel">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-info-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo osc_count_alerts(); ?></div>
                                    <div class="margin-thin"></div>
                                    <div><?php _e('Alerts!', 'frclassifieds')?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo osc_user_alerts_url(); ?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php _e('View Details', 'frclassifieds')?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          <i class="fa fa-bell fa-fw"></i><?php _e('Notifications Panel', 'frclassifieds'); ?>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body"> 
                          <?php if(osc_count_alerts() == 0) { ?>
                            <div class="list-group">
                                <a href="<?php echo osc_user_alerts_url(); ?>" class="list-group-item alert alert-warning" style="cursor:not-allowed;">
                                    <?php _e('You do not have any alerts yet :)');?>
                                </a>
                            </div>
                            <div class="margin-thin"></div>
                          <?php } else { ?>
                              <?php while(osc_has_alerts()) { ?>
                                <div class="list-group">
                                  <a href="<?php echo osc_user_alerts_url(); ?>" class="list-group-item alert alert-info">
                                      <?php _e('You have a new alert..');?>
                                      <span class="pull-right text-muted small"><em><?php echo osc_alert_date() ?></em>
                                      </span>
                                  </a>
                                </div>
                                <div class="margin-thin"></div>
                              <?php } ?>
                          <?php } ?>                                
                      </div>
                      <!-- /.panel-body -->
                  </div>
               </div>
               <div class="col-md-5 dashboard-side">
                   <div class="panel panel-default">
                      <div class="panel-heading">
                          <div class="panel">
                              <div class="panel-heading">
                                  <div class="row">
                                      <div class="col-xs-12 text-center">
                                          <div class="huge side">
                                                <div><?php echo $comments; ?></div>
                                                <div>
                                                  <span><?php _e('Total', 'frclassifieds')?></span>
                                                  <span><?php _e('Comments!', 'frclassifieds')?></span>
                                                </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <strong><i class="fa fa-info-circle fa-fw"></i><?php _e('Basic Account Information', 'frclassifieds')?></strong>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                         <h5><?php _e('Account Owner:', 'frclassifieds');?></h5> 
                         <span><?php echo osc_user_name(); ?></span>
                         <div class="margin-thin"></div>
                         <h5><?php _e('Email:', 'frclassifieds');?></h5> 
                         <span><?php echo '<a href="mailto:'.osc_user_email().'">'.osc_user_email().'</a>'; ?></span>
                         <div class="margin-thin"></div>
                         <h5><?php _e('Phone:', 'frclassifieds');?></h5> 
                         <span><?php if(osc_user_phone() !=''){echo osc_user_phone();}else{ _e('Add Your Number.', 'frclassifieds');} ?></span>
                         <div class="margin-thin"></div>
                         <h5><?php _e('Website:', 'frclassifieds');?></h5> 
                         <span><?php if(osc_user_website() !=''){echo '<a href="'.osc_user_website().'">'.osc_user_website().'</a>';}else{ _e('Add Your Number.', 'frclassifieds');} ?></span>
                         <div class="margin-thin"></div>
                         <h5><?php _e('Country:', 'frclassifieds');?></h5> 
                         <span><?php if(osc_user_country() !=''){echo osc_user_country();}else{ _e('Add Your Country.', 'frclassifieds');} ?></span>
                         <div class="margin-thin"></div>
                         <h5><?php _e('Region:', 'frclassifieds');?></h5> 
                         <span><?php if(osc_user_region() !=''){echo osc_user_region();}else{ _e('Add Your Region.', 'frclassifieds');} ?></span>
                         <div class="margin-thin"></div>
                         <h5><?php _e('City:', 'frclassifieds');?></h5> 
                         <span><?php if(osc_user_city() !=''){echo osc_user_city();}else{ _e('Add Your City.', 'frclassifieds');} ?></span>
                         <div class="margin-thin"></div>
                         <a href="<?php echo osc_user_profile_url(); ?>" class="btn btn-outlined btn-block btn-transparent"><?php _e('Edit', 'frclassifieds');?></a>
                      </div>
                      <!-- /.panel-body -->
                  </div>
               </div>
      </div>
      <div class="margin-wide"></div>
</section>
<?php osc_current_web_theme_path('user-footer.php') ; ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
