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
//JHtml::_('jquery.ui');
$document = JFactory::getDocument();
$document->addStyleSheet('media/com_thorhospedaje/css/th_reservation.css');
$document->addStyleSheet('media/com_thorhospedaje/css/jquery-themes/jquery-ui.min.css');
$document->addStyleSheet(JURI::base().'media/jui/css/chosen.css');
$document->addScript('media/com_thorhospedaje/js/jquery-ui.min.js');
$document->addScript(JURI::base().'media/jui/js/chosen.jquery.js');

?>
<div class="mod_th_pay">
<form action="<?php echo JRoute::_("");?>" method="POST" class="form-inline">
<div class="row-fluid">
	<h1><?php echo JText::_('TH_PAY_LABEL'); ?></h1>
</div>
<hr />
<div class="row-fluid">
	<h3><?php echo JText::_('TH_PAY_CLIENT_LABEL'); ?></h3>
</div>
<hr />
<?php echo $this->loadTemplate('client'); ?>
<div class="row-fluid">
	<h3><?php echo JText::_('TH_PAY_METHOD_LABEL'); ?></h3>
</div>
<hr />
<?php echo $this->loadTemplate('paymethod'); ?>
<!-- <div class="row-fluid">
	<h3><?php echo JText::_('TH_RESERVATION_CONFIRMATION_LABEL'); ?></h3>
</div>
<hr />
<?php echo $this->loadTemplate('confirmation'); ?> -->
<div class="row-fluid"><button id="reservation" name="reservation" class="btn btn-primary" style="float: right;" type="submit">
			<i class="icon-checkmark"></i> Reservar	</button></div>
</form>
</div>
