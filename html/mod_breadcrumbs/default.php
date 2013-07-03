<?php
/**
 *
 * @package     Template Override-ThemeXpert
 * @subpackage  mod_breadcrumbs
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 * 
 **/

// no direct access
defined('_JEXEC') or die;
$separator = '<span class="divider">/</span>';
?>

<ul class="breadcrumb">
<?php if ($params->get('showHere', 1))
	{
		echo JText::_('MOD_BREADCRUMBS_HERE');
	}
?>
<?php for ($i = 0; $i < $count; $i ++) :

	echo "<li>";
	// If not the last item in the breadcrumbs add the separator
	if ($i < $count -1) {
		if (!empty($list[$i]->link)) {
			echo '<a href="'.$list[$i]->link.'" class="pathway">'.$list[$i]->name.'</a>';
		} else {
		    echo '<span>';
			echo $list[$i]->name;
			  echo '</span>';
		}
		if($i < $count -2){
			echo ' '.$separator.' ';
		}
	}  else if ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
		if($i > 0){
			echo ' '.$separator.' ';
		}
		 echo '<span>';
		echo $list[$i]->name;
		  echo '</span>';
	}
    echo "</li>";
endfor; ?>
</ul>
