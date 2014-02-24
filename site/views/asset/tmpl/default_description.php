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
		<div style="background-color: transparent; height: 5px; background-image: linear-gradient(to right, #FFCC00 100%, rgba(2, 255, 255, 0) 100%); margin: 0% 0px 3% 0%;"></div>
		<div style="background: white; padding: 1%; border: 1px solid #FFCC00; border-radius: 10px; margin-top: 0%; margin-bottom: 2%;"><?php echo $this->item->asset_desc;?></div>
	</div>



