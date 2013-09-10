<?php
/**
 * @version		$Id: default.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$document = JFactory::getDocument();
jimport('thorhospedaje.currency_converter.currency_converter');
$currency = JRequest::getVar('currency');
$exchange_rate=THCurrencyconverter::get_exchange_rate($currency);

$app = JFactory::getApplication('site');
$country_id = $app->input->get('country_id', NULL);
$state_id = $app->input->get('state_id', NULL);
$th_asset_id = $app->input->get('id', NULL);
$checkin = $app->input->get('checkin', NULL);
$checkout = $app->input->get('checkout', NULL);
$n_adults = $app->input->get('n_adults', NULL);
$n_childrens = $app->input->get('n_childrens', NULL);

?>
<form id="reservation-form" class="" method="GET" action="<?php echo JRoute::_($this->baseurl . '/index.php');?>">
	<div class="row-fluid rooms">
		<h3><?php echo JText::_('TH_ASSET_FIELD_ROOMS_LABEL'); ?></h3>
		<hr />
		<?php
		if (isset($this->item->rooms) && ($this->item->rooms)):
		?>
		<div class="row-fluid"><button id="reservation" name="bookin" class="btn btn-primary" style="float: right;" type="submit">
			<i class="icon-checkmark"></i> Reservar	</button></div>
		<?php
			foreach($this->item->rooms as $i => $room):
				($i%2 === 0) ? $class = "even" : $class = "odd";
		?>
		<div class="row-fluid room <?php echo $class; ?>">
			<div class="span4">
				<img src="<?php echo $this->item->image;?>" title="<?php echo $room->asset_name;?>"/>
				<h4><?php echo $room->room_name;?></h4>
				<p><?php echo JText::_('TH_ASSET_FIELD_N_ADULTS_LABEL'); ?>:&nbsp; <?php echo $room->number_adult;?></p>
				<p><?php echo JText::_('TH_ASSET_FIELD_N_CHILDRENS_LABEL'); ?>:&nbsp; <?php echo $room->number_children;?></p>
				<a href="javascript:;" id="more_<?php echo $i;?>"><?php echo JText::_('TH_ASSET_FIELD_VIEW_MORE_LABEL'); ?></a>
			</div>			
			<div class="span5" style="text-align: center; padding-top:2%;">
				<?php 
				if (isset($room->availability_rooms) && $room->availability_rooms):
					
					$script = sprintf("jQuery(document).ready(function($) {\n
										$('#room_data_%s').chosen({\n
										disable_search_threshold: 10,\n
										allow_single_deselect: true,\n
										});\n
										});",$room->id);
										
					$document->addScriptDeclaration($script);					
				?>
					<!-- <div class="control-label"><label for="country_id" title=""><?php echo JText::_('Escoja su habitación'); ?></label></div> -->
					<div class="">
					<select multiple="" name="room_data[<?php echo $room->id; ?>][room_numbers][]" id="room_data_<?php echo $room->id; ?>" data-no_results_text="<?php echo JText::_('TH_ASSET_FIELD_ROOMS_NUMBERS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_ASSEt_FIELD_ROOMS_NUMBERS_PLACEHOLDER'); ?>">
						<option value=""></option>
						<?php
						foreach($room->availability_rooms as $room_number => $availability):
						?>
						<option value="<?php echo $room_number;?>"><?php echo $room_number;?></option>
						<?php
						endforeach;
						?>
					</select>
					</div>
				<?php
				else:
				?>
					<p><?php echo JText::_('TH_ASSET_FIELD_AVAILABILITY_TEXT');?></p>
				<?php
				endif;
				?>
			</div>
			<div class="span3" style="text-align: center; padding-top:2%;">
				<span class="cost"><?php echo THCurrencyconverter::print_cost($room->room_cost, $exchange_rate, $currency);?></span>
			</div>
			<div class="span12 description" id="room_desc_<?php echo $i;?>">
				<?php echo $room->room_desc;?>
			</div>
		</div>
		<?php
			endforeach;
		endif;
		?>
	</div>
	<input type="hidden" name="option" value="com_thorhospedaje">
	<input type="hidden" name="view" value="reservation">
	<input type="hidden" name="country_id" value="<?php echo $country_id;?>">
	<input type="hidden" name="state_id" value="<?php echo $state_id;?>">
	<input type="hidden" name="th_asset_id" value="<?php echo $th_asset_id; ?>">
	<input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
	<input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
	<input type="hidden" name="n_adults" value="<?php echo $n_adults; ?>">
	<input type="hidden" name="n_childrens" value="<?php echo $n_childrens; ?>">
	</form>
</div> <!-- mod_th_asset -->
<?php echo $this->pagination->getListFooter(); ?>


