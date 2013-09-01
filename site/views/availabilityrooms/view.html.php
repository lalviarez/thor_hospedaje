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
 * Availability rooms View
 */
class ThorHospedajeViewAvailabilityRooms extends JViewLegacy
{
	protected $state;
	
	protected $items;

	protected $pagination;
	
	protected $params;
	
	protected $countries;

	/**
	 * Availability rooms view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		$app = JFactory::getApplication();
		// Get data from the model
		//$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		//$this->pagination	= $this->get('Pagination'); 
		//$this->params = &$this->state->params; 
		// If we found an item, merge the item parameters
		
		//$this->params->merge($this->item->params);
		//$this->params = $this->item->params;
		
		// Get States Model data
		$countriesModel = JModelLegacy::getInstance('Countries', 'ThorHospedajeModel', array('ignore_request' => true));
		$countriesModel->setState('list.select', 'a.id, a.country');
	
		// Load parameters
		//$statesModel->setState('params', $this->params);
		
		// Filter by state of publicated
		$countriesModel->setState('filter.state', 1);

		// Filter by language
		$countriesModel->setState('filter.language', $app->getLanguageFilter());
		
		// Filter by Country
		//$id_country	= $this->item->id;
		//$statesModel->setState('filter.id_country', $id_country);
		
		// Ordering
		$countriesModel->setState('list.ordering', 'ordering');
		$countriesModel->setState('list.direction','asc');
		
		// Set the limits for pagination
		//$limitstart = $app->input->get('limitstart', 0, 'uint');
		//$statesModel->setState('list.start', $limitstart);
		
		// Se calculan los elementos a traer en cada consulta
		//$countItems = ((int) $this->params->get('country-rowcount', 2)) * ((int) $this->params->get('country-rowcount', 2));
		//$statesModel->setState('list.limit', $countItems);

		$this->countries = $countriesModel->getItems();
		//$this->pagination = $statesModel->getPagination();
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
