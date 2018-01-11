<div>
   <div class="row">
      <div class="col-xs-12">
         <div id="contact" class="user-forms">
            <?php if( osc_item_is_expired () ) { ?>
            <div class="col-xs-12">
               <p>
               <div class="alert alert-info text-center"><?php _e("The listing is expired. You can't contact the publisher.", 'frclassifieds'); ?></div>
               </p>
               <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
               <p>
               <div class="alert alert-info text-centert"><?php _e("This item belongs to you, can't contact the seller!!!", 'frclassifieds'); ?></div>
               </p>
               <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
               <p>
               <div class="alert alert-info text-centert"><?php _e("You must log in or register a new account in order to contact the advertiser", 'frclassifieds'); ?></div>
               </p>
               <p class="contact_button">
                  <strong><a class="btn btn-theme btn-outlined btn-sm pull-left" href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'frclassifieds'); ?></a></strong>
                  <strong><a class="btn btn-theme btn-outlined btn-sm pull-left" href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'frclassifieds'); ?></a></strong>
               </p>
            </div>
            <?php } else { ?>
            <div class="col-xs-12">
               <div class="col-xs-12">
               <?php if( osc_item_user_id() != null ) { ?>
               <div class="name"><?php _e('Contact', 'frclassifieds') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></div>
               <?php } else { ?>
               <div class="name"><?php printf(__('Contact: %s', 'frclassifieds'), '<span>' .osc_item_contact_name()).'</span>'; ?></div>
               <?php } ?>
               <?php if( osc_item_show_email() ) { ?>
               <div class="email"><?php printf(__('E-mail: %s', 'frclassifieds'), '<span>'.osc_item_contact_email()) .'</span>'; ?></div>
               <?php } ?>
               <?php if ( osc_user_phone() != '' ) { ?>
               <div class="phone"><?php printf(__("Phone: %s", 'frclassifieds'), '<span>'.osc_user_phone()).'</span>'; ?></div>
               <?php } ?>
               <div class="margin-thin"></div>
               </div>
            </div>
            <div class="col-xs-12">
               <ul id="error_list"></ul>
            </div>
            <div class="col-xs-12">
               <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
                  <?php osc_prepare_user_info(); ?>
                  <input type="hidden" name="action" value="contact_post" />
                  <input type="hidden" name="page" value="item" />
                  <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label" for="yourName"><?php _e('Your name', 'frclassifieds'); ?>:</label>
                        <div class="form-control border-radious-none">
                           <?php ContactForm::your_name(); ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label" for="phoneNumber"><?php _e('Phone number', 'frclassifieds'); ?> (<?php _e('optional', 'frclassifieds'); ?>):</label>
                        <div class="form-control border-radious-none">
                           <?php ContactForm::your_phone_number(); ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12">
                     <div class="form-group">
                        <label class="form-label" for="yourEmail"><?php _e('Your e-mail address', 'frclassifieds'); ?>:</label>
                        <div class="form-control border-radious-none">
                           <?php ContactForm::your_email(); ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12">
                     <div class="form-group">
                        <label class="form-label" for="message"><?php _e('Message', 'frclassifieds'); ?>:</label>
                        <div class="form-control textarea border-radious-none">
                           <?php ContactForm::your_message(); ?>
                        </div>
                     </div>
                     <div class="margin-thin"></div>
                  </div>
                  <?php if(osc_item_attachment()) { ?>
                  <div class="col-xs-12">
                     <div class="form-group">
                        <label class="form-label" for="attachment"><?php _e('Attachment', 'frclassifieds'); ?>:</label>
                        <div class="form-control border-radious-none">
                           <?php ContactForm::your_attachment() ; ?>
                        </div>
                     </div>
                  </div>
                  <?php }; ?>
                  <div class="col-xs-12">
                     <button type="submit" class="btn btn-outlined btn-theme btn-xl"><i class="fa fa-send"></i><?php _e("Send Message", 'frclassifieds');?></button>
                  </div>
               </form>
               <?php ContactForm::js_validation(); ?>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <!--row-->
</div>
<!-- /sidebar -->