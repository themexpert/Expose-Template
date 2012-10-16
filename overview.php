<?php
/**
 * Overview pane for admin.
 * Give flexibility to add any link item in admin
 *
 * @package     Expose
 * @version     4.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 *
 **/
$imagePath = $templateUrl . '/template_thumbnail.png';
$templateXml = $templatePath . '/templateDetails.xml';
$version = '1.0';

if ( JFile::exists($templateXml) )
{
    $xml = simplexml_load_file($templateXml);
    $version = $xml->version[0];
}

?>

<div class='overview-panel-left'>
    <div class='overview-inner gradient3 clearfix'>

        <img class="auto-size" src="<?php echo $imagePath ;?>" alt="template_preview" />

        <?php echo JText::_('EXPOSE_DESCRIPTION'); ?>
    </div>
</div>

<div class='overview-panel-right'>
    <div class='overview-inner'>
        <div class='template-info gradient clearfix'>
            <div class='template-name'></div>
            <div class='details'> <?php echo JText::_('EXPOSE_TEMPLATE_STYLE_DESC') ?> </div>
        </div>

            <div class='live-update gradient'>
                <p class="version-info">
                    <?php echo JText::_('EXPOSE_TEMPLATE_VERSION'); ?>
                    <span><?php echo $version; ?></span>
                </p>
                <p class="version-info">
                    <?php echo JText::_('EXPOSE_FRAMEWORK_VERSION') ;?>
                    <span><?php echo EXPOSE_VERSION; ?></span>
                </p>
            </div>

            <div class='getting-help gradient3'>
            <h2 class="help-title"> <?php echo JText::_('EXPOSE_GETTING_HELP_TITLE'); ?> </h2>
            <ul>
            <li>
                <a href="http://www.themexpert.com/expose" target="_blank">Expose Framework Homepage</a>
            </li>
            <li>
                <a href="http://docs.themexpert.com" target="_blank">Expose Framework Documentation</a>
            </li>
            <li>
                <a href="https://groups.google.com/d/forum/expose-framework" target="_blank">Expose Framework Mailing list</a>
            </li>
            </ul>
        </div>
    </div>
</div>