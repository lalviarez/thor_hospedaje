<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication('site');
$room_data = $app->input->get('room_data', NULL, 'ARRAY');
?>
<div class="row-fluid data-rooms">
	<?php
	$class = "odd";
	foreach($this->item->rooms_types as $i => $room):
		//($i%2 === 0) ? $class = "even" : $class = "odd";
	?>
	<?php
	//print_r($room_data);
	if (isset($room_data[$room->id]) && $room_data[$room->id]):
		foreach($room_data[$room->id]['room_numbers'] as $room_number):
		// Se deberían realizar verificaciones sobre si el número de la habitación seleccionada si existe realmente
	?>
			<div class="row-fluid  <?php echo $class; ?>">
				<div class="span3">
					<?php echo $room->room_name . " (" . $room_number . ")";?>
				</div>
				<div class="span3">
					<?php echo JText::_('TH_ASSET_FIELD_N_ADULTS_LABEL'); ?>
					<select class="input-mini" name="rooms_numbers_<?php echo $i; ?>" id="rooms_numbers_<?php echo $i; ?>" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_PLACEHOLDER'); ?>">
						<!--<option value=""></option>-->
						<?php
						for($j=1; $j <= $room->number_adult; $j++):
						?>
						<option value="<?php echo $j;?>"><?php echo $j;?></option>
						<?php
						endfor;
						?>
					</select>
				</div>
				<div class="span3">
					<?php echo JText::_('TH_ASSET_FIELD_N_CHILDRENS_LABEL'); ?>
					<select class="input-mini" name="rooms_numbers_<?php echo $i; ?>" id="rooms_numbers_<?php echo $i; ?>" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_PLACEHOLDER'); ?>">
						<option value="0">0</option>
						<?php
						for($j=1; $j <= $room->number_children; $j++):
						?>
						<option value="<?php echo $j;?>"><?php echo $j;?></option>
						<?php
						endfor;
						?>
					</select>
				</div>
			</div>
	<?php
		($class == "odd") ? $class = "even" : $class = "odd";
		endforeach;
	endif;
	endforeach;
	?>
</div>
