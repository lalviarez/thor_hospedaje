<?php
/**
 * @version		$Id: default.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

?>
	<div class="row-fluid">
		<h3><?php echo JText::_('TH_ASSET_FIELD_DESCRIPTION_LABEL'); ?></h3>
		<hr />
		<p><?php echo $this->item->asset_desc;?></p>
	</div>



