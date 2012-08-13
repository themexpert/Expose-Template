<?php
/**
 * @package     Bootstrap Theme
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

//framework bootstrap
if(file_exists(JPATH_LIBRARIES.DS.'expose'.DS.'expose.php')){
    require_once JPATH_LIBRARIES.DS.'expose'.DS.'expose.php';
}else{
    echo JText::_('Unable to find Expose library. Please make sure you have it installed.');
    die();
}

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $expose->direction ;?>" class="no-js">
    <head>

        <?php
            $expose->displayHead();
            $expose->addLink(array('typography.css','template.css','responsive.css'),'css');
            $expose->addLink( array('template.js') ,'js', 11 )
        ?>
    </head>
    
    <body <?php echo $expose->generateBodyClass();?> >

        <?php /**Begin Roof**/ if($expose->countModules('roof')): ?>
        <!--Start Roof Modules-->
        <div id="roof" class="container">
            <div class="row">
                <?php $expose->renderModules('roof'); ?>
            </div>
        </div>
        <!--End Roof Modules-->
        <?php /**End Roof**/ endif;?>

        <?php /**Begin Top**/ if($expose->countModules('top')): ?>
        <!--Start Top Modules-->
        <div id="top" class="container">
            <div class="row">
                <?php $expose->renderModules('top'); ?>
            </div>
        </div>
        <!--End Top Modules-->
        <?php /**End Top**/ endif;?>

        <?php /**Begin Header**/ if($expose->countModules('header')): ?>
        <!--Start Header Modules-->
        <div id="header" class="container">
            <div class="row">
                <?php $expose->renderModules('header'); ?>
            </div>
        </div>
        <!--End Header Modules-->
        <?php /**End Header**/ endif;?>

        <?php /**Begin Utility**/ if($expose->countModules('utility')): ?>
        <!--Start Utility Modules-->
        <div id="utility" class="container">
            <div class="row">
                <?php $expose->renderModules('utility'); ?>
            </div>
        </div>
        <!--End Utility Modules-->
        <?php /**End Utility**/ endif;?>

        <?php /**Begin Feature**/ if($expose->countModules('feature')): ?>
        <!--Start Feature Modules-->
        <div id="feature" class="container">
            <div class="row">
                <?php $expose->renderModules('feature'); ?>
            </div>

        </div>
        <!--End Feature Modules-->
        <?php /**End Feature**/ endif;?>

        <?php /**Begin Main-Top**/ if($expose->countModules('maintop')): ?>
        <!--Start Main-Top Modules-->
        <div id="main-top" class="container">
            <div class="row">
                <?php $expose->renderModules('maintop'); ?>
            </div>
        </div>
        <!--End Main-Top Modules-->
        <?php /**End Main-Top**/ endif;?>

        <?php /**Begin Breadcrumbs**/ if($expose->countModules('breadcrumbs')): ?>
       <!--Start Breadcrumbs Module-->
       <div id="breadcrumbs" class="container">
            <div class="row">
                <?php $expose->renderModules('breadcrumbs'); ?>
            </div>
       </div>
       <!--End Breadcrumbs Module-->
       <?php /**End Breadcrumbs**/ endif;?>

        <!--Start Main Body-->

        <?php $expose->renderBody();?>

        <!--End Main Body Modules-->

        <?php /**Begin Main-Bottom**/ if($expose->countModules('mainbottom')): ?>
        <!--Start Main-Bottom Modules-->
        <div id="main-bottom" class="container">
            <div class="row">
                <?php $expose->renderModules('mainbottom'); ?>
            </div>
        </div>
        <!--End Main Bottom Modules-->
        <?php /**End Main Bottom**/ endif;?>

        <?php /**Begin Bottom**/ if($expose->countModules('bottom')): ?>
        <!--Start Bottom Modules-->
        <div id="bottom" class="container">
            <div class="row">
                <?php $expose->renderModules('bottom'); ?>
            </div>
        </div>
        <!--End Bottom Modules-->
        <?php /**End Bottom**/ endif;?>

        <?php /**Begin Footer**/ if($expose->countModules('footer')): ?>
        <!--Start Footer Modules-->
        <div id="footer" class="container">
            <?php $expose->renderModules('footer'); ?>
        </div>
        <!--End Footer Modules-->
        <?php /**End Footer**/ endif;?>

        <?php /**Begin Copyright**/ if($expose->countModules('copyright')): ?>
        <div id="copyright" class="container">
            <?php $expose->renderModules('copyright'); ?>
        </div>
        <?php /**End Copyright**/ endif;?>

        <?php /**Begin Absolute**/ if($expose->countModules('absolute')): ?>
        <div id="absolute">
            <?php $expose->renderModules('absolute'); ?>
        </div>
        <?php /**End Absolute**/ endif;?>

    </body>
</html>
<?php
$expose->finalizedExpose();
?>