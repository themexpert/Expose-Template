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
if( file_exists( JPATH_LIBRARIES . '/expose/expose.php' ) ){

    require_once JPATH_LIBRARIES . '/expose/expose.php';

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

        <!--[if (gte IE 6)&(lte IE 8)]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="<?php echo $expose->exposeUrl; ?>/interface/js/respond.js"></script>
        <![endif]-->

    </head>
    
    <body <?php echo $expose->generateBodyClass();?> >
        <div class="container">
            
            <?php /**Begin Roof**/ if($expose->countModules('roof')): ?>
            <!--Start Roof Modules-->
            <section id="roof" class="row">

                <?php $expose->renderModules('roof'); ?>

            </section>
            <!--End Roof Modules-->
            <?php /**End Roof**/ endif;?>

            <header>
                <?php /**Begin Top**/ if($expose->countModules('top')): ?>
                <!--Start Top Modules-->
                <section id="top" class="row">

                    <?php $expose->renderModules('top'); ?>

                </section>
                <!--End Top Modules-->
                <?php /**End Top**/ endif;?>

                <?php /**Begin Header**/ if($expose->countModules('header')): ?>
                <!--Start Header Modules-->
                <section id="header" class="row">

                    <?php $expose->renderModules('header'); ?>

                </section>
                <!--End Header Modules-->
                <?php /**End Header**/ endif;?>
            </header>

            <?php /**Begin Utility**/ if($expose->countModules('utility')): ?>
            <!--Start Utility Modules-->
            <section id="utility" class="row">

                <?php $expose->renderModules('utility'); ?>

            </section>
            <!--End Utility Modules-->
            <?php /**End Utility**/ endif;?>
    
            <?php /**Begin Feature**/ if($expose->countModules('feature')): ?>
            <!--Start Feature Modules-->
            <section id="feature" class="row">

                <?php $expose->renderModules('feature'); ?>

            </section>
            <!--End Feature Modules-->
            <?php /**End Feature**/ endif;?>
    
            <?php /**Begin Main-Top**/ if($expose->countModules('maintop')): ?>
            <!--Start Main-Top Modules-->
            <section id="main-top" class="row">

                <?php $expose->renderModules('maintop'); ?>

            </section>
            <!--End Main-Top Modules-->
            <?php /**End Main-Top**/ endif;?>
    
            <?php /**Begin Breadcrumbs**/ if($expose->countModules('breadcrumbs')): ?>
            <!--Start Breadcrumbs Module-->
            <section id="breadcrumbs" class="row">

                <?php $expose->renderModules('breadcrumbs'); ?>

            </section>
            <!--End Breadcrumbs Module-->
            <?php /**End Breadcrumbs**/ endif;?>
    
            <!--Start Main Body-->
            <section id="main" class="row">
                <?php $expose->renderBody();?>
            </section>
            <!--End Main Body Modules-->
    
            <?php /**Begin Main-Bottom**/ if($expose->countModules('mainbottom')): ?>
            <!--Start Main-Bottom Modules-->
            <section id="main-bottom" class="row">

                <?php $expose->renderModules('mainbottom'); ?>

            </section>
            <!--End Main Bottom Modules-->
            <?php /**End Main Bottom**/ endif;?>
    
            <?php /**Begin Bottom**/ if($expose->countModules('bottom')): ?>
            <!--Start Bottom Modules-->
            <section id="bottom" class="row">

                <?php $expose->renderModules('bottom'); ?>

            </section>
            <!--End Bottom Modules-->
            <?php /**End Bottom**/ endif;?>
    
            <?php /**Begin Footer**/ if($expose->countModules('footer')): ?>
            <!--Start Footer Modules-->
            <footer id="footer" class="row">

                <?php $expose->renderModules('footer'); ?>

            </footer>
            <!--End Footer Modules-->
            <?php /**End Footer**/ endif;?>
    
            <?php /**Begin Copyright**/ if($expose->countModules('copyright')): ?>
            <section id="copyright" class="row">
                <?php $expose->renderModules('copyright'); ?>
            </section>
            <?php /**End Copyright**/ endif;?>
    
            <?php /**Begin Absolute**/ if($expose->countModules('absolute')): ?>
            <div id="absolute">
                <?php $expose->renderModules('absolute'); ?>
            </div>
            <?php /**End Absolute**/ endif;?>
        </div>
    </body>
</html>
<?php
$expose->finalizedExpose();
?>