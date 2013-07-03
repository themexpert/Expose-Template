<?php
/**
 *
 * @package     Template Override-ThemeXpert
 * @subpackage  com_content
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/

/**
 *
 * This HTML5 Override taken from OneWeb Template for Joomla 2.5
 *
 * @author      : Seth Warburton - Internet Inspired! - @nternetinspired
 * @version     : 2.0
 * @license     : GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 			      DBAD License http://philsturgeon.co.uk/code/dbad-license
 * @copyright   : Seth Warburton - (C) 2012 - All rights reserved
 *
 **/

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$params = &$this->item->params;
$images = json_decode($this->item->images);
$canEdit	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

?>

<?php if ($this->item->state == 0) : ?>
<section class="system-unpublished">
<?php endif; ?>
<?php if ($params->get('show_title')) : ?>
<header>
	<h2 class="title">
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
			<?php echo $this->escape($this->item->title); ?></a>
		<?php else : ?>
			<?php echo $this->escape($this->item->title); ?>
		<?php endif; ?>
	</h2>
</header>
<?php endif; ?>
<?php if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
	<ul class="actions">
		<?php if ($params->get('show_print_icon')) : ?>
		<li class="print-icon">
			<?php echo JHtml::_('icon.print_popup', $this->item, $params); ?>
		</li>
		<?php endif; ?>
		<?php if ($params->get('show_email_icon')) : ?>
		<li class="email-icon">
			<?php echo JHtml::_('icon.email', $this->item, $params); ?>
		</li>
		<?php endif; ?>
		<?php if ($canEdit) : ?>
		<li class="edit-icon">
			<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
		</li>
		<?php endif; ?>
	</ul>
<?php endif; ?>

<?php // to do not that elegant would be nice to group the params ?>

    <?php if (($params->get('show_author')) or
              ($params->get('show_category')) or
              ($params->get('show_create_date')) or
              ($params->get('show_modify_date')) or
              ($params->get('show_publish_date')) or
              ($params->get('show_parent_category')) or
              ($params->get('show_hits'))) : ?>

    <aside class="article-tools clearfix">
        <div class="article-info muted">
            <dl class="article-info">

                <?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
                    <dd class="createdby">
                    <?php $author = $this->item->author; ?>
                    <?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author); ?>
                    <?php if (!empty($this->item->contactid ) && $params->get('link_author') == true) : ?>
                    <?php
                    echo JText::sprintf(
                            'COM_CONTENT_WRITTEN_BY',
                            JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)
                    ); ?>
                    <?php else :?>
                    <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
                    <?php endif; ?>
                    </dd>
                <?php endif; ?>

                <?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
                    <dd>
                        <div class="parent-category-name">
                            <?php	$title = $this->escape($this->item->parent_title);
                            $url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
                            <?php if ($params->get('link_parent_category') and !empty($this->item->parent_slug)) : ?>
                                <?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
                            <?php else : ?>
                                <?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
                            <?php endif; ?>
                        </div>
                    </dd>
                <?php endif; ?>
                <?php if ($params->get('show_category')) : ?>
                    <dd>
                        <div class="category-name">
                           <?php $title = $this->escape($this->item->category_title);
                                    $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catid)) . '">' . $title . '</a>'; ?>
                            <?php if ($params->get('link_category')) : ?>
                                <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
                                <?php else : ?>
                                <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
                            <?php endif; ?>
                        </div>
                    </dd>
                <?php endif; ?>

                <?php if ($params->get('show_create_date')) : ?>
                    <dd>
                        <div class="create">
                            <i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2'))); ?>
                        </div>
                    </dd>
                <?php endif; ?>

                <?php if ($params->get('show_modify_date')) : ?>
                    <dd>
                        <div class="modified">
                            <i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
                        </div>
                    </dd>
                <?php endif; ?>

                <?php if ($params->get('show_publish_date')) : ?>
                    <dd>
                        <div class="published">
                            <i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
                        </div>
                    </dd>
                <?php endif; ?>                

                <?php if ($params->get('show_hits')) : ?>
                    <dd>
                        <div class="hits">
                              <i class="icon-eye-open"></i> <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
                        </div>
                    </dd>
                <?php endif; ?>

            </dl>
        </div>

    </aside>

<?php endif; ?>

    <?php if (!$params->get('show_intro')) : ?>
        <?php echo $this->item->event->afterDisplayTitle; ?>
    <?php endif; ?>

    <?php echo $this->item->event->beforeDisplayContent; ?>

    <section class="article-intro">
    <?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
        <?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
        <figure class="img-intro pull-<?php echo htmlspecialchars($imgfloat); ?>">
        <img
            <?php if ($images->image_intro_caption):
                echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
            endif; ?>
            src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
        </figure>
    <?php endif; ?>
    <?php echo $this->item->introtext; ?>
    </section>

<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = new JURI($link1);
		$link->setVar('return', base64_encode($returnURL));
	endif;
?>
	<a class="btn btn-primary" href="<?php echo $link; ?>"> <i class="icon-arrow-right"></i>
	<?php if (!$params->get('access-view')) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
				echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?>
	</a>
<?php endif; ?>

<?php if ($this->item->state == 0) : ?>
</section>
<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>