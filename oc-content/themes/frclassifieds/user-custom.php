<?php

    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('user user-custom');
    osc_add_hook('before-main','sidebar');

    osc_current_web_theme_path('header.php') ;
    osc_current_web_theme_path('inc/message.php') ;

    osc_render_file();
    osc_current_web_theme_path('user-footer.php') ;
    osc_current_web_theme_path('footer.php');
?>