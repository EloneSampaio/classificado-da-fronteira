<?php 
    $conn = getConnection(); 
    $categories = Category::newInstance()->toTreeAll();
?>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="category_icons" />
    <div class="col-xs-12">
        <div class="clear underline sticky head-bk">
           <h1 class=" pull-left"><?php _e('Category Icons', 'frclassifieds'); ?></h1>
            <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
        </div>
        <div class="margin-thin"></div>
        <h3><?php _e('Category Settings:', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-3 label">
                <div class="label-item">
                   <?php _e('Category Icons', 'frclassifieds'); ?>
                </div>
                <small><?php _e('Enter your ctegory icons.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                  <?php foreach($categories as $c) { ?>
                  <div class="row">
                      <div class="col-md-2 label">
                          <div class="label-item">
                             <?php _e($c['s_name'] . ':', 'frclassifieds'); ?>
                          </div>
                      </div>
                      <div class="col-md-1">
                         <i class="<?php echo frc_category_icon($c['pk_i_id']); ?>"></i>
                      </div>
                      <div class="col-md-9">
                           <div class="form-controls">
                             <input type="text" name="icon-<?php echo $c['pk_i_id']; ?>" value="<?php echo osc_get_preference('icon-' . $c['pk_i_id'], 'frclassifieds'); ?>" <?php echo (osc_get_preference('icon-' . $c['pk_i_id'], 'frclassifieds')); ?> >
                           </div>
                      </div>
                  </div>
                  <div class="margin-thin"></div>
                  <?php } ?>
            </div>
        </div>
    </div>
</form>

                    