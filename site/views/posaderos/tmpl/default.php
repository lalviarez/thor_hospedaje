<?php
/**
 * @version		$Id: default.php 2013-10-29
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

$document = JFactory::getDocument();
$document->addStyleSheet('media/com_thorhospedaje/css/th_posadero.css');
$document->addStyleSheet('media/com_thorhospedaje/css/jquery-themes/jquery-ui.min.css');
$document->addStyleSheet(JURI::base().'media/jui/css/chosen.css');
$document->addScript('media/com_thorhospedaje/js/jquery-ui.min.js');
$document->addScript(JURI::base().'media/jui/js/chosen.jquery.js');
?>
<div class="mod_th_posadero">
<div class="span3"></div>

<div class="span9">
<h2><?php echo JText::_('TH_POSADERO_MESSAGE_TITLE'); ?></h2>
<p><?php echo JText::_('TH_POSADERO_MESSAGE_P1'); ?></p>
<p><?php echo JText::_('TH_POSADERO_MESSAGE_P2'); ?></p>

<form action="<?php echo JRoute::_("");?>" method="POST" class="form-inline">




<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_LANGUAGE'); ?></h2>
	<div class="hr"></div>
	<div class="control-label"><label title="" for="client-language"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_LABEL'); ?></label></div>
	<div class="controls">
		<div class="input-append">
			<!-- <input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_LABEL'); ?>" value="" id="client-name" name="jform[client_data][client-name]" title=""> -->
			<select name="client-language" id="client-language">
				<option value=""><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_SELECT'); ?></option>
				<option value="1"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_PT'); ?></option>
				<option value="2"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_EN'); ?></option>
				<option value="3"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_ES'); ?></option>
			</select>
		</div>
	</div>
</div>

<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_DATA_CONTACT'); ?></h2>
	<div class="hr"></div>
	
</div>

<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_ADDRESS_ASSET'); ?></h2>
	<div class="hr"></div>
	
</div>

<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_ASSET'); ?></h2>
	<div class="hr"></div>
	
</div>


<div class="row-fluid">
	<h3><?php //echo JText::_('TH_POSADERO_CLIENT_LABEL'); ?></h3>
</div>
<hr />
<?php //echo $this->loadTemplate('client'); ?>
<div class="row-fluid">
	<h3><?php //echo JText::_('TH_POSADERO_METHOD_LABEL'); ?></h3>
</div>
<hr />
<?php //echo $this->loadTemplate('paymethod'); ?>

<!-- <div class="row-fluid"><button id="reservation" name="reservation" class="btn btn-primary" style="float: right;" type="submit">
			<i class="icon-checkmark"></i> Reservar	</button></div> -->
</form>
</div>
</div>
