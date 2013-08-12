<?php

/**
 * @version		$Id: view.raw.php 2013-08-06
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note			Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * States View
 */
class ThorHospedajeViewStates extends JViewLegacy
{
	
	protected $items;

	/**
	 * Countries view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$this->items		= $this->get('Items');
      
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		print_r ($this->items);
	}
}
