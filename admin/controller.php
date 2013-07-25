<?php
/**
 * @version		$Id: controller.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of ThorHospedaje component
 */
class ThorHospedajeController extends JControllerLegacy
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false, $urlparams = false) 
	{
		// set default view if not set
		//JRequest::setVar('view', JRequest::getCmd('view', 'HolaMundos'));
		$view   = $this->input->get('view', 'Countries');
		
		// call parent behavior
		parent::display($cachable);
	}
}
