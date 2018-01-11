<?php
/*
 *      OSCLass – software for creating and publishing online classified
 *                           advertising platforms
 *
 *                        Copyright (C) 2010 OSCLASS
 *
 *       This program is free software: you can redistribute it and/or
 *     modify it under the terms of the GNU Affero General Public License
 *     as published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful, but
 *         WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public
 * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
 if (Params::getParam('plugin_action') == 'save')

{
	osc_set_preference("AdminTags", Params::getParam('admin_tags'),'tags','STRING');
	echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. Admin tags are now saved.', 'tags') . '.<a href="#" title="Close Message" onclick="parentNode.remove()" style="float:right;font-weight:bold;padding-right:50px;color:#FFFFFF;">' . __('x', 'tags') . '</a></p></div>';

	osc_reset_preferences();

} else if (Params::getParam('plugin_action') == 'css')

{
	osc_set_preference("StyleCss", Params::getParam('style_css'),'tags','STRING');
	echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The tags style is now configured.', 'tags') . '.<a href="#" title="Close Message" onclick="parentNode.remove()" style="float:right;font-weight:bold;padding-right:50px;color:#FFFFFF;">' . __('x', 'tags') . '</a></p></div>';

	osc_reset_preferences();

} else if (Params::getParam('plugin_action') == 'updatemaxtags')

{
osc_set_preference("MaxUserTags", Params::getParam('MaxuserTags'),'tags','STRING');

echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. Max number of tags is now configured.', 'tags') . '.<a href="#" title="Close Message" onclick="parentNode.remove()" style="float:right;font-weight:bold;padding-right:50px;color:#FFFFFF;">' . __('x', 'tags') . '</a></p></div>';

	osc_reset_preferences();
}
?>

<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
<div style="padding:20px;">
 <form name="tags_form" id="tags_form" action="<?php

echo osc_admin_base_url(true);

?>" method="POST" enctype="multipart/form-data" >

                                <div style="float: left; width: 100%;">



                                    <input type="hidden" name="page" value="plugins" />



                                    <input type="hidden" name="action" value="renderplugin" />



                                    <input type="hidden" name="file" value="<?php

echo osc_plugin_folder(__FILE__);

?>admin.php" />



                                    <input type="hidden" name="plugin_action" value="css" />



                                    <label for="style_css" style="font-weight:700;font-size:16px;"><?php

_e('Set if you want styled tags or text tags', 'tags');

?></label>
<?php

$ImageOrText = osc_get_preference('StyleCss', 'tags');

?><br/><br/>
<input type="radio" name="style_css" id="style_css" value="on" <?php

if ($ImageOrText == 'on')

{

	echo ' checked';

}

?> /><span>Styled Tags</span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo osc_base_url() ?>oc-content/plugins/tags/image/tag.png" />
<br/><br/>


                                    <input type="radio" name="style_css" id="style_css" value="off" <?php

if ($ImageOrText == 'off')

{

	echo ' checked';

}

?> /><span>Text Tags</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; <span style="text-decoration:underline;">tags</span><br/>
<p><button style="font-size:16px; font-weight:700;" type="submit" ><?php

_e('Update', 'tags');

?></button></p>  <br/>
</form>

<hr/><br/>
<form name="tags_form" id="tags_form" action="<?php

echo osc_admin_base_url(true);

?>" method="POST" enctype="multipart/form-data" >

                                <div style="float: left; width: 100%;">



                                    <input type="hidden" name="page" value="plugins" />



                                    <input type="hidden" name="action" value="renderplugin" />



                                    <input type="hidden" name="file" value="<?php

echo osc_plugin_folder(__FILE__);

?>admin.php" />



                                    <input type="hidden" name="plugin_action" value="updatemaxtags" />

<label for="MaxTags" style="font-weight:700;font-size:16px;"><?php

_e('Set Maximum number of tags', 'tags');?></label><br/><br/>

<span>Maximum number of tags that user can post: <input style="width:50px" type="number" name="MaxuserTags" id="MaxuserTags" value="<?php echo osc_get_preference('MaxUserTags', 'tags'); ?>" /></span><br/><br/>



<p><button style="font-size:16px; font-weight:700;" type="submit" ><?php

_e('Update', 'tags');

?></button></p>  <br/>
</form>

<hr/>
<form name="tags_form" id="tags_form" action="<?php

echo osc_admin_base_url(true);

?>" method="POST" enctype="multipart/form-data" >

                                <div style="float: left; width: 100%;">



                                    <input type="hidden" name="page" value="plugins" />



                                    <input type="hidden" name="action" value="renderplugin" />



                                    <input type="hidden" name="file" value="<?php

echo osc_plugin_folder(__FILE__);

?>admin.php" />



                                    <input type="hidden" name="plugin_action" value="save" />

<label for="admin_tags" style="font-weight:700;font-size:16px;"><?php

_e('Admin Tags', 'tags');?></label><br/>
Read <?php echo '<a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'help.php') . '"> ' . __('plugin help', 'tags') . '</a>' ?> to know how auto admin tag is working.
<br/><br/>
<textarea rows="10" name="admin_tags" id="admin_tags" style="width: 400px;"><?php echo osc_get_preference('AdminTags', 'tags'); ?></textarea>
<p>Insert tags with following format: tag1,tag2,tag3 <br/> without spaces (only one word each tag), last tag without comma.</p>
<p><button style="font-size:16px; font-weight:700;" type="submit" ><?php

_e('Update', 'tags');

?></button></p>  <br/>
</form>
<hr />
<div class="donationpaypal">
<p>Support cartagena68 by donating with PayPal</p><form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input type="hidden" name="business" value="cartagena68@plugins-zone.com" data-original-title="" title=""> <input type="hidden" name="return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="rm" value="2" data-original-title="" title=""> <input type="hidden" name="cancel_return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="charset" value="UTF-8" data-original-title="" title=""> <input type="hidden" name="cmd" value="_donations" data-original-title="" title=""> <input type="hidden" name="bn" value="_Donate_WPS_en" data-original-title="" title=""> <input type="hidden" name="currency_code" value="USD" data-original-title="" title=""> <input type="hidden" name="lc" value="en-us" data-original-title="" title=""><div class="form-group lbab-amount"> <input type="text" name="amount" maxlength="16" data-original-title="" title=""><span>$</span></div><input type="hidden" name="item_name" value="Support Plugins Zone" data-original-title="" title=""> <input type="hidden" name="page_style" value="paypal" data-original-title="" title=""> <input type="hidden" name="cbt" value="Return to Plugins Zone" data-original-title="" title=""><div class="form-group lbab-donation-btn"><br /> <input type="submit" name="submit" value="Donate Now" data-original-title="" title=""></div></form></div>
<br /><br />
<style>.donationpaypal .form-group.lbab-amount span{color:#908f8f;padding:5px 0;font-size:25px;position:absolute;right:18px;top:4px;width:35px;height:30px;background:#cecece;z-index:100;text-shadow:1px 1px 1px #FFF;text-align:center;border-radius:0 3px 3px 0}.donationpaypal .lbab-donation-btn input{cursor:pointer;font:600 18px/22px "Open Sans",sans-serif;background:#cecece;border-radius:3px;text-transform:uppercase;padding:6px;border:0;width:150px;font-size:18px;color:#908f8f;text-shadow:1px 1px 1px #FFF}.donationpaypal .form-group.lbab-amount,.donationpaypal .lbab-donation-btn{position:relative;width:170px}.donationpaypal .form-group.lbab-amount input{margin-top:4px;padding:10px 37px 10px 10px;border:1px solid #b2b2b2;-webkit-appearance:textfield;box-sizing:content-box;border-radius:3px;box-shadow:0 1px 4px 0 rgba(168,168,168,.6) inset;transition:all .2s linear;width:102px;position:relative}</style>
