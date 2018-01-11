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
 
 if (Params::getParam('plugin_action') == 'update') {
	 osc_set_preference('zopimID', Params::getParam('zopim_id'),'zopim_chat','STRING');
	echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. Chat is now configured.', 'zopim') . '<a href="#" title="Close Message" onclick="parentNode.remove()" style="float:right;font-weight:bold;padding-right:50px;color:#FFFFFF;">' . __('x', 'zopim') . '</a></p></div>';
	osc_reset_preferences();
	} 
 ?>
 
 <div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
 <div style="padding:5px;">
 <h2>Zopim chat configuration</h2>
<form name="zopim_form" id="zopim_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
	<input type="hidden" name="page" value="plugins" />
	<input type="hidden" name="action" value="renderplugin" />
	<input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>admin.php" />
	<input type="hidden" name="plugin_action" value="update" />
    
<?php osc_get_preference('zopimID', 'zopim_chat'); ?>
	<span><strong>Zopim Widget ID</strong></span>
	<span><input type="text" name="zopim_id" id="zopim_id" style="width:300px;" value="<?php echo osc_get_preference('zopimID', 'zopim_chat'); ?>" /></span>
<br/> 
<p><button style="font-size:16px; font-weight:700;" type="submit" ><?php _e('Update', 'zopim'); ?></button></p>  <br/>
</form>
</div>
<hr/>
<div align="center">
<?php if (!osc_get_preference('zopimID', 'zopim_chat')) { ?>
<h2>How can i get Zopim Widget ID?</strong></h2>
<div>
<p>&nbsp;</p>
<p><h3>Step 1: Registration</h3></p>
<p><strong><a href="https://account.zopim.com/signup?lang=en-us" target="_blank"> Register </a> &nbsp;for a FREE Zopim account.&nbsp;No credit cards required. Zopim is absolutely free.</strong></p>
<p>&nbsp;</p>
<p><a title="http://www.zopim.com/#signup" href="https://account.zopim.com/signup?lang=en-us" rel="nofollow" target="_blank"> <img src="<?php echo osc_base_url(); ?>oc-content/plugins/zopim_chat/img/register.jpg" /> </a></p>
<p>&nbsp;</p>
<p><h3>Step 2: Verification</h3></p>
<p><strong>Verify by clicking the “Verify” in link in the email. &nbsp;You'll be asked to set a password for the login.</strong></p>
<p>&nbsp;&nbsp;</p>
<p><h3>Step 3: Get the Zopim Widget ID</h3></p>
<p><strong>You should have received an email from Zopim titled "Complete your Zopim Installation", inside the email you find the widget code that looks like the sample one below.<br />OR<br />Log into&nbsp; <a href="http://dashboard.zopim.com/" target="_blank"> Zopim's Dashboard </a> &nbsp;with the account that you've just created. &nbsp;Go through the wizard and you'll be presented with a widget code that looks like the sample one below.
<br />Note: Don't use the code below. Your widget code contains a unique <strong> ACCOUNT-CODE. </strong> That is your widget ID.</strong></p>
<p style="text-align: justify;">&nbsp;</p>
<p style="text-align:center;"><strong>ACCOUNT-CODE = widget ID</strong></p>
<p><img src="<?php echo osc_base_url(); ?>oc-content/plugins/zopim_chat/img/jscode.png" /></p>
<p>&nbsp;&nbsp;</p>
<p><h3>Step 4: Update the widget ID</h3></p>
<p><strong>Once you have the widget ID, copy it and paste it in the form on the top of this page. When you click on UPDATE, this tutorial will go away and will appear the Zopim dashboard.</strong></p>
<p>&nbsp;&nbsp;</p>
</div>
<?php } else { ?>
<h2>ZOPIM DASHBOARD</h2>
<iframe src="https://dashboard.zopim.com" width="100%" height="800" frameborder="0" scrolling="Yes"> </iframe>
<?php } ?>
</div>
<hr />
<div style="padding:20px;" class="donationpaypal">
<p>Support cartagena68 by donating with PayPal</p><form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input type="hidden" name="business" value="cartagena68@plugins-zone.com" data-original-title="" title=""> <input type="hidden" name="return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="rm" value="2" data-original-title="" title=""> <input type="hidden" name="cancel_return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="charset" value="UTF-8" data-original-title="" title=""> <input type="hidden" name="cmd" value="_donations" data-original-title="" title=""> <input type="hidden" name="bn" value="_Donate_WPS_en" data-original-title="" title=""> <input type="hidden" name="currency_code" value="USD" data-original-title="" title=""> <input type="hidden" name="lc" value="en-us" data-original-title="" title=""><div class="form-group lbab-amount"> <input type="text" name="amount" maxlength="16" data-original-title="" title=""><span>$</span></div><input type="hidden" name="item_name" value="Support Plugins Zone" data-original-title="" title=""> <input type="hidden" name="page_style" value="paypal" data-original-title="" title=""> <input type="hidden" name="cbt" value="Return to Plugins Zone" data-original-title="" title=""><div class="form-group lbab-donation-btn"><br /> <input type="submit" name="submit" value="Donate Now" data-original-title="" title=""></div></form></div>
<br /><br />
<style>.donationpaypal .form-group.lbab-amount span{color:#908f8f;padding:5px 0;font-size:25px;position:absolute;right:18px;top:4px;width:35px;height:30px;background:#cecece;z-index:100;text-shadow:1px 1px 1px #FFF;text-align:center;border-radius:0 3px 3px 0}.donationpaypal .lbab-donation-btn input{cursor:pointer;font:600 18px/22px "Open Sans",sans-serif;background:#cecece;border-radius:3px;text-transform:uppercase;padding:6px;border:0;width:150px;font-size:18px;color:#908f8f;text-shadow:1px 1px 1px #FFF}.donationpaypal .form-group.lbab-amount,.donationpaypal .lbab-donation-btn{position:relative;width:170px}.donationpaypal .form-group.lbab-amount input{margin-top:4px;padding:10px 37px 10px 10px;border:1px solid #b2b2b2;-webkit-appearance:textfield;box-sizing:content-box;border-radius:3px;box-shadow:0 1px 4px 0 rgba(168,168,168,.6) inset;transition:all .2s linear;width:102px;position:relative}</style>
</div>