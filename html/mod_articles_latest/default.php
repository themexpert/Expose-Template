<?php
/**
 *
 * @package     Template Override-ThemeXpert
 * @subpackage  mod_articles_latest
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/

// no direct access
defined('_JEXEC') or die;
?>
<ul class="latestnews">
<?php foreach ($list as $item) :  ?>
	<li>
		<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
	</li>
<?php endforeach; ?>
</ul>