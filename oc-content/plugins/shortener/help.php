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



?>







<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">



    <div style="padding: 0 20px 20px;">



        <div>



           <fieldset>



                <legend>



                    <h1><?php _e('Shortener Help', 'shortener'); ?></h1>



                </legend>



                <h2>



                    <?php _e('What is Shortener Plugin?', 'shortener'); ?>



                </h2>



                <p>



                    <?php _e('Shortener plugin is based on <a href="http://briancray.com/posts/free-php-url-shortener-script/">PHP-URL-Shortener by Brian Cray</a><br/>

					- Can shorten over 42 billion unique URLs in 6 or less characters (it can do more than 12,000,000 in only 4!)<br/>

					- Super duper fast—uses very little server resources<br/>

					- Only uses alphanumeric characters so all browsers can interpret the URL<br/>

					- Secure—several data filters in place to prevent SQL injection hacks<br/>

					- Option to check if the URL is real (doesn’t respond with a 404) before shortening<br/>

					- Uses 301 redirects for SEO and analytics yumminess<br/>

					- Store a local cache to prevent database queries on every redirect', 'shortener'); ?>



                </p>



                <h2>



                    <?php _e('How does Shortener Plugin work?', 'shortener'); ?>



                </h2>



                <p>



                    <?php _e('In order to use Shortener Plugin, you should edit your theme file and add the following line of code where you want to show the shorted URL', 'shortener'); ?>:



                </p>



                <pre>



                    &lt;?php if(function_exists('short_url')) { echo short_url(<strong>URL TO SHORT HERE</strong>); } ?&gt;

                    

                    Example for item URL:

                    

                    &lt;?php if(function_exists('short_url')) { echo short_url(osc_item_url()); } ?&gt;



                </pre>

                

                <h2><?php _e('If you feel generous, you can donate to osclass team for their excellent work.', 'tags'); ?>



                </h2>



                <p>



                <?php _e('If you feel VERY generous and If you find this plugin useful , you can donate to me using paypal', 'tags'); ?>

<div class="donationpaypal">
<p>Support cartagena68 by donating with PayPal</p><form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input type="hidden" name="business" value="cartagena68@plugins-zone.com" data-original-title="" title=""> <input type="hidden" name="return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="rm" value="2" data-original-title="" title=""> <input type="hidden" name="cancel_return" value="http://plugins-zone.com/" data-original-title="" title=""> <input type="hidden" name="charset" value="UTF-8" data-original-title="" title=""> <input type="hidden" name="cmd" value="_donations" data-original-title="" title=""> <input type="hidden" name="bn" value="_Donate_WPS_en" data-original-title="" title=""> <input type="hidden" name="currency_code" value="USD" data-original-title="" title=""> <input type="hidden" name="lc" value="en-us" data-original-title="" title=""><div class="form-group lbab-amount"> <input type="text" name="amount" maxlength="16" data-original-title="" title=""><span>$</span></div><input type="hidden" name="item_name" value="Support Plugins Zone" data-original-title="" title=""> <input type="hidden" name="page_style" value="paypal" data-original-title="" title=""> <input type="hidden" name="cbt" value="Return to Plugins Zone" data-original-title="" title=""><div class="form-group lbab-donation-btn"><br /> <input type="submit" name="submit" value="Donate Now" data-original-title="" title=""></div></form></div>
<br /><br />
<style>.donationpaypal .form-group.lbab-amount span{color:#908f8f;padding:5px 0;font-size:25px;position:absolute;right:18px;top:4px;width:35px;height:30px;background:#cecece;z-index:100;text-shadow:1px 1px 1px #FFF;text-align:center;border-radius:0 3px 3px 0}.donationpaypal .lbab-donation-btn input{cursor:pointer;font:600 18px/22px "Open Sans",sans-serif;background:#cecece;border-radius:3px;text-transform:uppercase;padding:6px;border:0;width:150px;font-size:18px;color:#908f8f;text-shadow:1px 1px 1px #FFF}.donationpaypal .form-group.lbab-amount,.donationpaypal .lbab-donation-btn{position:relative;width:170px}.donationpaypal .form-group.lbab-amount input{margin-top:4px;padding:10px 37px 10px 10px;border:1px solid #b2b2b2;-webkit-appearance:textfield;box-sizing:content-box;border-radius:3px;box-shadow:0 1px 4px 0 rgba(168,168,168,.6) inset;transition:all .2s linear;width:102px;position:relative}</style>

                </p>          



            </fieldset>



        </div>



    </div>



</div>



