<?php
/**
 * @package     Expose
 * @subpackage  Bootstrap Theme
 * @version     1.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 **/

//prevent direct access
defined ('EXPOSE_VERSION') or die ('resticted aceess');

//import parent gist class
expose_import('core.widget');

class ExposeWidgetDesignedby extends ExposeWidget{
    
    public $name = 'designedby';

   /* public function isEnabled()
    {
        return FALSE;
    }*/

    public function isInMobile()
    {
        return TRUE;
    }

    public function render()
    {

        ob_start()
        ?>
        <p class="designed-by">
           Designed by: <a target="_blank" title="ThemeXpert" href="http://www.themexpert.com">ThemeXpert</a>
        </p>


        <?php
        return ob_get_clean();
    }
}

?>

