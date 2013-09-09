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
<div class="row-fluid">
	<table class="confirmation-table">
	<tr><td class="item">Habitación uno</td><td class="cost">Precio</td></tr>
	<tr><td class="item">Habitación dos</td><td class="cost">Precio</td></tr>
	<tr><td class="total">Total</td><td class="total-cost">Precio Total</td></tr>
	</table>
</div>
<div class="row-fluid"><button id="reservation" name="reservation" class="btn btn-primary" style="float: right;" type="submit">
			<i class="icon-checkmark"></i> Reservar	</button></div>
