<?php
/**
 * @version		$Id: states.php 2013-09-01
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * States Controller
 */
class ThorHospedajeControllerPosaderos extends JControllerLegacy
{
	
	/**
	 *  Method to return data of states.
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function pagoAjax()
	{
		$app = JFactory::getApplication();
		JPluginHelper::importPlugin('thorhospedaje');
		$dispatcher = JEventDispatcher::getInstance (); 
		$results = $dispatcher->trigger( 'onTHShowPay', array(NULL, NULL));
		echo $results[0];
		JFactory::getApplication()->close();
	}
}
