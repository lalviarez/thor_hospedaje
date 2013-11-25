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
	<h2><?php echo JText::_('TH_POSADERO_TITLE_ADDRESS_ASSET'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
	<div class="span6">
	<div class="control-label"><label title="" for="asset-country"><?php echo JText::_('TH_POSADERO_ASSET_COUNTRY_LABEL'); ?></label></div>
	<div class="controls">
		<div class="input-append">
			<select name="asset-country" id="asset-country">
				<option value=""><?php echo JText::_('TH_POSADERO_ASSET_COUNTRY_SELECT'); ?></option>
			</select>
		</div>
	</div>
	</div>
	</div>

	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="asset-city"><?php echo JText::_('TH_POSADERO_ASSET_CITY_LABEL'); ?></label></div>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_ASSET_CITY_LABEL'); ?>" value="" id="asset-city" name="jform[asset-city]" title="">					
				</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="asset-state"><?php echo JText::_('TH_POSADERO_ASSET_STATE_LABEL'); ?></label></div>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_ASSET_STATE_LABEL'); ?>" value="" id="asset-state" name="jform[asset-state]" title="">					
				</div>
			</div>
		</div>

		<div class="span6">
			<div class="control-label"><label title="" for="asset-zip"><?php echo JText::_('TH_POSADERO_ASSET_ZIP_LABEL'); ?></label></div>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input-small" size="10" placeholder="<?php echo JText::_('TH_POSADERO_ASSET_ZIP_LABEL'); ?>" value="" id="asset-zip" name="jform[asset-zip]" title="">					
				</div>
			</div>
		</div>
	</div>
</div>
