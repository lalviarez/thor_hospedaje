<?php
/**
 * @version		$Id: default_paymethod.php 2013-10-31
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
<div class="row-fluid">
	<p><?php echo JText::_('TH_PAY_MESSAGE_PAYMETHOD_LABEL'); ?>.</p>
	<input type="radio" value="1" id="pay_method" name="jform[pay_method]" title=""> Visa Electron
	<input type="radio" value="2" id="pay_method" name="jform[pay_method]" title=""> Visa
	<input type="radio" value="3" id="pay_method" name="jform[pay_method]" title=""> Mastercard
	<input type="radio" value="4" id="pay_method" name="jform[pay_method]" title=""> Diners Club
	<input type="radio" value="5" id="pay_method" name="jform[pay_method]" title=""> American Express
	<input type="radio" value="6" id="pay_method" name="jform[pay_method]" title=""> Elo
	<input type="radio" value="7" id="pay_method" name="jform[pay_method]" title=""> Discover
	<input type="radio" value="8" id="pay_method" name="jform[pay_method]" title=""> JCB
	<input type="radio" value="9" id="pay_method" name="jform[pay_method]" title=""> Aura
	
	<p>* Se deben mostrar los logos de tarjetas para seleccionar el pago</p>
	<p>* Se deben mostrar los "productos" a comprar, se traen de una vista anterior</p>
</div>

