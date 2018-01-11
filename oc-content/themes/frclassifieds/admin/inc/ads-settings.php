<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="ads_settings" />
    <div class="col-xs-12">
        <div class="clear underline sticky head-bk">
           <h1 class=" pull-left"><?php _e('Ads Management', 'frclassifieds'); ?></h1>
            <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
        </div>
        <div class="marhin-wide"></div>
        <h3 class="underline"><?php _e('Home Page', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Home Page sidebar(Medium Rectangle):', 'frclassifieds')?>
                </div>
                <small><?php _e('Medium Rectangle, Displays better with 300x250 dimensions.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls">

                      <textarea name="home-page-sidebar" rows="5"><?php echo osc_esc_html( osc_get_preference('home-page-sidebar', 'frclassifieds') ); ?></textarea>
                      <span><?php _e('This ad will be shown in the home page, top left of your website after the search form, Note that the size of the ad has to be 300x500 pixels.', 'frclassifieds') ?></span>
                   </div>
            </div>
        </div>
        <div class="margin-thin"></div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Home Page Center(Leaderboard):', 'frclassifieds')?>
                </div>
                <small><?php _e('Leaderboard, Displays better with 728x90 banner.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls">
                      <textarea name="home-page-center" rows="5"><?php echo osc_esc_html( osc_get_preference('home-page-center', 'frclassifieds') ); ?></textarea>
                      <span><?php _e('This ad will be shown in the home page, after the latest listings section of your website, Note that the recommended size is 728x90/300x500 pixels.', 'frclassifieds') ?></span>
                   </div>
            </div>
        </div>
        <div class="margin-wide"></div>
        <h3 class="underline"><?php _e('Search Page', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Search Page Top:', 'frclassifieds')?>
                </div>
                <small><?php _e('Leaderboard or Rectangle:Displays better with 728x90 dimensions.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls">

                      <textarea name="search-page-top" rows="5"><?php echo osc_esc_html( osc_get_preference('search-page-top', 'frclassifieds') ); ?></textarea>
                      <span><?php _e('This ad will be shown after the header in the search page, Note that the size of the ad can be 728x90/300x500 pixels.', 'frclassifieds') ?></span>
                   </div>
            </div>
        </div>
        <div class="margin-thin"></div>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Search Page Bottom(Leaderboard):', 'frclassifieds')?>
                </div>
                <small><?php _e('Leaderboard, Displays better with 728x90 dimensions.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls">
                      <textarea name="search-page-bottom" rows="5"><?php echo osc_esc_html( osc_get_preference('search-page-bottom', 'frclassifieds') ); ?></textarea>
                      <span><?php _e('This ad will be shown after the subscribe form in the search page, Note that the size of the ad can be 728x90/300x500 pixels.', 'frclassifieds') ?></span>
                   </div>
            </div>
        </div>
        <div class="margin-medium"></div>
        <h3 class="underline"><?php _e('Single Page', 'frclassifieds'); ?></h3>
        <div class="col-xs-12 grey-bk">
            <div class="col-md-4 label">
                <div class="label-item">
                   <?php _e('Single Page sidebar:', 'frclassifieds')?>
                </div>
                <small><?php _e('Displays better with 300x250 dimensions.<br/>', 'frclassifieds')?></small>
            </div>
            <div class="col-md-8">
                   <div class="form-controls">
                      <textarea name="single-page-sidebar" rows="5"><?php echo osc_esc_html( osc_get_preference('single-page-sidebar', 'frclassifieds') ); ?></textarea>
                      <span><?php _e('This ad will be shown in the item page, the bottom right of your website. Note that the size of the ad has to be 300x500 pixels.', 'frclassifieds') ?></span>
                   </div>
            </div>
        </div>
    </div>
</form>

                      