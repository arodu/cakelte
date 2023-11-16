<?php

declare(strict_types=1);

namespace CakeLte\View\Helper;

use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\View\Helper;
use CakeLte\Style\Header;
use CakeLte\Style\Sidebar;

/**
 * CakeLte helper
 */
class FormLteHelper extends Helper
{

/**
 * Long Select
 * 
 * Adds a search field to a standard select box which allows the user to search through the options.
 * Still requires all the options to be loaded into the html so for very long lists this may not be the best option.
 * Options
 * @value - The seledted value
 * 
 */
    public function longSelect($field, $options = [], $parameters = [])
    {
        $this->_View->append('script');
        // echo "<script>";
        // echo "$('select').selectpicker();";
        // echo "</script>";
        $this->_View->end();

        $component = '<div class="form-group d-flex gap-3" >';
        $component .= "<label class='p-1'>".($parameters['label']??ucwords($field))."</label>";
        $component .= "<select class='long-choice-$field selectpicker' data-live-search='true'>";
        if(isset($parameters['allowEmpty']) && $parameters['allowEmpty'] == true)
            $component .= "<option value=''>All</option>";
        foreach ($options as $key => $value) {
            $component .= "<option value='$key'>$value</option>";
        }
        $component .= "</select>";
        $component .= "</div>";

        return $component;
    }

    public function select($field, $options, $parameters = [])
    {
        $component = '<div class="form-group d-flex gap-3">';
        $component .= "<label class='p-1'>".($parameters['label']??ucwords($field))."</label>";
        $component .= "<select class='form-select lh-1' name='$field'>";

        if(isset($parameters['allowEmpty']) && $parameters['allowEmpty'] == true)
            $component .= "<option value=''>All</option>";
        foreach ($options as $key => $value) {
            $component .= "<option value='$key'>$value</option>";
        }
        $component .= "</select>";
        $component .= '</div>';
        return $component;
    }


    public function day($field, $parameters = [])
    {
        $component = '<div class="form-group d-flex gap-3">';
        $component .= "<label class='p-1'>".($parameters['label']??ucwords($field))."</label>";
        $component .= "<input type='date' class='search-date  lh-1' name='$field'>";

        $component .= '</div>';
        return $component;
    }

}
