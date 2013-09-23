<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication('site');
$country_id = $app->input->get('country_id', NULL);
$state_id = $app->input->get('state_id', NULL);
$th_asset_id = $app->input->get('th_asset_id', NULL);
$checkin = $app->input->get('checkin', NULL);
$checkout = $app->input->get('checkout', NULL);
$n_adults = $app->input->get('n_adults', NULL);
$n_childrens = $app->input->get('n_childrens', NULL);
?>
<div class="row-fluid">
<div class="span3">
	
		<div class="control-label"><label title="" for="client-name"><?php echo JText::_('TH_RESERVATION_CLIENT_NAME_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_NAME_LABEL'); ?>" value="" id="client-name" name="jform[client_data][client-name]" title="">
			</div>
		</div>
		
		<div class="control-label"><label title="" for="client-id"><?php echo JText::_('TH_RESERVATION_CLIENT_ID_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_ID_LABEL'); ?>" value="" id="client-id" name="jform[client_data][client-id]" title="">
			</div>
		</div>
		
		<div class="control-label"><label title="" for="client-email"><?php echo JText::_('TH_RESERVATION_CLIENT_EMAIL_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_EMAIL_LABEL'); ?>" value="" id="client-email" name="client-email" title="">
			</div>
		</div>
		
		<div class="control-label"><label title="" for="client-phone"><?php echo JText::_('TH_RESERVATION_CLIENT_PHONE_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_PHONE_LABEL'); ?>" value="" id="client-phone" name="client-phone" title="">
			</div>
		</div>
		
		<div class="control-label"><label title="" for="client-zip"><?php echo JText::_('TH_RESERVATION_CLIENT_ZIP_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_ZIP_LABEL'); ?>" value="" id="client-zip" name="client-zip" title="">
			</div>
		</div>	
</div>
	
<div class="span3">
		<div class="control-label"><label title="" for="client-address"><?php echo JText::_('TH_RESERVATION_CLIENT_ADDRESS_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<textarea rows="3" cols="30" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_ADDRESS_LABEL'); ?>" id="client-address" name="client-address" title=""></textarea>
			</div>
		</div>
		
		<div class="control-label"><label title="" for="client-country"><?php echo JText::_('TH_RESERVATION_CLIENT_COUNTRY_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_COUNTRY_LABEL'); ?>" value="" id="client-country" name="client-country" title="">
			</div>
		</div>
		
		<div class="control-label"><label title="" for="client-city"><?php echo JText::_('TH_RESERVATION_CLIENT_CITY_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_RESERVATION_CLIENT_CITY_LABEL'); ?>" value="" id="client-city" name="client-city" title="">
			</div>
		</div>
</div>	

</div>
