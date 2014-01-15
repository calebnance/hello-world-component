<?php
/*------------------------------------------------------------------------
# default.php - Hello World Component
# ------------------------------------------------------------------------
# author	Caleb Nance
# copyright	Copyright (C) 2013. All Rights Reserved
# license	GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website	www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Connect to database
$db = JFactory::getDBO();
?>
<div id="helloworlds-helloworlds">
	<?php foreach($this->items as $item): ?>
		<?php $item->category = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$item->category.'"')->loadResult(); ?>
		<p><strong>Title</strong>: <?php echo $item->title; ?></p>
		<p><strong>Category</strong>: <?php echo $item->category; ?></p>
		<p><strong>Description</strong>: <?php echo $item->description; ?></p>
		<p><strong>Published</strong>: <?php echo $item->published; ?></p>
		<br /><br />
	<?php endforeach; ?>
</div>
