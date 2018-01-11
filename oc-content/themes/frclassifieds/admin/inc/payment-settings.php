<?php 
$enable_paypal = osc_get_preference('paypal-enable', 'frclassifieds');
$enable_checkout = osc_get_preference('checkout-enable', 'frclassifieds');
$enable_money_bookers = osc_get_preference('money-bookers-enable', 'frclassifieds');
$enable_world_pay = osc_get_preference('world-pay-enable', 'frclassifieds');
$enable_payza = osc_get_preference('payza-enable', 'frclassifieds');
$enable_cc_avenue = osc_get_preference('cc-avenue-enable', 'frclassifieds');
$enable_web_pay = osc_get_preference('webpay-enable', 'frclassifieds');

?>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/frclassifieds/admin/frclassifieds.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="payment-settings" />
      <div class="clear underline sticky head-bk">
         <h1 class=" pull-left"><?php _e('Payment Settings', 'frclassifieds'); ?></h1>
          <input  id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save All Changes','frclassifieds')); ?>" class="btn btn-submit pull-right">
      </div>
      <div class="marhin-wide"></div>
      <h3 class="underline"><?php _e('Payment Options:', 'frclassifieds'); ?></h3>
      <div class="col-xs-12 grey-bk">
          <div class="col-md-4 label">
              <div class="label-item">
                 <?php _e('Enable Options:', 'frclassifieds'); ?>
              </div>
              <small><?php _e('Enabled items will appear in footer.<br/>', 'frclassifieds')?></small>
              <small><?php _e('<strong>NOTE:</strong> These setting will only display brand icons at the footer, nothing more. Use third party apps for payment support.<br/>', 'frclassifieds')?></small>
          </div>
          <div class="col-md-8">
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="PayPal" src="<?php echo osc_current_web_theme_url('images/paypal.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="paypal-enable" <?php if($enable_paypal !='' && $enable_paypal == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="2-Checkout" src="<?php echo osc_current_web_theme_url('images/2co.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="checkout-enable" <?php if($enable_checkout !='' && $enable_checkout == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="MoneyBookers" src="<?php echo osc_current_web_theme_url('images/moneybookers.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="money-bookers-enable" <?php if($enable_money_bookers !='' && $enable_money_bookers == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="Worldpay" src="<?php echo osc_current_web_theme_url('images/worldpay.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="world-pay-enable" <?php if($enable_world_pay !='' && $enable_world_pay == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="Payza" src="<?php echo osc_current_web_theme_url('images/payza.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="payza-enable" <?php if($enable_payza !='' && $enable_payza == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="CC-Avenue" src="<?php echo osc_current_web_theme_url('images/cc-avenue.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="cc-avenue-enable" <?php if($enable_cc_avenue !='' && $enable_cc_avenue == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                     <img border="0" height="23" title="Webpay" src="<?php echo osc_current_web_theme_url('images/webpay.png'); ?>">
                  </div>
                  <div class="col-md-8">
                     <div class="checkbox-item">
                         <input type="checkbox" value="enable" name="webpay-enable" <?php if($enable_web_pay !='' && $enable_web_pay == 'enable'){ echo osc_esc_html('checked="checked"'); }?>>
                         <span>Enable.</span>
                     </div>
                  </div>
              </div>
          </div>
      </div>
</form>