<?php
    // meta tag robots
    osc_add_hook('header','frclassifieds_nofollow_construct');

    frclassifieds_add_body_class('page');
    osc_current_web_theme_path('header.php') ;
    osc_current_web_theme_path('inc/message.php') ; 
?>
<div class="container">
	<div class="page-default">
	    <div class="margin-thin"></div>
		<h3 class="section-title theme-color">
		    <?php
               $words = explode(' ', osc_static_page_title());
               for($x = 0; $x <= 0; $x++) { 
                $words[$x] = '<span>'.$words[$x].'</span>';
              }
              $title = implode(' ', $words);

                _e($title, 'frclassifieds');
            ?>
        </h3>
        <div class="page-content">
        	<?php echo osc_static_page_text(); ?>
        </div>
        
	</div>
</div><!--container-->

<?php osc_current_web_theme_path('footer.php') ; ?>