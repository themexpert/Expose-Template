<?php
/**
 *
 * @package     Template Override-ThemeXpert
 * @subpackage  mod_articles_news
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/

// no direct access
defined('_JEXEC') or die;
?>
<div class="newsflash">
<?php foreach ($list as $item) :?>
	<?php
	 require JModuleHelper::getLayoutPath('mod_articles_news', '_item');?>
<?php endforeach; ?>
</div>
