<?php

/**
 * @version		$Id: view.html.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Countries View
 */
class ThorHospedajeViewCountries extends JViewLegacy
{
	
	protected $items;

	protected $pagination;

	/**
	 * Countries view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');  

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
