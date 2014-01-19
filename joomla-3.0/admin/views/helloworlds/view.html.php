<?php
/*------------------------------------------------------------------------
# view.html.php - Hello World Component
# ------------------------------------------------------------------------
# author    Caleb Nance
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * helloworlds View
 */
class HelloworldsViewhelloworlds extends JViewLegacy
{
	/**
	 * Helloworlds view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Include helper submenu
		HelloworldsHelper::addSubmenu('helloworlds');

		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))):
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		endif;

		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();
		// Show sidebar
		$this->sidebar = JHtmlSidebar::render();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$canDo = HelloworldsHelper::getActions();
		JToolBarHelper::title(JText::_('Helloworlds Manager'), 'helloworlds');
		if($canDo->get('core.create')):
			JToolBarHelper::addNew('helloworld.add', 'JTOOLBAR_NEW');
		endif;
		if($canDo->get('core.edit')):
			JToolBarHelper::editList('helloworld.edit', 'JTOOLBAR_EDIT');
		endif;
		if($canDo->get('core.delete')):
			JToolBarHelper::deleteList('', 'helloworlds.delete', 'JTOOLBAR_DELETE');
		endif;
		if($canDo->get('core.admin')):
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_helloworlds');
		endif;
	}

	/**
	 * Method to set up the document properties
	 *
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('Helloworlds Manager - Administrator'));
	}
}
?>