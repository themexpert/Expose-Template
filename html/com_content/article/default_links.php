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

// Create shortcut
$urls = json_decode($this->item->urls);

// Create shortcuts to some parameters.
$params = $this->item->params;
if ($urls && (!empty($urls->urla) || !empty($urls->urlb) || !empty($urls->urlc))) :
?>
<section class="content-links">
	<ul>
		<?php
		if ($urls) :
			$urlarray = array(
			array($urls->urla, $urls->urlatext, $urls->targeta, 'a'),
			array($urls->urlb, $urls->urlbtext, $urls->targetb, 'b'),
			array($urls->urlc, $urls->urlctext, $urls->targetc, 'c')
			);
			foreach($urlarray as $url) :
				$link = $url[0];
				$label = $url[1];
				$target = $url[2];
				$id = $url[3];

				if( ! $link) :
					continue;
				endif;

				// If no label is present, take the link
				$label = ($label) ? $label : $link;

				// If no target is present, use the default
				$target = $target ? $target : $params->get('target'.$id);
				?>
			<li class="content-links-<?php echo $id; ?>">
				<?php
					// Compute the correct link

					switch ($target)
					{
						case 1:
							// open in a new window
							echo '<a href="'. htmlspecialchars($link) .'" target="_blank"  rel="nofollow">'.
								htmlspecialchars($label) .'</a>';
							break;

						case 2:
							// open in a popup window
							$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600';
							echo "<a href=\"" . htmlspecialchars($link) . "\" onclick=\"window.open(this.href, 'targetWindow', '".$attribs."'); return false;\">".
								htmlspecialchars($label).'</a>';
							break;
						case 3:
							// open in a modal window
							JHtml::_('behavior.modal', 'a.modal'); ?>
							<a class="modal" href="<?php echo htmlspecialchars($link); ?>"  rel="{handler: 'iframe', size: {x:600, y:600}}">
								<?php echo htmlspecialchars($label) . ' </a>';
							break;

						default:
							// open in parent window
							echo '<a href="'.  htmlspecialchars($link) . '" rel="nofollow">'.
								htmlspecialchars($label) . ' </a>';
							break;
					}
				?>
				</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</section>
<?php endif; ?>