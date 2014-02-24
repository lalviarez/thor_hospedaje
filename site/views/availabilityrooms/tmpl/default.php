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
$document->addStyleSheet('media/com_thorhospedaje/css/th_availabilityrooms.css');
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
<form action="" method="GET" class="form-inline" style="background-color: rgb(255, 255, 255); border: 1px solid rgb(255, 204, 0); border-radius: 10px; box-shadow: 0px 0px 5px rgb(153, 153, 153); margin: 2% 1%; padding: 1%;">
<input type="hidden" name="option" value="com_thorhospedaje">
<input type="hidden" name="view" value="availabilityrooms">

<div class="row-fluid">
<div class="control-group">
	<!-- <div class="span1"></div> -->
	<div class="span4">
	<div class="control-label"><label for="country_id" title=""><?php echo JText::_('TH_AR_FIELD_COUNTRY_LABEL'); ?></label></div>
	<div class="controls">
	<select name="country_id" id="country_id" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_COUNTRY_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_COUNTRY_PLACEHOLDER'); ?>">
		<option value=""></option>
		<?php
		foreach($this->countries as $country):
		?>
		<option value="<?php echo $country->id;?>"><?php echo $country->country;?></option>
		<?php
		endforeach;
		?>
	</select>
	</div>
	</div>

	<div class="span4">
	<div class="control-label"><label for="state_id" title=""><?php echo JText::_('TH_AR_FIELD_STATE_LABEL'); ?></label></div>
	<div class="controls">
	<select name="state_id" id="state_id" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_STATE_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_STATE_PLACEHOLDER'); ?>">
	<option></option>
	</select>
	</div>
	</div>

	<div class="span4">
	<div class="control-label"><label for="th_asset_id" title=""><?php echo JText::_('TH_AR_FIELD_ASSET_LABEL'); ?></label></div>
	<div class="controls">
	<select name="th_asset_id" id="th_asset_id" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_ASSET_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_ASSET_PLACEHOLDER'); ?>">
	<option></option>
	</select>
	</div>
	</div>
	<!-- <div class="span1"></div> -->
</div>	
</div>
<br />
<div class="row-fluid">
<div class="control-group">
	<div class="span3"></div>
	<div class="span4">
	<div class="control-label"><label title="" for="checkin"><?php echo JText::_('TH_AR_FIELD_CHECKIN_LABEL'); ?></label></div>
	<div class="controls"><div class="input-append">
	<input type="text" class="input-small" size="10" placeholder="yyyy/mm/dd" value="" id="checkin" name="checkin" title="" readonly="readonly">
	<span class="add-on"><span class="icon-calendar"></span></span></div></div>
	</div>
	
	<div class="span3">
	<div class="control-label"><label title="" for="checkout"><?php echo JText::_('TH_AR_FIELD_CHECKOUT_LABEL'); ?></label></div>
	<div class="controls"><div class="input-append">
	<input type="text" class="input-small" size="10" placeholder="yyyy/mm/dd" value="" id="checkout" name="checkout" title="" readonly="readonly">
	<span class="add-on"><span class="icon-calendar"></span></span></div></div>
	</div>
	<div class="span2"></div>
</div>
</div>
<br />
<div class="row-fluid">
<div class="control-group">
	<div class="span4"></div>
	<div class="span3">
	<div class="control-label"><label title="" for="n_adults"><?php echo JText::_('TH_AR_FIELD_N_ADULTS_LABEL'); ?></label></div>
	<div class="controls">
		<select class="input-mini" name="n_adults" id="n_adults" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_N_ADULTS_PLACEHOLDER'); ?>">
			<option value="0"></option>
			<?php
			for($i=1;$i < 11; $i++):
			?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php
			endfor;
			?>
		</select>
	</div>
	</div>
	
	<div class="span3">
	<div class="control-label"><label title="" for="n_childrens"><?php echo JText::_('TH_AR_FIELD_N_CHILDRENS_LABEL'); ?></label></div>
	<div class="controls">
		<select class="input-mini" name="n_childrens" id="n_childrens" data-no_results_text="<?php echo JText::_('TH_AR_FIELD_N_CHILDRENS_NO_RESULTS_TEXT'); ?>" data-placeholder="<?php echo JText::_('TH_AR_FIELD_N_CHILDRENS_PLACEHOLDER'); ?>">
			<option value="0"></option>
			<?php
			for($i=1;$i < 11; $i++):
			?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php
			endfor;
			?>
		</select>
	</div>
	</div>
	<div class="span2"></div>
</div>
</div>
<div class="row-fluid">
<div class="control-group">
<div class="span5"></div>	
<div class="span2">
<div class="controls">
	<button class="btn btn-primary btn" name="Submit" type="submit">&nbsp; &nbsp; <?php echo JText::_('TH_AR_FIELD_SEARCH_BUTTOM'); ?>&nbsp; &nbsp; </button>
</div>
</div>
<div class="span1"></div>
</div>
</div>
</form>

<!-- <hr style="margin: 0px;	border-width: 2px 0;"/> -->
<?php echo $this->loadTemplate('assets'); ?>
