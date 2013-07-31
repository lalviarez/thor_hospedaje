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
		
		$id_country = $this->getState('filter.id_country', '%');
		$query->where('a.id_country' = (int) $id_country);
		
		// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.ordering')).' '.$db->escape($this->getState('list.direction', 'ASC')));

		return $query;
	}
}
