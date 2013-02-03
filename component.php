<?php
/**
 *
 * @package     Expose Bootstrap Theme
 * @version     2.2
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

//framework bootstrap
if( file_exists( JPATH_LIBRARIES . '/expose/expose.php' ) ){

    require_once JPATH_LIBRARIES . '/expose/expose.php';

}else{
    echo JText::_('Unable to find Expose library. Please make sure you have it installed.');
    die();
}
?>

<?php if (JRequest::getString('type')=='raw'):?>
	<jdoc:include type="component" />
<?php else: ?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo ($this->direction =='rtl' OR $expose->get('rtl-support'))? 'rtl' : 'ltr'; ?>" class="no-js">
    <head>
        <?php
            $expose->displayHead();
            $expose->addLink(array('template.css','bootstrap.css'),'css');
        ?>
    </head>
    <body <?php echo $expose->generateBodyClass();?> <?php echo ($expose->platform == 'mobile')? 'id="ex-mobile"' : '' ;?>  >
        <!--Start Main Body-->
        <div id="ex-main">
            <div class="ex-container">
                <div id="ex-mainbody">
                    <div id="ex-component">
                        <jdoc:include type="component" />
                    </div>
                </div>

            </div>
        </div>
        <!--End Main Body Modules-->
    </body>
</html>
<?php endif;?>
<?php
$expose->finalizedExpose();
?>