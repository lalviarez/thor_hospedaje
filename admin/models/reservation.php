<?php

/**
 * @version		$Id: room.php 2013-09-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * Reservation Model
 */
class ThorHospedajeModelReservation extends JModelAdmin
{
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Reservation', $prefix = 'ThorHospedajeTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	mixed	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true) 
	{
		// Get the form.
		$form = $this->loadForm('com_thorhospedaje.reservation', 'reservation', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) 
		{
			return false;
		}
		return $form;
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData() 
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_thorhospedaje.edit.reservation.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	
	/**
	 * Method to get a single record.
	 *
	 * @param   integer	$pk	The id of the primary key.
	 *
	 * @return  mixed  Object on success, false on failure.
	 * @since   1.6
	 */
	/*public function getItem()
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Select some fields
		$query->select('a.id,a.asset_name,a.state_id,a.state,a.access,a.language, a.ordering as ordering');

		// From the states table
		$query->from('#__th_assets'.' AS a');

		// Join over the state
		$query->select('s.state_name AS state_name,s.country_id');
		$query->join('LEFT', $db->quoteName('#__th_states').' AS s ON s.id = a.state_id');  

		// Join over the country
		$query->select('c.country AS country_name');
		$query->join('LEFT', $db->quoteName('#__th_countries').' AS c ON c.id = s.country_id');  

       	// Join over the language
		$query->select('l.title AS language_title');
		$query->join('LEFT', $db->quoteName('#__languages').' AS l ON l.lang_code = a.language');  

		// Join over the asset groups.
		$query->select('ag.title AS access_level');
		$query->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

		// Filter by access level.
		if ($access = $this->getState('filter.access'))
		{
			$query->where('a.access = '.(int) $access);
		}
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'ordering');
		$orderDirn	= $this->state->get('list.direction', 'ASC');
             

		if ($orderCol == 'ordering')
		{
			$orderCol='asset_name '.$orderDirn.', a.ordering';
			
			
		}
		
		$query->order($db->escape($orderCol.' '.$orderDirn));
		
		return $query;
	}*/


	/**
	 * Method to select the maximum order
	 * @since	3.0
	 */
/* LJAH 2013-09-11
	protected function prepareTable($table)
	{*/
		//$date = JFactory::getDate();
		//$user = JFactory::getUser();
/* LJAH 2013-09-11
		if (empty($table->id))
		{ */
			// Set the values
			//$table->created	= $date->toSql();

			// Set ordering to the last item if not set
			/* LJAH 2013-09-11
			if (empty($table->ordering))
			{
				$db = JFactory::getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM #__th_rooms');
				$max = $db->loadResult();

				$table->ordering = $max + 1;
			}
		}*/
		//else
		//{
			// Set the values
			//$table->modified	= $date->toSql();
			//$table->modified_by	= $user->get('id');
		//}
		// Increment the content version number.
		//$table->version++;
	/*} LJAH 2013-09-11*/

}

