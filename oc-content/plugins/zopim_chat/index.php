<?php
/*
Plugin Name: Zopim live support chat
Plugin URI: http://plugins-zone.com/free-plugins-for-osclass/zopim-chat.html
Description: This plugin enables you to show live support chat window on your site.
Version: 1.0.0
Author: cartagena68
Author URI: http://plugins-zone.com
Short Name: zopim
Plugin update URI: http://plugins-zone.com/free-plugins-for-osclass/zopim-chat.html
*/

function zopim_chat_install() {
	osc_set_preference('zopimID', '','zopim_chat','STRING');
	}

// Uninstall Plugin

function zopim_chat_uninstall() {
	 osc_delete_preference('zopimID','zopim_chat');
	}

function zopim_chat_js() {
	echo ' 
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?'.osc_get_preference('zopimID','zopim_chat').'";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
' ;
	}
	
function zopim_chat_admin_menu() {
    echo '<h3><a href="#">Zopim Chat</a></h3>
    <ul>
        <li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin/admin.php') . '">&raquo; ' . __('Admin', 'zopim') . '</a></li>
    </ul>';
}
	
function zopim_chat_admin() {
        osc_admin_render_plugin(osc_plugin_path(dirname(__FILE__)) . '/admin/admin.php') ;
    }

// HOOKS

// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'zopim_chat_install');

// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'zopim_chat_uninstall');

osc_add_hook(osc_plugin_path(__FILE__) . '_configure', 'zopim_chat_admin');

osc_add_hook('admin_menu', 'zopim_chat_admin_menu');

osc_add_hook('header','zopim_chat_js');

?>