<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

?>


<div class="row-fluid box" style="text-align:justify; padding:2% !important; margin-top: 5%;">
	<?php echo JText::_('TH_POSADERO_PAY_PAGO_TEXT'); ?>
</div>

<div class="row-fluid">
<h2><?php echo JText::_('TH_POSADERO_PAY_PAGO_TITLE'); ?></h2>
	<div style="margin: 0px; height: 5px; background-color: transparent; background-image: linear-gradient(to right, #009fe3 0%, rgba(2, 255, 255, 0) 100%);
	margin-bottom: 3%;"></div>	
	<div class="row-fluid" id="pay-box" style="display: block; background-color: white; padding: 2% !important; border: 1px solid rgb(255, 204, 0); border-radius: 10px;">
		<h3>Selecciona un plan</h3>
	</div>
	<div class="row-fluid" id="pay-box-venezuela" style="display: none; background-color: white; padding: 2% !important; border: 1px solid rgb(255, 204, 0); border-radius: 10px;">
		<h1> Opciones de Venezuela </h1>
	</div>
</div>
<br />


