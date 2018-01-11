<?php
    $js_lang = array(
        'delete' => __('Delete', 'frclassifieds'),
        'cancel' => __('Cancel', 'frclassifieds')
    );
    /*The latest [Modernizr](http://modernizr.com/) build for feature detection*/
    osc_register_script('modernizr-js', osc_current_web_theme_js_url('vendor/modernizr-2.8.3.min.js'),'jquery');
    osc_enqueue_script('modernizr-js');
    osc_register_script('niceScroll-js', osc_current_web_theme_js_url('vendor/jquery-nicescroll.js'),'jquery');
    osc_enqueue_script('niceScroll-js');
    osc_register_script('viewportchecker-js', osc_current_web_theme_js_url('vendor/jquery.viewportchecker.min.js'),'jquery');
    osc_enqueue_script('viewportchecker-js');
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo meta_title() ; ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<!-- canonical -->
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<!-- /canonical -->
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- /favicon -->
<?php echo show_favicon(); ?>
<!-- /favicon -->

<link href="https://fonts.googleapis.com/css?family=Lato:400,300,500,600,700,400italic,500italic" rel="stylesheet" type="text/css" /><!-- lato fonts-->

<script type="text/javascript">
    var frclassifieds = window.frclassifieds || {};
    frclassifieds.base_url = '<?php echo osc_base_url(true); ?>';
    frclassifieds.langs = <?php echo json_encode($js_lang); ?>;       
</script>
<script type="text/javascript">
    var fileDefaultText = '<?php echo osc_esc_js( __('No file selected', 'frclassifieds') ); ?>';
    var fileBtnText     = '<?php echo osc_esc_js( __('Choose File', 'frclassifieds') ); ?>';
</script>
<?php 
    osc_enqueue_script('jquery-uniform');
    osc_enqueue_script('tabber');
    osc_run_hook('header');
?>

