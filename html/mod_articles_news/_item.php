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
<?php if ($params->get('item_title')) : ?>

	<<?php echo $params->get('item_heading'); ?> class="newsflash-title <?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if ($params->get('link_titles') && $item->link != '') : ?>
		<a href="<?php echo $item->link;?>">
			<?php echo $item->title;?></a>
	<?php else : ?>
		<?php echo $item->title; ?>
	<?php endif; ?>
	</<?php echo $params->get('item_heading'); ?>>

<?php endif; ?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<?php echo $item->introtext; ?>

<?php if (isset($item->link) && $item->readmore && $params->get('readmore')) :
	echo '<a class="readon btn btn-info" href="'.$item->link.'"><span><i class="icon-info-sign icon-white"></i>'.$item->linkText.'</span></a>';
endif; ?>
