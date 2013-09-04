<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication('site');
$country_id = $app->input->get('country_id', NULL);
$state_id = $app->input->get('state_id', NULL);
$th_asset_id = $app->input->get('th_asset_id', NULL);
$checkin = $app->input->get('checkin', NULL);
$checkout = $app->input->get('checkout', NULL);
$n_adults = $app->input->get('n_adults', NULL);
$n_childrens = $app->input->get('n_childrens', NULL);
?>
<div class="mod_th_availabilityrooms">
<?php
foreach($this->items as $i => $item):
	($i%2 === 0) ? $class = "even" : $class = "odd";
	$Itemid = $item->params->get('asset-itemMenu',0);
	//es necesario traerse los parámetros de los alojamientos
?>
<div class="row-fluid asset <?php echo $class; ?>">
	<div class="span2">
		<img src="<?php echo $item->image;?>" title="<?php echo $item->asset_name;?>"/>
	</div>
	
	<div class="span10">
		<div class="row-fluid data-asset">			
			<h4><a href="<?php echo JRoute::_('index.php?view=asset&id='. $item->id .'&Itemid='. $Itemid .'&checkin='. $checkin .'&checkout='. $checkout .'&n_adults='. $n_adults .'&n_childrens='. $n_childrens);?>">
			<?php echo $item->asset_name;?></a></h4>
			<p><?php echo $item->state_name;?>, <?php echo $item->country;?></p>			
		</div>
		
		<div class="data-rooms">
		<?php
		foreach($item->rooms_types as $i => $room_type):
			($i%2 === 0) ? $class = "even" : $class = "odd";
		?>
		<div class="row-fluid data-room <?php echo $class; ?>">
			<div class="span3">
				<p><?php echo $room_type->room_name;?></p>
			</div>
			<div class="span3">
				<?php
				if (isset($room_type->availability_rooms)):
				?>
					<p class="availability"><?php echo count($room_type->availability_rooms) . " " . JText::_('TH_AR_FIELD_AVAILABILITY_LABEL');?></p>
				<?php
				else:
				?>
					<p>&nbsp;</p>
				<?php
				endif;
				?>
			</div>
			<div class="span3">
				<p class="childadults"><?php echo $room_type->number_adult . " " . JText::_('TH_AR_FIELD_ADULTS_LABEL');?>
				 <?php echo $room_type->number_children . " " . JText::_('TH_AR_FIELD_CHILDRENS_LABEL');?></p>
			</div>
			<div class="span3">
				<p class="cost"><?php echo $room_type->room_cost;?></p>
			</div>				
		</div>
		<?php 
		if ($i == 2):
		?>
			<div class="row-fluid">
				<a href="<?php echo JRoute::_('index.php?view=asset&id='. $item->id .'&Itemid='. $Itemid .'&checkin='. $checkin .'&checkout='. $checkout);?>"><?php echo JText::_('TH_AR_FIELD_MORE_LABEL');?></a>
			</div>
		
		<?php
			break;
		endif;
		?>
		<?php
		endforeach;
		?>
		</div>
	</div>
</div>	
<?php
endforeach;
?>
</div>
