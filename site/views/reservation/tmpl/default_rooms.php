<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
?>
<div class="row-fluid data-rooms">
	<?php
	foreach($this->item->rooms_types as $i => $room):
		($i%2 === 0) ? $class = "even" : $class = "odd";
	?>
	<div class="row-fluid  <?php echo $class; ?>">
		<div class="span3">
			<?php echo $room->room_name;?>
		</div>
		<div class="span3">
			<?php echo JText::_('TH_ASSET_FIELD_N_ADULTS_LABEL'); ?></p>
		</div>
		<div class="span3">
			<?php echo JText::_('TH_ASSET_FIELD_N_CHILDRENS_LABEL'); ?></p>
		</div>
	</div>
	<?php
	endforeach;
	?>
</div>
