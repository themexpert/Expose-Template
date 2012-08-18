/**
 * @package     Bootstrap Theme
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/


/*-----------------------------------------------
    Define breakpoint for responsive behaviour
-------------------------------------------------*/
jQuery(window).setBreakpoints({
    // use only largest available vs use all available
    distinct: true,

    // array of widths in pixels where breakpoints
    // should be triggered
    breakpoints: [480, 768, 980,1200]
});

jQuery(window).bind('enterBreakpoint480',function() {

    //Removed min-height from all block
    jQuery('.block').each(function(){
       jQuery(this).css('min-height', 0);
    });
    jQuery('#mainbody, #sidebar-a, #sidebar-b').css('min-height', 0);

});


jQuery(window).bind('enterBreakpoint768',function($) {
    calculageHeight(); //re-calculate height
});

jQuery(window).bind('enterBreakpoint980',function() {
    calculageHeight(); //re-calculate height
});

jQuery(window).bind('enterBreakpoint1200',function() {
    calculageHeight(); //re-calculate height
});

/* Calculage height
--------------------------------*/
function calculageHeight()
{
    // Re-calculate horizontal module height
    jQuery('#roof .column').equalHeight('.block');
    jQuery('#header .column').equalHeight('.block');
    jQuery('#top .column').equalHeight('.block');
    jQuery('#utility .column').equalHeight('.block');
    jQuery('#feature .column').equalHeight('.block');
    jQuery('#main-top .column').equalHeight('.block');
    jQuery('#content-top .column').equalHeight('.block');
    jQuery('#content-bottom .column').equalHeight('.block');
    jQuery('#main-bottom .column').equalHeight('.block');
    jQuery('#bottom .column').equalHeight('.block');
    jQuery('#footer .column').equalHeight('.block');
    jQuery('#mainbody, #sidebar-a, #sidebar-b').equalHeight();
}