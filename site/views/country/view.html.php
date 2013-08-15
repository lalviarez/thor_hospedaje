<?php

/**
 * @version		$Id: view.html.php 2013-08-14
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import model states
require_once JPATH_COMPONENT.'/models/states.php';

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Countries View
 */
class ThorHospedajeViewCountry extends JViewLegacy
{
	
	protected $pagination;
	
	protected $state;

	protected $item;
	
	protected $params;

	/**
	 * Country view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		$app		= JFactory::getApplication();
		
		// Get data from the model
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
		$this->params = &$this->state->params; 

		if ($this->item)
		{
			// Get States Model data
			$statesModel = JModelLegacy::getInstance('States', 'ThorHospedajeModel', array('ignore_request' => true));
			$statesModel->setState('list.select', 'a.id, a.state_name, a.state_desc, a.image, a.ordering');
		
			// Filter by state of publicated
			$statesModel->setState('filter.state', 1);

			// Filter by language
			$statesModel->setState('filter.language', $app->getLanguageFilter());
			
			// Filter by Country
			$id_country	= $this->item->id;
			$statesModel->setState('filter.id_country', $id_country);
			
			// Ordering
			$statesModel->setState('list.ordering', 'ordering');
			$statesModel->setState('list.direction','asc');
			
			// Set the limits for pagination
			$limitstart = $app->input->get('limitstart', 0, 'uint');
			$statesModel->setState('list.start', $limitstart);
			// LJAH: Esto debe cambiarse por parametros pasados por usuario
			$countItems = ((int) $this->params->get('country-rowcount', 2)) * ((int) $this->params->get('country-rowcount', 2));
			$statesModel->setState('list.limit', $countItems);

			$this->item->states = $statesModel->getItems();
			$this->pagination = $statesModel->getPagination();
		}
		
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
