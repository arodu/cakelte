<?php

declare(strict_types=1);

namespace CakeLte\View\Helper;


use Cake\View\Helper;


/**
 * CakeLte helper
 */
class SearchLteHelper extends Helper
{

    protected array $helpers = ['Form'];
    /**
     * Long Select
     * 
     * Adds a search field to a standard select box which allows the user to search through the options.
     * Still requires all the options to be loaded into the html so for very long lists this may not be the best option.
     * Options
     * @value - The seledted value
     * 
     */
    public function longSelect($field, $options = [], $attributes = [])
    {

        $component = "<div class='input-group-append " . $this->getSelectedClass($attributes) . "'>";
        $component .= $this->Form->label($field, $attributes['label'] ?? null, ['class' => 'px-3 pt-1 mb-0 form-label fs-5 h-100']);
        $component .= "<select class='long-choice-$field selectpicker' name='$field' data-live-search='true'>";
        if (isset($attributes['allowEmpty']) && $attributes['allowEmpty'] == true)
            $component .= "<option value=''>All</option>";
        foreach ($options as $key => $value) {
            $is_selected = ($key == $this->getSelectedValue($attributes) ? 'selected' : '');
            $component .= "<option value='$key' $is_selected>$value</option>";
        }
        $component .= "</select>";
        $component .= "</div>";
        return $component;
    }

    public function searchSelect($field, $options, $attributes = [])
    {

        $component = "<div class='input-group-append " . $this->getSelectedClass($attributes) . "'>";
        $component .= $this->Form->label($field, $attributes['label'] ?? null, ['class' => 'px-3 pt-1 mb-0 form-label fs-5 h-100']);
        $component .= "<select class='long-choice-$field selectpicker' name='$field'>";
        if (isset($attributes['allowEmpty']) && $attributes['allowEmpty'] == true)
            $component .= "<option value=''>All</option>";
        foreach ($options as $key => $value) {
            $is_selected = ($key == $this->getSelectedValue($attributes) ? 'selected' : '');
            $component .= "<option value='$key' $is_selected>$value</option>";
        }
        $component .= "</select></div>";
        return $component;
    }


    public function searchDay(string $field, array $options = []): string
    {
        $component = "<div class='input-group-append " . $this->getSelectedClass($options) . "'>";
        $component .= "<label class='pt-1 px-3 fs-5 h-100'>" . ($options['label'] ?? ucwords($field)) . "</label>";
        $component .= "<input type='date' class='search-date h-100' name='$field' value='" . $this->getSelectedValue($options) . "'>";
        $component .= "</div>";
        return $component;
    }


    public function searchDayRange(string $field, array $options = []): string
    {

        $selected_value_from = $options['value_from']??'';
        $selected_value_to = $options['value_to']??'';
        $input_selected = isset($options['value_from'])&&$options['value_from']||isset($options['value_to'])&&$options['value_to']?'input-set':'';
        



        $component = "<div class='input-group-append $input_selected'>";
        $component .= "<label class='pt-1 px-3 fs-5 h-100'>" . ($options['label'] ?? ucwords($field)) . "-from</label>";
        $component .= "<input type='date' class='search-date h-100' name='$field-from' value='$selected_value_from'>";
        $component .= "<label class='pt-1 px-3 fs-5 h-100'>" . ($options['label'] ?? ucwords($field)) . "-to</label>";
        $component .= "<input type='date' class='search-date h-100' name='$field-to' value='$selected_value_to'>";
        $component .= "</div>";
        return $component;
    }

    public function searchText(string $field, array $options = []): string
    {

        $component = "<div class='input-group-append " . $this->getSelectedClass($options) . "'>";
        $component .= "<label class='pt-1 px-3 fs-5 h-100'>" . ($options['label'] ?? ucwords($field)) . "</label>";
        $component .= "<input type='search' name='$field' class='search-text h-100' value='" . $this->getSelectedValue($options) . "'>";
        $component .= "</div>";
        return $component;
    }

    protected function getSelectedClass($options)
    {
        if (isset($options['value']) && $options['value']) {
            return "input-set";
        } else {
            return "";
        }
    }

    protected function getSelectedValue($options)
    {
        if (isset($options['value']) && $options['value']) {
            return $options['value'];
        } else {
            return "";
        }
    }
}
