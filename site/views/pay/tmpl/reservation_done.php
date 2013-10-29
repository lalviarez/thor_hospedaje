<?php
/**
 * @version		$Id: reservation_done.php 2013-10-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

// Get some data from successful reservation
$app = JFactory::getApplication();
?>
<div id="solidres">
	<div class="alert alert-success">
		<p>
			<?php echo JText::sprintf('TH_RESERVATION_COMPLETE',"Reservación", "Correo del cliente") ?>
		</p>
	</div>
</div>
