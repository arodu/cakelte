<?php
  return [
          'button' => '<button class="btn btn-primary" {{attrs}}>{{text}}</button>',
          'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>',
          'inputContainer' => '<div class="input form-group {{type}}{{required}}">{{content}}{{textBefore}}</div>',
          'label' => '<label class="control-label"{{attrs}}>{{text}}</label>',
          'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',

          'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',

          'file' => '<div class="input-group"><div class="custom-file"><input type="file" class="custom-file-input" name="{{name}}"{{attrs}}><label class="custom-file-label">'.__('Choose files').'</label></div></div>',

          'dateWidget' => '<div class="date-widget d-flex" style="width:max-content;">{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}</div>',

          'confirmJs' => '{{confirm}}',

          // -------------------------------

          'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}> ',
          // Input group wrapper for checkboxes created via control().
          'checkboxFormGroup' => '{{label}}',
          // Wrapper container for checkboxes.
          'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
          // Error message wrapper elements.
          'error' => '<div class="error-message">{{content}}</div>',
          // Container for error items.
          'errorList' => '<ul>{{content}}</ul>',
          // Error item wrapper.
          'errorItem' => '<li>{{text}}</li>',
          // File input used by file().
          // Fieldset element used by allControls().
          'fieldset' => '<fieldset{{attrs}}>{{content}}</fieldset>',
          // Open tag used by create().
          'formStart' => '<form{{attrs}}>',
          // Close tag used by end().
          'formEnd' => '</form>',
          // General grouping container for control(). Defines input/label ordering.
          'formGroup' => '{{label}}{{input}}',
          // Wrapper content used to hide other content.
          'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
          // Submit input element.
          'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
          // Container element used by control() when a field has an error.
          'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
          // Label element used for radio and multi-checkbox inputs.
          'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
          // Legends created by allControls()
          'legend' => '<legend>{{text}}</legend>',
          // Multi-Checkbox input set title element.
          'multicheckboxTitle' => '<legend>{{text}}</legend>',
          // Multi-Checkbox wrapping container.
          'multicheckboxWrapper' => '<fieldset{{attrs}}>{{content}}</fieldset>',
          // Option element used in select pickers.
          'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
          // Option group element used in select pickers.
          'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
          // Multi-select element,
          'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
          // Radio input element,
          'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
          // Wrapping container for radio input/label,
          'radioWrapper' => '{{label}}',
          // Container for submit buttons.
          'submitContainer' => '<div class="submit">{{content}}</div>',
      ];
