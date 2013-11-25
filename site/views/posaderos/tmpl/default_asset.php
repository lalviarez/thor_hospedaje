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
	<h2><?php echo JText::_('TH_POSADERO_TITLE_ASSET'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="asset-name"><?php echo JText::_('TH_POSADERO_ASSET_NAME_LABEL'); ?></label></div>
				<div class="controls">
					<div class="input">
						<input type="text" class="input-xlarge" style="width: 100%;" value="" id="asset-name" name="jform[asset-name]" title="">					
					</div>
				</div>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span6">
			<div class="span6">
				<div class="control-label" ><label title="" for="asset-user"><?php echo JText::_('TH_POSADERO_ASSET_USER_LABEL'); ?></label></div>
					<div class="controls">
						<div class="input">
							<input type="text" class="input-medium" value="" id="asset-user" name="jform[asset-user]" title="">					
						</div>
					</div>
			</div>
			<div class="span6">
				<div class="control-label" ><label title="" for="asset-password"><?php echo JText::_('TH_POSADERO_ASSET_PASSWORD_LABEL'); ?></label></div>
					<div class="controls">
						<div class="input">
							<input type="text" class="input-medium" value="" id="asset-password" name="jform[asset-password]" title="">					
						</div>
					</div>
			</div>
		</div>
		<div class="span5">
				<img src="media/com_thorhospedaje/images/posaderos/tip_ayuda_hotel.png" width="100%"/>
		</div>
	</div>
</div>



