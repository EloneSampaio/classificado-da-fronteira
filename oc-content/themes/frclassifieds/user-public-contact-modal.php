<div class="modal fade" id="contact_me" tabindex="-1" role="dialog" aria-labelledby="contact_meLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content user-forms">
       <?php if(osc_logged_user_id() !=  osc_user_id()) { ?>
       <?php     if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
         <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="page-header">
              <h1 class="modal-title"><?php _e("Contact Me", 'frclassifieds'); ?></h1>
              <hr class="header-line">
            </div>
          </div>
          <div class="modal-body">
            <input type="hidden" name="action" value="contact_post" />
            <input type="hidden" name="page" value="user" />
            <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
            <div class="row">
                <div class="col-xs-12">
                   <ul id="error_list"></ul>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label" for="yourName"><?php _e('Your name', 'frclassifieds'); ?>:</label>
                        <div class="form-control border-radious-none input-lg">
                           <?php ContactForm::your_name(); ?>
                        </div>
                     </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label" for="phoneNumber"><?php _e('Phone number', 'frclassifieds'); ?> (<?php _e('optional', 'frclassifieds'); ?>):</label>
                        <div class="form-control border-radious-none input-lg">
                           <?php ContactForm::your_phone_number(); ?>
                        </div>
                     </div>
                </div>
                <div class="col-xs-12">
                     <div class="form-group">
                        <label class="form-label" for="yourEmail"><?php _e('Your e-mail address', 'frclassifieds'); ?>:</label>
                        <div class="form-control border-radious-none input-lg">
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

                <div class="col-xs-12">
                    <div class="controls">
                        <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                        <?php if( osc_recaptcha_public_key() ) { ?>
                        <script type="text/javascript">
                            var RecaptchaOptions = {
                                theme : 'custom',
                                custom_theme_widget: 'recaptcha_widget'
                            };
                        </script>
                        <style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:280px; } </style>
                        <div id="recaptcha_widget">
                            <div id="recaptcha_image"><img /></div>
                            <span class="recaptcha_only_if_image"><?php _e('Enter the words above','frclassifieds'); ?>:</span>
                            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                            <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'frclassifieds'); ?></a></div>
                        </div>
                        <?php } ?>
                        <?php osc_show_recaptcha(); ?>
                    </div>
                </div>
         </div><!--/ .row-->      
      </div>
      <div class="modal-footer">
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-outlined btn-theme btn-xl"><i class="fa fa-send"></i><?php _e("Send Message", 'frclassifieds');?></button>
                </div>
            </div>
      </div>
      </form>
            <?php ContactForm::js_validation(); ?>

         <?php
              }
        }else{ ?>

           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="page-header">
              <h1 class="modal-title"><?php _e("Contact Me", 'frclassifieds'); ?></h1>
              <hr class="header-line">
            </div>
          </div>
          <div class="modal-body">
              <div class="alert alert-info">
                  You cannot cantact the seller!!!
              </div>
          </div>
        <?php } ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog-->
</div><!--/ .modal-->
