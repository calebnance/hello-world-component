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

?><div id="helloworlds-content">
	<p><strong>Title</strong>: <?php echo $this->item->title; ?></p>
	<p><strong>Category</strong>: <?php echo $this->item->category; ?></p>
	<p><strong>Description</strong>: <?php echo $this->item->description; ?></p>
	<p><strong>Published</strong>: <?php echo $this->item->published; ?></p>
</div>