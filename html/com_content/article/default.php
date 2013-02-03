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
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params		= $this->item->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
$canEdit	= $this->item->params->get('access-edit');
$user		= JFactory::getUser();
?>

<?php if ($this->params->get('show_page_heading', 1)) : ?>
<header class="page-header">
	<h1 class="page-title">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
</header>
<?php endif; ?>
<article class="article fulltext <?php echo $this->pageclass_sfx?>">
<?php
if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
 echo $this->item->pagination;
}
 ?>
<?php if ($params->get('show_title')) : ?>
<header>
	<h1 class="title">
	<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
		<a href="<?php echo $this->item->readmore_link; ?>">
		<?php echo $this->escape($this->item->title); ?></a>
	<?php else : ?>
		<?php echo $this->escape($this->item->title); ?>
	<?php endif; ?>
	</h1>
</header>
<?php endif; ?>
<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
	<section class="actions">
    <ul>
	<?php if (!$this->print) : ?>
		<?php if ($params->get('show_print_icon')) : ?>
			<li class="print-icon">
			<?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?>
			</li>
		<?php endif; ?>

		<?php if ($params->get('show_email_icon')) : ?>
			<li class="email-icon">
			<?php echo JHtml::_('icon.email',  $this->item, $params); ?>
			</li>
		<?php endif; ?>

		<?php if ($canEdit) : ?>
			<li class="edit-icon">
			<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
			</li>
		<?php endif; ?>

	<?php else : ?>
		<li>
		<?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?>
		</li>
	<?php endif; ?>

	</ul>
    </section>
<?php endif; ?>

<?php $useDefList = (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_parent_category'))
	or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))
	or ($params->get('show_hits'))); ?>

<?php if ($useDefList) : ?>
<aside class="article-tools clearfix">
	<dl class="article-info muted">

        <?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
        	<dd class="createdby">
        	<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
        	<?php if (!empty($this->item->contactid) && $params->get('link_author') == true): ?>
        	<?php
        		$needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
        		$item = JSite::getMenu()->getItems('link', $needle, true);
        		$cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
        	?>
        		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
        	<?php else: ?>
        		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
        	<?php endif; ?>
        	</dd>
        <?php endif; ?>

        <?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
            <dd>
                <div class="parent-category-name">
                    <?php	$title = $this->escape($this->item->parent_title);
                    $url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
                    <?php if ($params->get('link_parent_category') AND $this->item->parent_slug) : ?>
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
                    <?php 	$title = $this->escape($this->item->category_title);
                    $url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
                    <?php if ($params->get('link_category') AND $this->item->catslug) : ?>
                        <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
                    <?php else : ?>
                        <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
                    <?php endif; ?>
                </div>
            </dd>
        <?php endif; ?>

        <?php if ($params->get('show_publish_date')) : ?>
            <dd>
                <div class="published">
                    <i class="icon-calendar"></i><?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHtml::_('date',$this->item->publish_up)); ?>
                </div>
            </dd>
        <?php endif; ?>

        <?php if ($params->get('show_create_date')) : ?>
            <dd>
                <div class="create">
                    <i class="icon-calendar"></i><?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date',$this->item->created)); ?>
                </div>
            </dd>
        <?php endif; ?>

        <?php if ($params->get('show_modify_date')) : ?>
            <dd>
                <div class="modified">
                    <i class="icon-calendar"></i><?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date',$this->item->modified)); ?>
                </div>
            </dd>
        <?php endif; ?>

        <?php if ($params->get('show_hits')) : ?>
            <dd>
                <div class="hits">
                    <i class="icon-eye-open"></i><?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
                </div>
            </dd>
        <?php endif; ?>
	</dl>
</aside>
<?php endif; ?>

<?php  if (!$params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>
<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if (isset ($this->item->toc)) : ?>
	<?php echo $this->item->toc; ?>
<?php endif; ?>

<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position=='0')) OR  ($params->get('urls_position')=='0' AND empty($urls->urls_position) ))
		OR (empty($urls->urls_position) AND (!$params->get('urls_position')))): ?>
<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>

<?php if ($params->get('access-view')):?>
<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
<figure class="img-fulltext pull-<?php echo htmlspecialchars($imgfloat); ?>">
<img <?php if ($images->image_fulltext_caption): echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"'; endif; ?>
	src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
</figure>
<?php endif; ?>
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
    echo $this->item->pagination;
 endif;
?>
<section class="article-body">
<?php echo $this->item->text; ?>
</section>

<?php if( (!empty($this->item->pagination) AND $this->item->pagination)
    OR isset($urls) AND ((!empty($urls->urls_position)  AND ($urls->urls_position=='1') )) ) :?>
<footer class="article-footer">
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND!$this->item->paginationrelative):
	 echo $this->item->pagination;?>

<?php endif; ?>
<?php if (isset($urls) AND ((!empty($urls->urls_position)  AND ($urls->urls_position=='1')) OR ( $params->get('urls_position')=='1') )): ?>
<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>
	<?php //optional teaser intro text for guests ?>
<?php elseif ($params->get('show_noauth') == true and  $user->get('guest') ) : ?>
<section class="readmore">
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>
		<p class="readmore">
		<a class="btn btn-primary" href="<?php echo $link; ?>"><i class="icon-arrow-right"></i>
		<?php $attribs = json_decode($this->item->attribs);  ?>
		<?php
		if ($attribs->alternative_readmore == null) :
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
		endif; ?></a>
		</p>
	<?php endif; ?>
</section>
<?php endif; ?>
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
	 echo $this->item->pagination;?>
<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>
</footer>
<?php endif; ?>
</article>
