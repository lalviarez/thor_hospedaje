<?php
/**
 * @version		$Id: default.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('bootstrap.framework');
//JHtml::_('jquery.ui');
$document = JFactory::getDocument();
$document->addStyleSheet('media/com_thorhospedaje/css/th_reservation.css');
$document->addStyleSheet('media/com_thorhospedaje/css/jquery-themes/jquery-ui.min.css');
$document->addStyleSheet(JURI::base().'media/jui/css/chosen.css');
$document->addScript('media/com_thorhospedaje/js/jquery-ui.min.js');
$document->addScript(JURI::base().'media/jui/js/chosen.jquery.js');
$document->addScriptDeclaration("
jQuery(document).ready(function($) {
	$('#checkin').datepicker({
		numberOfMonths: 2,
		showButtonPanel: true,
		dateFormat: 'yy-mm-dd',
		minDate: new Date(),
		onClose: function( selectedDate ) {
		//var dateCheckin = $( '#checkout' ).datepicker('getDate');
		var dateCheckout = new Date(Date.parse(selectedDate));
		dateCheckout.setDate(dateCheckout.getDate() + 1);
		$( '#checkout' ).datepicker( 'option', 'minDate', dateCheckout);
		$( '#checkout' ).datepicker( 'setDate', dateCheckout);
		}
	});
	
	$('#checkout').datepicker({
		numberOfMonths: 2,
		showButtonPanel: true,
		dateFormat: 'yy-mm-dd',
	});
	
	$('#country_id').chosen({
		disable_search_threshold: 10,
		allow_single_deselect: true,
	});
	
	$('#state_id').chosen({
		disable_search_threshold: 10,
		allow_single_deselect: true,
	});
	
	$('#th_asset_id').chosen({
		disable_search_threshold: 10,
		allow_single_deselect: true,
	});
	
	$('#n_adults').chosen({
		disable_search_threshold: 10,
		allow_single_deselect: true,
	});
	
	$('#n_childrens').chosen({
		disable_search_threshold: 10,
		allow_single_deselect: true,
	});
	
	$('#country_id').bind('change',function(){
		var country_id = $('#country_id').val();
		if (country_id == '')
		{
			country_id='-1'
		}
		$('#state_id').load('index.php?option=com_thorhospedaje&task=states.statesAjax&id_country='+country_id,function(){
			$('#state_id').val('').trigger('liszt:updated');
			$('#th_asset_id').empty();
			$('#th_asset_id').html('<option value=\"\"></option>');
			$('#th_asset_id').val('').trigger('liszt:updated');
		});
	});
	
	$('#state_id').bind('change',function(){
		var state_id = $('#state_id').val();
		if (state_id == '')
		{
			state_id='-1'
		}
		$('#th_asset_id').load('index.php?option=com_thorhospedaje&task=assets.assetsAjax&id_state='+state_id,function(){
			$('#th_asset_id').val('').trigger('liszt:updated');
		});
	});
});
");
?>
<div class="mod_th_reservation">
<form action="" method="GET" class="form-inline">
<input type="hidden" name="option" value="com_thorhospedaje">
<input type="hidden" name="view" value="reservation">


<div class="row-fluid">
	<h1><?php echo JText::_('TH_RESERVATION_LABEL'); ?></h1>
</div>
<hr />
<div class="row-fluid data-reservation">
	<h4><?php echo $this->item->asset_name; ?></h4>
	<p><?php echo $this->item->state_name; ?>, <?php echo $this->item->country; ?></p>
	<p><strong><?php echo JText::_('TH_RESERVATION_CHECKIN_LABEL'); ?>: &nbsp;</strong><?php echo $this->item->checkin; ?></p>
	<p><strong><?php echo JText::_('TH_RESERVATION_CHECkOUT_LABEL'); ?>: &nbsp;</strong><?php echo $this->item->checkout; ?></p>
</div>
<div class="row-fluid">
	<h3><?php echo JText::_('TH_RESERVATION_ROOMS_LABEL'); ?></h3>
</div>
<hr />
<?php echo $this->loadTemplate('rooms'); ?>
<div class="row-fluid">
	<h3><?php echo JText::_('TH_RESERVATION_CLIENT_LABEL'); ?></h3>
</div>
<hr />
<?php echo $this->loadTemplate('client'); ?>
<!-- <div class="row-fluid">
	<h3><?php echo JText::_('TH_RESERVATION_CONFIRMATION_LABEL'); ?></h3>
</div>
<hr />
<?php echo $this->loadTemplate('confirmation'); ?> -->
<div class="row-fluid"><button id="reservation" name="reservation" class="btn btn-primary" style="float: right;" type="submit">
			<i class="icon-checkmark"></i> Reservar	</button></div>
</form>
</div>
