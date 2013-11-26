<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

?>


<div class="row-fluid box" style="text-align:justify; padding:2% !important;">
	<?php echo JText::_('TH_POSADERO_PAY_PLAN_TEXT'); ?>
</div>

<div class="row-fluid">
<h2><?php echo JText::_('TH_POSADERO_PAY_PLAN_TITLE'); ?></h2>
	<div style="margin: 0px; height: 5px; background-color: transparent; background-image: linear-gradient(to right, #009fe3 0%, rgba(2, 255, 255, 0) 100%);
	margin-bottom: 3%;"></div>
	<div class="row-fluid">
			<img id="img_plan_1" src="media/com_thorhospedaje/images/productor/pago_gratis.png" class="plan"/>
		
			<img id="img_plan_2" src="media/com_thorhospedaje/images/productor/pago_6_meses.png" class="plan" style="margin-right: 0px;" />
	</div>
	<input type="hidden" name="plan" id="plan" value=""/>

</div>


