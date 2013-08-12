<?php
/**
 * @version		$Id: countries.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */
defined('_JEXEC') or die;

/**
 * Countries component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_thorhospedaje
 * @since       1.6
 */
class CountriesHelper
{
	public static function getCountriesOptions()
	{
		$options = array();

		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select('id as value, country as text');
		$query->from('#__th_countries AS a');
		$query->order('a.country');
		
		
		// Get the options.
		$db->setQuery($query);

		try
		{
			$options = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}

		// Merge any additional options in the XML definition.
		//$options = array_merge(parent::getOptions(), $options);

		array_unshift($options, JHtml::_('select.option','onchange="alert("hola");"','onchange="alert("hola");"','onchange="alert("hola");"','onchange="alert("hola");"','onchange="alert("hola");"'));

		return $options;
	}
}
