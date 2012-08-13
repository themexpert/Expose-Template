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
	    	echo "\t\t" . '<div class="ex-header">' . "\n";
	        	echo $badge;

                //separate subtitle
                $titles 	= explode('||', $module->title);
                $title 		= $titles[0];
                $subTitle 	= $titles[1];

                // Creates span around first word of module title for unique styling
                $parts = explode(' ', $title);
                $parts[0] = '<span>' . $parts[0] . '</span>';
                $title = implode(' ', $parts);

                echo "\t\t\t\t" . '<h2 class="ex-title">' . $title .'</h2>' . "\n";

                if( !empty($subTitle) )
                {
                    echo "\t\t\t\t\t" . '<h3 class="ex-subtitle">' . $subTitle .'</h3>' . "\n";
                }

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