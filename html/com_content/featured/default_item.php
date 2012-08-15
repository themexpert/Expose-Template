<?php
/**
 * @package     Template Override - ThemeXpert
 * @subpackage  com_content
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 **/

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$params = &$this->item->params;
$canEdit	= $this->item->params->get('access-edit');
?>

<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>
<div class="article"><div class="article-bg">
	<?php /** Begin Article Title **/ if ($params->get('show_title')) : ?>
	<h2 class="title">
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
			<?php echo $this->escape($this->item->title); ?></a>
		<?php else : ?>
			<?php echo $this->escape($this->item->title); ?>
		<?php endif; ?>
	</h2>
	<?php /** End Article Title **/ endif; ?>

	<?php /** Begin Article Icons **/ if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
	<div class="article-icons">
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
	</div>
	<?php /** End Article Icons **/ endif; ?>

	<?php if (!$params->get('show_intro')) : ?>
		<?php echo $this->item->event->afterDisplayTitle; ?>
	<?php endif; ?>

	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php // to do not that elegant would be nice to group the params ?>

	<?php /** Begin Article Info **/ if (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date')) or ($params->get('show_parent_category')) or ($params->get('show_hits'))) : ?>
	 <dl class="articleinfo">
	 <!--<dt class="article-info-term"><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>-->
	<?php endif; ?>
	<?php if ($params->get('show_parent_category')) : ?>
	<dd class="parent-category">
		<?php $title = $this->escape($this->item->parent_title);
			$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)) . '">' . $title . '</a>'; ?>
		<?php if ($params->get('link_parent_category') AND $this->item->parent_slug) : ?>
			<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
			<?php else : ?>
			<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
		<?php endif; ?>
	</dd>
	<?php endif; ?>
	<?php if ($params->get('show_category')) : ?>
	<dd class="category">
		<?php $title = $this->escape($this->item->category_title);
			$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
		<?php if ($params->get('link_category') AND $this->item->catslug) : ?>
			<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
			<?php else : ?>
			<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
		<?php endif; ?>
	</dd>
	<?php endif; ?>
	<?php if ($params->get('show_create_date')) : ?>
	<dd class="date-posted">
		<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHTML::_('date',$this->item->created, JText::_('DATE_FORMAT_LC2'))); ?>
	</dd>
	<?php endif; ?>
	<?php if ($params->get('show_modify_date')) : ?>
	<dd class="date-modified">
		<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHTML::_('date',$this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</dd>
	<?php endif; ?>
	<?php if ($params->get('show_publish_date')) : ?>
	<dd class="date-published">
		<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHTML::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
	</dd>
	<?php endif; ?>
	<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<dd class="author">
		<?php $author =  $this->item->author; ?>
		<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>

		<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true):?>
			<?php 	echo JText::sprintf('COM_CONTENT_WRITTEN_BY' , 
			 JHTML::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid),$author)); ?>

		<?php else :?>
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		<?php endif; ?>
	</dd>
	<?php endif; ?>	
	<?php if ($params->get('show_hits')) : ?>
	<dd class="hits">
		<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
	</dd>
	<?php endif; ?>
	<?php if (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date')) or ($params->get('show_parent_category')) or ($params->get('show_hits'))) : ?>
	 </dl>
	<?php /** End Article Info **/ endif; ?>

	<?php echo $this->item->introtext; ?>

	<?php if ($params->get('show_readmore') && $this->item->readmore) :
		if ($params->get('access-view')) :
			$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		else :
			$menu = JFactory::getApplication()->getMenu();
			$active = $menu->getActive();
			$itemId = $active->id;
			$link1 = JRoute::_('index.php?option=com_users&view=login&&Itemid=' . $itemId);
			$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
			$link = new JURI($link1);
			$link->setVar('return', base64_encode($returnURL));
		endif;
	?>
		<p class="readon-surround">
			<a href="<?php echo $link; ?>" class="readon btn btn-info"><span><i class="icon-info-sign icon-white"></i>
				<?php if (!$params->get('access-view')) :
					echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
				elseif ($readmore = $this->item->alternative_readmore) :
					echo $readmore;
					echo JHTML::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
				elseif ($params->get('show_readmore_title', 0) == 0) :
					echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');	
				else :
					echo JText::_('COM_CONTENT_READ_MORE');
					echo JHTML::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
				endif; ?>
			</span></a>
		</p>
	<?php endif; ?>
</div></div>
<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>

<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent; ?>
