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
 * Country View
 */
class ThorHospedajeViewCountry extends JViewLegacy
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
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');  


		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('TH_MANAGER_COUNTRY_NEW') : JText::_('TH_MANAGER_COUNTRY_EDIT'));
		JToolBarHelper::apply('country.apply');
		JToolBarHelper::save('country.save');
		JToolBarHelper::save2new('country.save2new');
		JToolBarHelper::cancel('country.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
