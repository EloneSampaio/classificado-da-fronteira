<?php if( osc_comments_enabled() ) { ?>
  <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
      <div role="tabpanel" class="tab-pane fade" id="comments">
         <div class="product-comment">
         <?php $com = ''; if(osc_item_total_comments() == 1){$com ='comment';}else{$com = 'comments';}?>
        <h3><?php _e('This item has ' .osc_count_item_comments(). ' '. $com , 'frclassifieds'); ?></h3>
        <hr class="straight-default">
            <?php if( osc_count_item_comments() >= 1 ) { ?>
              <ul class="comments">
                 <?php while ( osc_has_item_comments() ) { ?>
                     <li class="clearfix">
                        <img src="<?php echo user_avatar_url(osc_comment_field("fk_i_user_id")); ?>" class="avatar img-circle" alt="">
                        <div class="post-comments">
                           <p class="meta"><?php echo osc_comment_pub_date(); ?> <span class="theme-color"> <?php echo osc_comment_author_name(); ?> </span><em><?php _e("Says", 'soko'); ?>:</em></p>
                           <p class="text-left">
                              <?php echo nl2br( osc_comment_body() ); ?>  
                          </p>
                          <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                              <div class="text-right">
                                  <i><a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'soko'); ?>"><small><?php _e('Delete', 'soko'); ?></small></a></i>
                              </div>
                          <?php } ?>
                        </div>
                     </li>
                 <?php } ?>
              </ul>
            <?php } ?>
            <div class="row">
                 <div class="user-forms">
                   <div class="col-xs-12">
                     <div class="col-xs-12">
                       <h3 class="alert alert-warning"><a class="btn ico btn-mini ico-close">x</a><?php _e('Leave your comment (spam and offensive messages will be removed)', 'soko'); ?></h3>
                    </div>
                   </div>
                   <div class="col-xs-12">
                     <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                        <div class="margin-thin"></div>
                        <fieldset>
                            <input type="hidden" name="action" value="add_comment" />
                            <input type="hidden" name="page" value="item" />
                            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                            <?php if(osc_is_web_user_logged_in()) { ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                               <label for="authorName" class="form-label"><?php _e('Your name:', 'frclassifieds')?></label>
                                               <div class="form-control border-radious-none">
                                                  <input type="text" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                               </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                               <label for="authorEmail" class="form-label"><?php _e('Your e-mail:', 'frclassifieds')?></label>
                                               <div class="form-control border-radious-none">
                                                  <input type="text" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                                               </div>
                                        </div>
                                    </div>
                                <?php }  else { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                           <label for="authorName" class="form-label"><?php _e('Your name:', 'frclassifieds')?></label>
                                           <div class="form-control border-radious-none">
                                              <?php CommentForm::author_input_text(); ?>
                                           </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                           <label for="authorEmail" class="form-label"><?php _e('Your e-mail:', 'frclassifieds')?></label>
                                           <div class="form-control border-radious-none">
                                              <?php CommentForm::email_input_text(); ?>
                                           </div>
                                    </div>
                                </div>
                            <?php }; ?>
                            <div class="col-xs-12">
                                <div class="form-group">
                                     <label class="form-label" for="body"><?php _e('Comment:', 'frclassifieds'); ?></label>
                                     <div class="form-control textarea border-radious-none">
                                          <?php CommentForm::body_input_textarea(); ?>
                                     </div>
                                 </div>
                                 <div class="margin-thin"></div> 
                            </div>
                            <div class="col-xs-12">
                                <button class="btn btn-default btn-theme btn-xl btn-outlined" type="submit"><i class="fa fa-send"></i><?php _e('Submit', 'frclassifieds'); ?></button>
                            </div>

                        </fieldset>
                    </form>
                    <div class="margin-medium"></div>
                   </div>
                 </div>
            </div>
       </div>
   </div>
  <?php } ?>
<?php } ?>