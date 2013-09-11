<?php
/**
 * @version		$Id: asset.php 2013-07-29
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */


// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Asset Table class
 */
class ThorHospedajeTableReservation extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
			parent::__construct('#__th_reservations', 'id', $db);
	}        
   
    
	/**
	 * Overloaded bind function to pre-process the params.
	 *
	 * @param   array  Named array
	 * @return  null|string	null is operation was satisfactory, otherwise returns an error
	 * @see     JTable:bind
	 * @since   1.5
	 */
	public function bind($array, $ignore = '')
	{
		if (isset($array['client_data']) && is_array($array['client_data']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['client_data']);
			$array['client_data'] = (string) $registry;
		}
		return parent::bind($array, $ignore);
	}  
    
    /**
	 * Overload the store method for the states table.
	 *
	 * @param   boolean	Toggle whether null values should be updated.
	 * @return  boolean  True on success, false on failure.
	 * @since   1.6
	 */
	public function store($updateNulls = false)
	{
/*		$date	= JFactory::getDate();
		$user	= JFactory::getUser();
		if ($this->id)
		{
			// Existing item
			$this->modified_date	= $date->toSql();
			$this->modified_by	= $user->get('id');
		}
		else
		{ LJAH 2013-09-11*/
			// New states. A country created_date and created_by field can be set by the user,
			// so we don't touch either of these if they are set.
			/*if (!(int) $this->created_date)
			{
				$this->created_date = $date->toSql();
			}
			if (empty($this->created_by))
			{
				$this->created_by = $user->get('id');
			}
		}LJAH 2013-09-11*/

		// Set publish_up to null date if not set
		/*if (!$this->publish_up)
		{
			$this->publish_up = $this->_db->getNullDate();
		}*/

		// Set publish_down to null date if not set
		/*if (!$this->publish_down)
		{
			$this->publish_down = $this->_db->getNullDate();
		}*/

		// Verify that the alias is unique
		/*$table = JTable::getInstance('Weblink', 'WeblinksTable');
		if ($table->load(array('alias' => $this->alias, 'catid' => $this->catid)) && ($table->id != $this->id || $this->id == 0))
		{
			$this->setError(JText::_('COM_WEBLINKS_ERROR_UNIQUE_ALIAS'));
			return false;
		}*/
		// Attempt to store the user data.
		return parent::store($updateNulls);
	}
 

    /**
	 * Method to set the publishing state for a row or list of rows in the database
	 * table.  The method respects checked out rows by other users and will attempt
	 * to checkin rows that it can after adjustments are made.
	 *
	 * @param   mixed	An optional array of primary key values to update.  If not
	 *					set the instance property value is used.
	 * @param   integer The publishing state. eg. [0 = unpublished, 1 = published]
	 * @param   integer The user id of the user performing the operation.
	 * @return  boolean  True on success.
	 * @since   1.0.4
	 */
	public function publish($pks = null, $state = 1, $userId = 0)
	{
		$k = $this->_tbl_key;

		// Sanitize input.
		JArrayHelper::toInteger($pks);
		$userId = (int) $userId;
		$state  = (int) $state;

		// If there are no primary keys set check to see if the instance key is set.
		if (empty($pks))
		{
			if ($this->$k)
			{
				$pks = array($this->$k);
			}
			// Nothing to set publishing state on, return false.
			else {
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}

		// Build the WHERE clause for the primary keys.
		$where = $k.'='.implode(' OR '.$k.'=', $pks);

		// Determine if there is checkin support for the table.
		if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time'))
		{
			$checkin = '';
		}
		else
		{
			$checkin = ' AND (checked_out = 0 OR checked_out = '.(int) $userId.')';
		}

		// Update the publishing state for rows with the given primary keys.
		$this->_db->setQuery(
			'UPDATE '.$this->_db->quoteName($this->_tbl) .
			' SET '.$this->_db->quoteName('state').' = '.(int) $state .
			' WHERE ('.$where.')' .
			$checkin
		);

		try
		{
			$this->_db->execute();
		}
		catch (RuntimeException $e)
		{
			$this->setError($e->getMessage());
			return false;
		}

		// If checkin is supported and all rows were adjusted, check them in.
		if ($checkin && (count($pks) == $this->_db->getAffectedRows()))
		{
			// Checkin the rows.
			foreach ($pks as $pk)
			{
				$this->checkin($pk);
			}
		}

		// If the JTable instance value is in the list of primary keys that were set, set the instance.
		if (in_array($this->$k, $pks))
		{
			$this->state = $state;
		}

		$this->setError('');
		return true;
	}
}

