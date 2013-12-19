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
		$plan_B = array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4);
		// Plan USA y Resto del Mundo
		$plan_U_R = array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4);
		$plan_V = array(0 => 0, 1 => 200, 2 => 1200, 3 => 2400, 4 => 4800);
		$app = JFactory::getApplication();
		/* $id_country
		 * Brasil = 1
		 * USA = 2
		 * Venezuela = 3
		 * Resto del Mundo = 0
		 * */
		$id_country	= $this->input->getInt('id_country');
		$id_plan	= $this->input->getInt('id_plan');
		switch ($id_country) 
		{
			case 0: // Resto del Mundo
			case 2: // USA
				$plan = $plan_U_R;
				break;
			case 1: // Brasil
				$plan = $plan_B;
				break;
			case 2: // Venezuela
				$plan = $plan_V;
				break;
		}
		
		JPluginHelper::importPlugin('thorhospedaje');
		$dispatcher = JEventDispatcher::getInstance (); 
		$params = array('monto' => $plan[$id_plan], 'pais' => $id_country);
		$results = $dispatcher->trigger( 'onTHShowPay', array(NULL, $params));
		echo $results[0];
		JFactory::getApplication()->close();
	}
}
