<?php

/**
 * @version		$Id: countries.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * AvailabilityRooms Model
 */
class ThorHospedajeModelAvailabilityRooms extends JModelList
{
	
	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	public $_context = 'com_thorhospedaje.availabilityrooms';
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return  void
	 * @since   1.6
	 */
	protected function populateState($ordering = 'ordering', $direction = 'ASC')
	{
		$app = JFactory::getApplication('site');
		$params = $app->getParams();
		
		// List state information
		// Load parameters
		$this->setState('params', $params);
		
		// Se calculan los elementos a traer en cada consulta
		$value = 5;
		$this->setState('list.limit', $value);

		$value = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $value);

		$orderCol = $app->input->get('filter_order', 'a.ordering');
		if (!in_array($orderCol, $this->filter_fields))
		{
			$orderCol = 'a.ordering';
		}
		$this->setState('list.ordering', $orderCol);

		$listOrder = $app->input->get('filter_order_Dir', 'ASC');
		if (!in_array(strtoupper($listOrder), array('ASC', 'DESC', '')))
		{
			$listOrder = 'ASC';
		}
		$this->setState('list.direction', $listOrder);
		
		$this->setState('filter.language', $app->getLanguageFilter());
		
		// Filter by state, only published
		$this->setState('filter.state', 1);
		
		// Obteniendo id de país
		$this->setState('country_id', $app->input->get('country_id', NULL));
		
		// Obteniendo id de estado / región
		$this->setState('state_id', $app->input->get('state_id', NULL));
		
		// Obteniendo id de posada
		$this->setState('th_asset_id', $app->input->get('th_asset_id', NULL));
		
		// Obteniendo fecha de entrada
		$this->setState('checkin', $app->input->get('checkin', NULL));
		
		// Obteniendo fecha de salida
		$this->setState('checkout', $app->input->get('checkout', NULL));
		
		// Obteniendo cantidad de adultos
		$this->setState('n_adults', $app->input->get('n_adults', NULL));
		
