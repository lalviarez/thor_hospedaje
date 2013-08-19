<?php

/**
 * @version		$Id: states.php 2013-07-31
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * States Model
 */
class ThorHospedajeModelStates extends JModelList
{
	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	public $_context = 'com_thorhospedaje.states';
	
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
		$value = ((int) $params->get('states-rowcount', 2)) * ((int) $params->get('states-rowcount', 2));
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
		$app = JFactory::getApplication();
		
		// Select field to query
		$query->select($this->getState('list.select', 'a.*'));
		$query->from($db->quoteName('#__th_states').' AS a');
		
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

		/*
		 * LJAH: Esta rutina debe revisarse para mejorarla, posiblemente
		 * haya codigo que no haga nada.
		 **/
		$id_country = $this->getState('filter.id_country', NULL);
		if ($id_country != NULL)
		{
			$app->setUserState('filter.id_country', $id_country);
			$app->getUserState('filter.id_country', NULL);
		}
		else
		{
			$app->getUserState('filter.id_country', NULL);
			$id_country = $app->getUserState('filter.id_country', NULL);
		}
		$query->where('a.country_id = '. (int) $id_country);
		/* --- */
		
		
/*		if ($id_country === "%"){
			$query->where('a.country_id LIKE '."'".$id_country."'");
		}
		else{
			$query->where('a.country_id = '. (int) $id_country);
		}*/
		
		// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.ordering')).' '.$db->escape($this->getState('list.direction', 'ASC')));

		return $query;
	}
	
	/**
	 * Method to get a list of states.
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
			if (isset($item->params))
			{
				$registry = new JRegistry;
				$registry->loadString($item->params);
				$item->params = clone $this->getState('params');
				$item->params->merge($registry);
			}
		}

		return $items;
	}
}
