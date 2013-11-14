<?php

/**
 * @version		$Id: view.html.php 2013-10-29
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import model states
//require_once JPATH_COMPONENT.'/models/states.php';

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Countries View
 */
class ThorHospedajeViewPosaderos extends JViewLegacy
{
	
	protected $pagination;
	
	protected $state;

	protected $item;
	
	protected $params;

	/**
	 * Pay view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		$app = JFactory::getApplication();
		
		// Get data from the model
		//$this->item		= $this->get('Item');
		//$this->state	= $this->get('State');
		//$this->params = JComponentHelper::getParams('com_thorhospedaje');

        // Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Display the template
		parent::display($tpl);
	}
}
