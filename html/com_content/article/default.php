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

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers');

// Create shortcuts to some parameters.
$params		= $this->item->params;
$canEdit	= $this->item->params->get('access-edit');

?>
<div class="ex-article"><div class="ex-article-bg clearfix">
	<div class="item-page<?php echo $this->pageclass_sfx?>">
		<?php /** Begin Page Title **/ if ($this->params->get('show_page_heading', 1)) : ?>
		<h1 class="ex-title">
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php /** End Page Title **/  endif; ?>
		<?php /** Begin Article Title **/ if ($params->get('show_title')|| $params->get('access-edit')) : ?>
		<h2 class="ex-title">
			<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
			<a href="<?php echo $this->item->readmore_link; ?>">
				<?php echo $this->escape($this->item->title); ?></a>
			<?php else : ?>
				<?php echo $this->escape($this->item->title); ?>
			<?php endif; ?>
		</h2>
		<?php /** End Article Title **/ endif; ?>

		<?php /** Begin Article Icons **/ if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<div class="ex-article-icons">
				<ul class="actions">
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
			</div>
		<?php /** End Article Icons **/ endif; ?>

		<?php  if (!$params->get('show_intro')) :
			echo $this->item->event->afterDisplayTitle;
		endif; ?>

		<?php echo $this->item->event->beforeDisplayContent; ?>

		<?php $useDefList = (($params->get('show_author')) OR ($params->get('show_category')) OR ($params->get('show_parent_category'))
			OR ($params->get('show_create_date')) OR ($params->get('show_modify_date')) OR ($params->get('show_publish_date'))
			OR ($params->get('show_hits'))); ?>

		<?php /** Begin Article Info **/ if ($useDefList) : ?>
		 <dl class="ex-articleinfo">
		 <!--<dt class="ex-articleinfo-desc"><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>-->
		<?php endif; ?>
		<?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
		<dd class="ex-parent-category">
			<?php	$title = $this->escape($this->item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_parent_category') AND $this->item->parent_slug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
			<?php endif; ?>
		</dd>
		<?php endif; ?>
		<?php if ($params->get('show_category')) : ?>
		<dd class="ex-category">
			<?php 	$title = $this->escape($this->item->category_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_category') AND $this->item->catslug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
			<?php endif; ?>
		</dd>
		<?php endif; ?>
		<?php if ($params->get('show_create_date')) : ?>
		<dd class="ex-date-posted">
			<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHTML::_('date',$this->item->created, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
		<?php endif; ?>
		<?php if ($params->get('show_modify_date')) : ?>
		<dd class="ex-date-modified">
			<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHTML::_('date',$this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
		<?php endif; ?>
		<?php if ($params->get('show_publish_date')) : ?>
		<dd class="ex-date-published">
			<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHTML::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
		<?php endif; ?>
		<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
		<dd class="ex-author">
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
		<dd class="ex-hits">
			<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
		</dd>
		<?php endif; ?>
		<?php if ($useDefList) : ?>
		 </dl>
		<?php /** End Article Info **/ endif; ?>

		<?php if (isset ($this->item->toc)) : ?>
			<?php echo $this->item->toc; ?>
		<?php endif; ?>

		<?php echo $this->item->text; ?>

		<?php echo $this->item->event->afterDisplayContent; ?>
	</div>
</div></div>