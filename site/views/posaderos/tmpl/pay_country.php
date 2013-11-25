<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

?>


<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_PAY_COUNTRY_TITLE'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
		<div class="span3">
			<img id="img_country_1" src="media/com_thorhospedaje/images/posaderos/brasil.png" class="bandera" />
			<input type="radio" name="country" id="country_1" value="1" style="display: block; margin: 0 auto 0 auto !important;"/>
			<p style="margin: 0px; text-align: center;"><?php echo JText::_('TH_POSADERO_PAY_COUNTRY_NAME_BRASIL'); ?></p>
		</div>
		<div class="span3">
			<img id="img_country_2" src="media/com_thorhospedaje/images/posaderos/usa.png" class="bandera" />
			<input type="radio" name="country" id="country_2" value="2" style="display: block; margin: 0 auto 0 auto !important;"/>
			<p style="margin: 0px; text-align: center;"><?php echo JText::_('TH_POSADERO_PAY_COUNTRY_NAME_USA'); ?></p>
		</div>
		<div class="span3">
			<img id="img_country_3" src="media/com_thorhospedaje/images/posaderos/venezuela.png" class="bandera" />
			<input type="radio" name="country" id="country_3" value="3" style="display: block; margin: 0 auto 0 auto !important;"/>
			<p style="margin: 0px; text-align: center;"><?php echo JText::_('TH_POSADERO_PAY_COUNTRY_NAME_VENEZUELA'); ?></p>
		</div>
		<div class="span3">
			<img id="img_country_0" src="media/com_thorhospedaje/images/posaderos/todo_mundo.png" class="bandera" />
			<input type="radio" name="country" id="country_0" value="0" style="display: block; margin: 0 auto 0 auto !important;"/>
			<p style="margin: 0px; text-align: center;"><?php echo JText::_('TH_POSADERO_PAY_COUNTRY_NAME_TODO_MUNDO'); ?></p>
		</div>
	</div>
</div>



