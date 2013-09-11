<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
jimport('thorhospedaje.currency_converter.currency_converter');
$app = JFactory::getApplication('site');
$currency = JRequest::getVar('currency'); // LJAH: Se debe probar y sustituir por $app->input->get('currency', NULL);
$exchange_rate=THCurrencyconverter::get_exchange_rate($currency);


$room_data = $app->input->get('room_data', NULL, 'ARRAY');
?>
<div class="row-fluid data-rooms">
	<table class="confirmation-table">
	<?php
	$class = "odd";
	$total_cost = NULL;
	foreach($this->item->rooms_types as $i => $room):
		//($i%2 === 0) ? $class = "even" : $class = "odd";
	?>
	<?php
	//print_r($room_data);
	if (isset($room_data[$room->id]) && $room_data[$room->id]):
		foreach($room_data[$room->id]['room_numbers'] as $room_number):
		// Se deberían realizar verificaciones sobre si el número de la habitación seleccionada si existe realmente
		$document = JFactory::getDocument();
		$script = sprintf("jQuery(document).ready(function($) {\n
			$('#n_adults_%s').chosen({\n
			disable_search_threshold: 10,\n
			allow_single_deselect: true,\n
			});\n
			$('#n_childrens_%s').chosen({\n
			disable_search_threshold: 10,\n
			allow_single_deselect: true,\n
			});\n
			});",$room_number, $room_number);
										
		$document->addScriptDeclaration($script);
	?>
			<div class="row-fluid  <?php echo $class; ?>">

					<tr class="<?php echo $class;?>">
						<td class="item"><?php echo $room->room_name . " (" . $room_number . ")";?></td>
						<td class="n_adults"><?php echo JText::_('TH_ASSET_FIELD_N_ADULTS_LABEL'); ?>
							<select class="input-mini" name="room_type[<?php echo $room->id; ?>][room_number][number_adults]" id="n_adults_<?php echo $room_number; ?>" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_PLACEHOLDER'); ?>">
								<!--<option value=""></option>-->
								<?php
								for($j=1; $j <= $room->number_adult; $j++):
								?>
								<option value="<?php echo $j;?>"><?php echo $j;?></option>
								<?php
								endfor;
								?>
							</select></td>
						<td class="n_childrens"><?php echo JText::_('TH_ASSET_FIELD_N_CHILDRENS_LABEL'); ?>
							<select class="input-mini" name="room_type[<?php echo $room->id; ?>][room_number][number_childrens]" id="n_childrens_<?php echo $room_number; ?>" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_PLACEHOLDER'); ?>">
								<option value="0">0</option>
								<?php
								for($j=1; $j <= $room->number_children; $j++):
								?>
								<option value="<?php echo $j;?>"><?php echo $j;?></option>
								<?php
								endfor;
								?>
							</select></td>
						<td class="cost"><span class="cost"><?php echo THCurrencyconverter::print_cost($room->room_cost, $exchange_rate, $currency);?></span></td>
					</tr>
			</div>
	<?php
		$total_cost += $room->room_cost;
		($class == "odd") ? $class = "even" : $class = "odd";
		endforeach;
	endif;
	endforeach;
	?>
					<tr class="tr-total"><td class="item"></td><td class="n_adults"></td><td class="total">Total</td><td class="total-cost"><?php echo THCurrencyconverter::print_cost($total_cost, $exchange_rate, $currency);?></td></tr>
	</table>
</div>
