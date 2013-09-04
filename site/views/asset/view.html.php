<?php

/**
 * @version		$Id: view.html.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


// import Joomla view library
jimport('joomla.application.component.view');

/**
 * State View
 */
class ThorHospedajeViewAsset extends JViewLegacy
{
	
	protected $state;

	protected $item;
	
	protected $params;

	/**
	 * State view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		$app = JFactory::getApplication();
		
		// Get data from the model
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
		$this->params = JComponentHelper::getParams('com_thorhospedaje');

		if ($this->item)
		{
			// If we found an item, merge the item parameters
			//$this->params->merge($this->item->params);
			//$this->params = $this->item->params;
			
						
			/* 
			 * Select country 
			 * */
			$countryModel = JModelLegacy::getInstance('Country', 'ThorHospedajeModel', array('ignore_request' => true));
			$countryModel->setState('list.select', 'a.country');
		
			// Filter by state of publicated
			$countryModel->setState('filter.state', 1);

			// Filter by language
			$countryModel->setState('filter.language', $app->getLanguageFilter());
			
			// Filter by Country
			$country_id = $this->item->country_id;
			$countryModel->setState('country.id', $country_id);
			$this->item->country = $countryModel->getItem();
			
			/* 
			 * Select state 
			 * */
			$stateModel = JModelLegacy::getInstance('State', 'ThorHospedajeModel', array('ignore_request' => true));
			$stateModel->setState('list.select', 'a.state_name');
		
			// Filter by state of publicated
			$stateModel->setState('filter.state', 1);

			// Filter by language
			$stateModel->setState('filter.language', $app->getLanguageFilter());
			
			// Filter by State
			$state_id = $this->item->state_id;
			$stateModel->setState('state.id', $state_id);
			$this->item->state = $stateModel->getItem();
			
			
			/* 
			 * Get AvailabilityRooms Model data
			 * */
			$roomsModel = JModelLegacy::getInstance('AvailabilityRooms', 'ThorHospedajeModel', array('ignore_request' => true));
			$roomsModel->setState('list.select', 'a.*');
		
			
			// Filter by state of publicated
			$roomsModel->setState('params', $this->params);
			
			// Filter by state of publicated
			$roomsModel->setState('filter.state', 1);

			// Filter by language
			$roomsModel->setState('filter.language', $app->getLanguageFilter());
			
			// Filter by Country
			$country_id = $this->item->country_id;
			$roomsModel->setState('country_id', $country_id);
			
			// Filter by State
			$state_id = $this->item->state_id;
			$roomsModel->setState('state_id', $state_id);
			
			// Filter by asset
			$th_asset_id = $this->item->id;
			$roomsModel->setState('th_asset_id', $th_asset_id);
			
			// Filtrando por fecha de entrada
			$roomsModel->setState('checkin', $app->input->get('checkin', NULL));
			
			// Filtrando por fecha de salida
			$roomsModel->setState('checkout', $app->input->get('checkout', NULL));
			
			// Filtrando por cantidad de adultos
			$roomsModel->setState('n_adults', $app->input->get('n_adults', NULL));
			
			// Filtrando por cantidad de niños
			$roomsModel->setState('n_childrens', $app->input->get('n_childrens', NULL));
			
			// Ordering
			$roomsModel->setState('list.ordering', 'ordering');
			$roomsModel->setState('list.direction','asc');
			
			// Set the limits for pagination
			$limitstart = $app->input->get('limitstart', 0, 'uint');
			$roomsModel->setState('list.start', $limitstart);
			
			// Se calculan los elementos a traer en cada consulta
			//$countItems = ((int) $this->params->get('state-rowcount', 2)) * ((int) $this->params->get('state-rowcount', 2));
			$countItems = 5;
			$roomsModel->setState('list.limit', $countItems);
			
			$asset_rooms = $roomsModel->getItems();
			if (isset($asset_rooms[0]->rooms_types) && ($asset_rooms[0]->rooms_types))
			{
				$this->item->rooms = $asset_rooms[0]->rooms_types;
			}
			$this->pagination = $roomsModel->getPagination();
			
			
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
