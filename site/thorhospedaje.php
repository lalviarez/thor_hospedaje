<?php
/**
 * @version		$Id: thorhospedaje.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
**/

defined('_JEXEC') or die;

$controller	= JControllerLegacy::getInstance('ThorHospedaje');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

