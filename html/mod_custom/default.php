<?php
/**
 *
 * @package     Template Override-ThemeXpert
 * @subpackage  mod_custom
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/

// no direct access
defined('_JEXEC') or die;
?>
<div class="custom" <?php if ($params->get('backgroundimage')): ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?>>
	<?php echo $module->content;?>
</div>