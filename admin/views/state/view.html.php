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
 * State View
 */
class ThorHospedajeViewState extends JViewLegacy
{
	
	protected $items;

	protected $pagination;

	/**
	 * State view display method
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
		JToolBarHelper::title($isNew ? JText::_('TH_MANAGER_STATE_NEW') : JText::_('TH_MANAGER_STATE_EDIT'));
		JToolBarHelper::apply('state.apply');
		JToolBarHelper::save('state.save');
		JToolBarHelper::save2new('state.save2new');
		JToolBarHelper::preferences('com_thorhospedaje');
		JToolBarHelper::cancel('state.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
