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

    echo '<div class="ex-block ex-module' . $moduleClassSfx . $moduleUniqueClass . $showTitle . ' column-spacing clearfix">' . "\n";
	    	echo "\t\t" . '<div class="ex-header">' . "\n";
	        	echo $badge;

                // Creates span around first word of module title for unique styling
                $part_one = explode(' ', $module->title);
                $part_one = $part_one[0];

                if( count( explode( ' ', $module->title ) ) > 1 ) {
                    $part_two = substr( $module->title, strpos( $module->title,' ' ) );
                } else {
                    $part_two = '';
                }

                echo "\t\t\t\t" . '<h' . $headerLevel . ' class="ex-title"><span>'.$part_one.'</span>'.$part_two.'</h' . $headerLevel . '>' . "\n";

	    	echo "\t\t\t" . '</div>' . "\n";
	        if ( !empty ( $module->content ) ) :
	        echo "\t\t\t" . '<div class="ex-content">' . "\n";
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