<?php
/*------------------------------------------------------------------------
# helloworlds0.php - Hello World Component
# ------------------------------------------------------------------------
# author    Caleb Nance
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Helloworlds0 Form Field class for the Helloworlds component
 */
class JFormFieldHelloworlds0 extends JFormFieldList
{
	/**
	 * The helloworlds0 field type.
	 *
	 * @var		string
	 */
	protected $type = 'Helloworlds0';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__helloworlds_helloworld.id as id, #__helloworlds_helloworld.title as title');
		$query->from('#__helloworlds_helloworld');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items):
			foreach($items as $item):
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->title));
			endforeach;
		endif;
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>