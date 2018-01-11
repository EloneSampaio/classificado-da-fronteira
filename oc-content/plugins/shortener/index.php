<?php
/*
Plugin Name: Shortener
Plugin URI: http://plugins-zone.com/free-plugins-for-osclass/url-shortener.html
Description: This plugin enables you to short long urls.
Version: 1.0.1
Author: cartagena68
Author URI: http://plugins-zone.com/
Short Name: shortener
Plugin update URI: http://plugins-zone.com/free-plugins-for-osclass/url-shortener.html
*/

// Install Plugin
function shortener_install() {
    
    $conn = getConnection();
    $conn->autocommit(false);
    try {
        $path = osc_plugin_resource('shortener/struct.sql');
        $sql = file_get_contents($path);
        $conn->osc_dbImportSQL($sql);
        $conn->commit();
        } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
	$conn->autocommit(true);
		osc_set_preference('http', 'off', 'shortener', 'STRING');
        
	rename(osc_plugins_path().'shortener/short', osc_base_path().'short');
	@mkdir(osc_base_path().'short/cache/', 0777, true);
	
}
// Uninstall Plugin
function shortener_uninstall() {
    $conn = getConnection();
    $conn->autocommit(false);
    try {
        $conn->osc_dbExec('DROP TABLE shortenedurls');
        $conn->commit();
        } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
	$conn->autocommit(true);
	osc_delete_preference('http', 'shortener');
	
	$cache_folder = osc_base_path().'short/cache/';
 	shortener_delete_cache($cache_folder);
	rename(osc_base_path().'short', osc_plugins_path().'shortener/short');
}

function shortener_delete_cache($dir) {
		$structure = glob(rtrim($dir, "/").'/*');
    	if (is_array($structure)) {
        foreach($structure as $file) {
        if (is_dir($file)) cacheplugin_recursiveRemove($file);
        elseif (is_file($file)) unlink($file);
        	}
   		 }
   	 rmdir($dir);
	}

function short_url($url){
$shortUrl = file_get_contents(osc_base_url().'/short/shorten.php?longurl='.$url);
if(osc_get_preference('http', 'shortener') == 'off') {
$cleanUrl = str_ireplace(array('http://','https://'),array('',''),$shortUrl);
} else {
	$cleanUrl = $shortUrl ;
}
$outputUrl = '<a href="'.$shortUrl.'">'.$cleanUrl.'</a>';

	return $outputUrl ;
}

function printpdf_shorted_url($url){
	$shortUrl = file_get_contents(osc_base_url().'/short/shorten.php?longurl='.$url);
	if(osc_get_preference('http', 'shortener') == 'off') {
	$cleanUrl = str_ireplace(array('http://','https://'),array('',''),$shortUrl);
	} else {
	$cleanUrl = $shortUrl ;
}
		return $cleanUrl ;
	
	}
	
function shortener_admin_menu() {
    echo '<h3><a href="#">Shortener</a></h3>
    <ul>
        <li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'conf.php') . '">&raquo; ' . __('Configure', 'plugincache') . '</a></li>
		<li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'help.php') . '">&raquo; ' . __('Help', 'plugincache') . '</a></li>
    </ul>';
}

function shortener_conf() {
        osc_admin_render_plugin(osc_plugin_path(dirname(__FILE__)) . '/conf.php') ;
    }


// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'shortener_install');

// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'shortener_uninstall');

osc_add_hook(osc_plugin_path(__FILE__) . '_configure', 'shortener_conf');

osc_add_hook('admin_menu', 'shortener_admin_menu');
?>
