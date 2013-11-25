<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
?>


<div class="row-fluid box" style="text-align:justify; padding:2% !important;">
	<?php echo JText::_('TH_POSADERO_CONDITIONS_TEXT'); ?>
	<div class="row-fluid" style="margin-top:2%;">
		<label class="checkbox inline" for="conditions"><?php echo JText::_('TH_POSADERO_CONDITIONS_ACCEPT'); ?></label>
			<input type="checkbox" id="conditions" value="1" name="jform[conditions]">
	</div>
</div>



