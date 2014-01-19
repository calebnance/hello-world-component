<?php
/*------------------------------------------------------------------------
# default.php - Hello World Component
# ------------------------------------------------------------------------
# author    Caleb Nance
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Connect to database
$db = JFactory::getDBO();
jimport('joomla.filter.output');
?>
<div id="helloworlds-helloworlds">
	<?php foreach($this->items as $item): ?>
		<?php
		$item->category = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$item->category.'"')->loadResult();
		if(empty($item->alias)):
			$item->alias = $item->title;
		endif;
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_helloworlds&view=helloworld&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Title</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->title; ?></a></p>
		<p><strong>Category</strong>: <?php echo $item->category; ?></p>
		<p><strong>Description</strong>: <?php echo $item->description; ?></p>
		<p><strong>Published</strong>: <?php echo $item->published; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php endforeach; ?>
</div>
