<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
?>

<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_DATA_CONTACT'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="client-first-name"><?php echo JText::_('TH_POSADERO_CLIENT_FIRST_NAME_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_FIRST_NAME_LABEL'); ?>" value="" id="client-first-name" name="jform[client-first-name]" title="">
			</div>
		</div>
		</div>
		<div class="span6">
			<div class="control-label"><label title="" for="client-last-name"><?php echo JText::_('TH_POSADERO_CLIENT_LAST_NAME_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_LAST_NAME_LABEL'); ?>" value="" id="client-last-name" name="jform[client-last-name]" title="">
			</div>
		</div>
		</div>
	</div>


	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="client-email"><?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_LABEL'); ?>" value="" id="client-email" name="jform[client-email]" title="">
			</div>
		</div>
		</div>
		<div class="span6">
			<div class="control-label"><label title="" for="client-phone-code"><?php echo JText::_('TH_POSADERO_CLIENT_PHONE_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<select name="jform[client-phone-code]" id="client-phone-code" class="input-small">
				<option value="">Venezuela</option>
			</select>&nbsp;&nbsp;
				<input type="text" class="input-small" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_PHONE_LABEL'); ?>" value="" id="client-phone" name="jform[client-phone]" title="">
			</div>
		</div>
		</div>
	</div>


	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="client-email-confirm"><?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_CONFIRM_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_CONFIRM_LABEL'); ?>" value="" id="client-email-confirm" name="jform[client-email-confirm]" title="">
			</div>
		</div>
		</div>
	</div>

</div>

