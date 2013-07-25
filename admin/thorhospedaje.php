<?php
/**
 * @version		$Id: thorhospedaje.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
**/

defined('_JEXEC') or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_redirect'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller	= JControllerLegacy::getInstance('Thorhospedaje');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
