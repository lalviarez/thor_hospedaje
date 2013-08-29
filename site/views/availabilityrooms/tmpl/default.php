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

?>
<h1>Hola mundo!</h1>

<?php
foreach($this->items as $item):
?>
<div class="row-fluid">
	<h2><?php echo $item->country;?></h2>
	<h3><?php echo $item->state_name;?></h3>
	<h4><?php echo $item->asset_name;?></h4>
</div>	
<?php
endforeach;
?>
