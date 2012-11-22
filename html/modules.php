<?php
/**
 * @package     Bootstrap Theme Framework
 * @subpackage  Module Chrome
 * @version     1.0.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2012 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 * */


/*
 * @modified	Jonathan Shroyer of 'corePHP', LLC
 * @url			http://www.corephp.com
 * @comment		Restructured output for less divs and renamed classes
 **/

function modChrome_standard( $module, $params, $attribs )
{

	// Determines H tag level (ie. h1, h2, h3)
	$headerLevel = isset( $attribs['headerLevel'] ) ? $attribs['headerLevel'] : 2;

	// Badge?
	$badge = preg_match( '/badge/', $params->get( 'moduleclass_sfx' ) ) ? '<span class="badge"></span>' : '';

	// Add module class suffix and unique class name
	$moduleClassSfx = '';
    $moduleUniqueClass = ' mod-'. $module->id ;

	if ( $params->get( 'moduleclass_sfx' ) != NULL )
    {
        $moduleClassSfx =  ' '.$params->get( 'moduleclass_sfx' );
    }

	// Determine if title is on or off and add class
	$showTitle = '';
	$hide = '';
	if ( $module->showtitle == 0 ) :
		$showTitle = ' no-title';
	endif;

    // Output module

    echo '<div class="block module' . $moduleClassSfx . $moduleUniqueClass . $showTitle . ' clearfix">' . "\n";
	    	echo "\t\t" . '<div class="header">' . "\n";
	        	echo $badge;

                //separate subtitle
                if( strpos( $module->title, '||' ) === FALSE)
                {
                    $title = $module->title;

                }else{
                    $titles 	= explode('||', $module->title);
                    $title 		= $titles[0];
                    $subTitle 	= $titles[1];
                }


                // Creates span around first word of module title for unique styling
                $parts = explode(' ', $title);
                $parts[0] = '<span>' . $parts[0] . '</span>';
                $title = implode(' ', $parts);

                echo "\t\t\t\t" . '<h2 class="title">' . $title .'</h2>' . "\n";

                if( !empty($subTitle) )
                {
                    echo "\t\t\t\t\t" . '<h3 class="subtitle">' . $subTitle .'</h3>' . "\n";
                }

	    	echo "\t\t\t" . '</div>' . "\n";
	        if ( !empty ( $module->content ) ) :
	        echo "\t\t\t" . '<div class="content">' . "\n";
	        	echo "\t\t\t\t" . $module->content . "\n";
	        	echo "\t\t\t\t" . '' . "\n";
	        echo "\t\t\t" . '</div>' . "\n";
	        endif;
    echo "\t" . '</div>';

}


function modChrome_basic($module, $params, $attribs)
{
    if (!empty ($module->content)){
        echo $module->content;
    }
}

function modChrome_tabs($module, &$params, &$attribs)
{
    global $counta;

    if ( $counta == '' ) { $counta = 0;}
    $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    // Badge?
    $badge = preg_match( '/badge/', $params->get( 'moduleclass_sfx' ) ) ? '<span class="badge"></span>' : '';
    if (!empty ($module->content)) : ?>

    <div class="mod-tab <?php echo $params->get('moduleclass_sfx'); ?>">
        <h<?php echo $headerLevel; ?> class="tab1-<?php echo $counta; ?>">
            <?php echo $module->title; ?>
            <?php echo $badge; ?>
        </h<?php echo $headerLevel;?>>
        <div class="tab-pane">
            <?php echo $module->content; ?>
        </div>
    </div>

    <?php
        $counta++;
    endif;
}

$countc = 0;

function modChrome_accordion($module, &$params, &$attribs)
{
  global $countc;
  if ( $countc == '' ) { $countc = 0;}
  $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
  $positionName = isset($attribs['positionName']) ? $attribs['positionName'] : $module->id;

  if (!empty ($module->content)) : ?>

    <div class="accordion-group accordion-<?php echo $countc; ?> <?php echo $params->get('moduleclass_sfx'); ?>">

        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#acc-<?php echo $positionName; ?>" href="#collapse-<?php echo $countc; ?>"><?php echo $module->title; ?></a>
        </div>

        <div id="collapse-<?php echo $countc; ?>" class="accordion-body collapse <?php if ( $countc == 0 ) { echo 'in'; } ?>">

            <div class="accordion-inner">
                <?php echo $module->content; ?>
            </div>

        </div>
    </div><!--end_module //-->

  <?php
  $countc++;
  endif;
}