		// Obteniendo cantidad de niños
		$this->setState('n_childrens', $app->input->get('n_childrens', NULL));
	}
	
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery() 
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		// Select field to query
		$query->select($this->getState('list.select', 'a.*'));
		$query->from($db->quoteName('#__th_assets').' AS a');
		
		// Filter by state
		$state = $this->getState('filter.state');
		if (is_numeric($state))
		{
			$query->where('a.state = '.(int) $state);
		}
		
		// Filter by language
		if ($this->getState('filter.language'))
		{
			$query->where('a.language in (' . $db->Quote(JFactory::getLanguage()->getTag()) . ',' . $db->Quote('*') . ')');
		}
		
		//Filtrando por País
		$country_id = $this->getState('country_id');
		if ($country_id && is_numeric($country_id))
		{
			$query->where('a.country_id = ' . $country_id);
		}
		
		//Filtrando por Estado
		$state_id = $this->getState('state_id');
		if ($state_id && is_numeric($state_id))
		{
			$query->where('a.state_id = ' . $state_id);
		}
		
		//Filtrando por Posada
		$th_asset_id = $this->getState('th_asset_id');
		if ($th_asset_id && is_numeric($th_asset_id))
		{
			$query->where('a.id = ' . $th_asset_id);
		}
		// Seleccionando nombre de país
		$query->select('b.country');
		$query->from($db->quoteName('#__th_countries').' AS b');
		$query->where('a.country_id = b.id');
		
		// Seleccionando nombre de estado estado
		$query->select('c.state_name');
		$query->from($db->quoteName('#__th_states').' AS c');
		$query->where('a.state_id = c.id');		
		
		// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.ordering')).' '.$db->escape($this->getState('list.direction', 'ASC')));
		
		return $query;
	}
	
	/**
	 * Method to get a list of countries.
	 *
	 * Overriden to inject convert the attribs field into a JParameter object.
	 *
	 * @return  mixed  An array of objects on success, false on failure.
	 * @since   1.6
	 */
	public function getItems()
	{
		$items	= parent::getItems();
		/*$user	= JFactory::getUser();
		$userId	= $user->get('id');
		$guest	= $user->get('guest');
		$groups	= $user->getAuthorisedViewLevels();
		$input  = JFactory::getApplication()->input;

		// Get the global params
		$globalParams = JComponentHelper::getParams('com_content', true);*/

		// Convert the parameter fields into objects.
		
		
		
		foreach ($items as &$item)
		{
			
			$item->rooms_types = $this->getListAvailabilityRooms($item->id);
			if (isset($item->params))
			{
				$registry = new JRegistry;
				$registry->loadString($item->params);
				$item->params = clone $this->getState('params');
				$item->params->merge($registry);
			}
			
			/*
			 * Esto podría traer un problema con la paginación
			 * */
			/*if (!isset($item->rooms_types) || !$item->rooms_types)
			{
				unset($item);
			}*/
		}
		
		return $items;
	}
	
	public function getListAvailabilityRooms($th_asset_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		/* Se obtienen los tipos de habitaciones de la posada
		 * */
		$query->select('a.*');
		$query->from($db->quoteName('#__th_rooms').' AS a');
		
		// Filter by state
		$query->where('a.state = 1');
		
		//Filter for language
		$query->where('a.language in (' . $db->Quote(JFactory::getLanguage()->getTag()) . ',' . $db->Quote('*') . ')');
				
		$query->where('a.th_asset_id = ' . (int) $th_asset_id);
		
		// Filtrar por número de adultos
		$n_adults = $this->getState('n_adults');
		if ($n_adults && is_numeric($n_adults))
		{
			$query->where('number_adult >= ' . $n_adults);
		}

		// Filtrar por número de niños
		$n_childrens = $this->getState('n_childrens');
		if ($n_childrens && is_numeric($n_childrens))
		{
			$query->where('number_children >= ' . $n_childrens);
		}

		$db->setQuery($query);
		$rooms_types = $db->loadObjectList();
		
		/**** Fin obtener tipos de habitaciones de la posada ****/
		
		/* Se recorren los tipos de habitaciones para saber si tienen
		 * reservaciones según las fechas pasadas por parámetro 
		 * */
		// Hay que verificar que las fechas no sean inferiores a la actual
		$checkin = $this->getState('checkin');
		$checkout = $this->getState('checkout');
		if ($checkin && $checkout)
		{
			foreach($rooms_types as &$room_type)
			{
				// Se convierte la cadena con los números de habitaciones en un
				// arreglo
				$rooms_number = explode(",",$room_type->rooms_number);
				$availability_rooms = NULL;
				$no_availability_rooms = NULL;
							
				// Se verifica la disponibilidad de cada habitación
				foreach ($rooms_number as $room_number)
				{
					$availability = $this->_checkAvailabilityRoom($th_asset_id, $room_type->id, $room_number, $checkin, $checkout);
					if ($availability) // No está disponible
					{
						$no_availability_rooms[$room_number]=0;
					}
					else // Está disponible
					{
						$availability_rooms[$room_number]=1;
					}
					$room_type->availability_rooms = $availability_rooms;
					$room_type->no_availability_rooms = $no_availability_rooms;
				}			
			}
		}
		/**** Fin recorrer tipos de habitaciones de la posada ****/
		return count($rooms_types) ? $rooms_types : NULL;
	}
	
	protected function _checkAvailabilityRoom($th_asset_id, $room_type_id, $room_number, $checkin = NULL, $checkout = NULL)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		
		$query->select('b.room_number');
		$query->from($db->quoteName('#__th_reservations').' AS a');
		$query->from($db->quoteName('#__th_reservations_rooms').' AS b');
		$query->where('a.th_asset_id = ' . (int) $th_asset_id);
		$query->where('a.id = b.reservation_id');	
		$query->where('b.room_id = ' . (int) $room_type_id);
		$query->where('b.room_number = ' . (int) $room_number);
		$query->where("((date('".$checkin."') BETWEEN a.checkin AND a.checkout)" . "OR (date('".$checkout."') BETWEEN a.checkin AND a.checkout)"
						. "OR (a.checkin BETWEEN date('".$checkin."') AND date('".$checkout."'))" 
						. "OR (a.checkout BETWEEN date('".$checkin."') AND date('".$checkout."')))");
		$db->setQuery($query);
		$availability = $db->loadObject();
		
		if (isset($availability->room_number) && $availability->room_number)
		{
			return $availability->room_number;
		}
		else
		{
			return NULL;
		}
	}
}
