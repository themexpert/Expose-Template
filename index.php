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

/*
 * If you want to change html id prefix to yours, you should register it,
 * otherwise custom styling function won't work
 * eg: tx-/tx_
 *
 * */

//$expose->setPrefix('tx-');
$prefix = $expose->getPrefix();

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $expose->direction ;?>" class="no-js">
    <head>

        <?php
            $expose->displayHead();
            $expose->addLink(array('bootstrap.css','template.css'),'css');
        ?>
    </head>
    
    <body <?php echo $expose->generateBodyClass();?> <?php /*Do not change the ID, otherwise it will fail to load mobile menu*/ echo ($expose->platform == 'mobile')? 'id="ex-mobile"' : '' ;?> >

        <?php /**Begin Roof**/ if($expose->countModules('roof')): ?>
        <!--Start Roof Modules-->
        <div id="<?php echo $prefix;?>roof" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('roof'); ?>
        </div>
        <!--End Roof Modules-->
        <?php /**End Roof**/ endif;?>

        <?php /**Begin Top**/ if($expose->countModules('top')): ?>
        <!--Start Top Modules-->
        <div id="<?php echo $prefix;?>top" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('top'); ?>
        </div>
        <!--End Top Modules-->
        <?php /**End Top**/ endif;?>

        <?php /**Begin Header**/ if($expose->countModules('header')): ?>
        <!--Start Header Modules-->
        <div id="<?php echo $prefix;?>header" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('header'); ?>
        </div>
        <!--End Header Modules-->
        <?php /**End Header**/ endif;?>

        <?php /**Begin Utility**/ if($expose->countModules('utility')): ?>
        <!--Start Utility Modules-->
        <div id="<?php echo $prefix;?>utility" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('utility'); ?>
        </div>
        <!--End Utility Modules-->
        <?php /**End Utility**/ endif;?>

        <?php /**Begin Feature**/ if($expose->countModules('feature')): ?>
        <!--Start Feature Modules-->
        <div id="<?php echo $prefix;?>feature" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('feature'); ?>

        </div>
        <!--End Feature Modules-->
        <?php /**End Feature**/ endif;?>

        <?php /**Begin Main-Top**/ if($expose->countModules('maintop')): ?>
        <!--Start Main-Top Modules-->
        <div id="<?php echo $prefix;?>main-top" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('maintop'); ?>
        </div>
        <!--End Main-Top Modules-->
        <?php /**End Main-Top**/ endif;?>

        <?php /**Begin Breadcrumbs**/ if($expose->countModules('breadcrumbs')): ?>
       <!--Start Breadcrumbs Module-->
       <div id="<?php echo $prefix;?>breadcrumbs" class="<?php echo $prefix;?>row">
           <?php $expose->renderModules('breadcrumbs'); ?>
       </div>
       <!--End Breadcrumbs Module-->
       <?php /**End Breadcrumbs**/ endif;?>

        <!--Start Main Body-->

        <?php $expose->renderBody();?>

        <!--End Main Body Modules-->

        <?php /**Begin Main-Bottom**/ if($expose->countModules('mainbottom')): ?>
        <!--Start Main-Bottom Modules-->
        <div id="<?php echo $prefix;?>main-bottom" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('mainbottom'); ?>
        </div>
        <!--End Main Bottom Modules-->
        <?php /**End Main Bottom**/ endif;?>

        <?php /**Begin Bottom**/ if($expose->countModules('bottom')): ?>
        <!--Start Bottom Modules-->
        <div id="<?php echo $prefix;?>bottom" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('bottom'); ?>
        </div>
        <!--End Bottom Modules-->
        <?php /**End Bottom**/ endif;?>

        <?php /**Begin Footer**/ if($expose->countModules('footer')): ?>
        <!--Start Footer Modules-->
        <div id="<?php echo $prefix;?>footer" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('footer'); ?>
        </div>
        <!--End Footer Modules-->
        <?php /**End Footer**/ endif;?>

        <?php /**Begin Copyright**/ if($expose->countModules('copyright')): ?>
        <div id="<?php echo $prefix;?>copyright" class="<?php echo $prefix;?>row">
            <?php $expose->renderModules('copyright'); ?>
        </div>
        <?php /**End Copyright**/ endif;?>

        <?php /**Begin Absolute**/ if($expose->countModules('absolute')): ?>
        <div id="<?php echo $prefix;?>absolute">
            <?php $expose->renderModules('absolute'); ?>
        </div>
        <?php /**End Absolute**/ endif;?>

    </body>
</html>
<?php
$expose->finalizedExpose();
?>