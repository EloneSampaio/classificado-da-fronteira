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
 if(Params::getParam('plugin_action')=='done') {
       	osc_set_preference('http', Params::getParam('http'), 'shortener', 'STRING');
		echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The plugin is now configured', 'printpdf') . '.</p></div>' ;
        osc_reset_preferences();
    }
?>

<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
        <fieldset>
                <legend><strong style="font-size:16px;"><?php _e('Shortener Settings', 'shortener'); ?></strong></legend>
                <form name="shortener_form" id="shortener_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
                <div style="float: left; width: 100%;">
                    <input type="hidden" name="page" value="plugins" />
                    <input type="hidden" name="action" value="renderplugin" />
                    <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>conf.php" />
                    <input type="hidden" name="plugin_action" value="done" /><br/>
                    <br/><br/>
                        <?php $showHttp = osc_get_preference('http', 'shortener'); ?>
                        <legend><strong>Set if you want to show http:// before the address:</strong></legend>
                        <input type="radio" name="http" id="http" value="on" <?php if($showHttp == 'on'){ echo ' checked' ; } ?>/><span> Show http://</span>
                        <br/>
                        <input type="radio" name="http" id="http" value="off" <?php if($showHttp == 'off'){ echo ' checked' ; } ?>/><span> Don't show http://</span>
                        <br/>
                    <span style="float:right;"><button type="submit" style="float: right;"><?php _e('Update', 'shortener');?></button></span>
                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>	
        <hr />
<div class="donationpaypal">
<p>Support cartagena68 by donating with PayPal</p><form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input type="hidden" name="business" value="cartagena68@plugins-zone.com" data-original-title="" title=""> <input type="hidden" name="return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="rm" value="2" data-original-title="" title=""> <input type="hidden" name="cancel_return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="charset" value="UTF-8" data-original-title="" title=""> <input type="hidden" name="cmd" value="_donations" data-original-title="" title=""> <input type="hidden" name="bn" value="_Donate_WPS_en" data-original-title="" title=""> <input type="hidden" name="currency_code" value="USD" data-original-title="" title=""> <input type="hidden" name="lc" value="en-us" data-original-title="" title=""><div class="form-group lbab-amount"> <input type="text" name="amount" maxlength="16" data-original-title="" title=""><span>$</span></div><input type="hidden" name="item_name" value="Support Plugins Zone" data-original-title="" title=""> <input type="hidden" name="page_style" value="paypal" data-original-title="" title=""> <input type="hidden" name="cbt" value="Return to Plugins Zone" data-original-title="" title=""><div class="form-group lbab-donation-btn"><br /> <input type="submit" name="submit" value="Donate Now" data-original-title="" title=""></div></form></div>
<br /><br />
<style>.donationpaypal .form-group.lbab-amount span{color:#908f8f;padding:5px 0;font-size:25px;position:absolute;right:18px;top:4px;width:35px;height:30px;background:#cecece;z-index:100;text-shadow:1px 1px 1px #FFF;text-align:center;border-radius:0 3px 3px 0}.donationpaypal .lbab-donation-btn input{cursor:pointer;font:600 18px/22px "Open Sans",sans-serif;background:#cecece;border-radius:3px;text-transform:uppercase;padding:6px;border:0;width:150px;font-size:18px;color:#908f8f;text-shadow:1px 1px 1px #FFF}.donationpaypal .form-group.lbab-amount,.donationpaypal .lbab-donation-btn{position:relative;width:170px}.donationpaypal .form-group.lbab-amount input{margin-top:4px;padding:10px 37px 10px 10px;border:1px solid #b2b2b2;-webkit-appearance:textfield;box-sizing:content-box;border-radius:3px;box-shadow:0 1px 4px 0 rgba(168,168,168,.6) inset;transition:all .2s linear;width:102px;position:relative}</style>									
    </div>
</div>
