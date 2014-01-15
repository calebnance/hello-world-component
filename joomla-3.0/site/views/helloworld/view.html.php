<?php
/*------------------------------------------------------------------------
# view.html.php - Hello World Component
# ------------------------------------------------------------------------
# author	Caleb Nance
# copyright	Copyright (C) 2013. All Rights Reserved
# license	GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website	www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML Helloworld View class for the Helloworlds Component
 */
class HelloworldsViewHelloworld extends JViewLegacy
{
	// Overwriting JViewLegacy display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->item = $this->get('Item');
		$db = JFactory::getDBO();
		$this->item->category = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$this->item->category.'"')->loadResult();

		// Check for errors.
		if (count($errors = $this->get('Errors'))):
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		endif;

		// Display the view
		parent::display($tpl);
	}
}
?>