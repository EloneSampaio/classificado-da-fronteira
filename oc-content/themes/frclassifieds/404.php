<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');
    frclassifieds_add_body_class('error not-found');
    osc_current_web_theme_path('header.php') ;
?>
<div class="container">
    <div class="flashmessage-404 text-center">
        <h1><?php _e("Sorry but I can't find the page you're looking for", 'frclassifieds') ; ?></h1>

        <p><?php _e("Let us help you, we have got a few tips for you to find it.", 'frclassifieds') ; ?></p>
       <div class="row">
            <div class="user-forms">
                <div>
                    <div class="col-sx-12 text-center">
                        <h1><?php _e("Search</strong> for it:", 'frclassifieds') ; ?></h1>
                    </div>
                    <form action="<?php echo osc_base_url(true) ; ?>" method="get" class="search">
                        <input type="hidden" name="page" value="search" />
                        <fieldset>
                            <div class="col-sm-5 col-sm-offset-2">
                                <div class="form-group">
                                    <div class="form-control border-radious-none input-lg">
                                       <input type="text" name="sPattern"  id="query" value="" />
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                 <button type="submit" class="btn btn-outlined btn-theme btn-xl"><?php _e('Search', 'frclassifieds') ; ?></button>
                             </div>
                        </fieldset>
                    </form>
                </div>
            </div>
       </div>
    </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>