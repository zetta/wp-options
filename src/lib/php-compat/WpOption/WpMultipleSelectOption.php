<?php
/**
 * Spiga
 *
 * wp-options
 *
 * @category   Wordpress
 * @package    Storelicious_Themes
 * @copyright  Copyright (c) 2008-2010 Spiga (http://www.spiga.mx)
 * @author     zetta (http://www.ctrl-zetta.com)
 * @version    1.1
 */

class WpMultipleSelectOption extends WpOption
{
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param mixed $defaultValue
     * @return WpMultipleSelectOption
     */
    function WpMultipleSelectOption($name, $defaultValue)
    {
        parent::__construct($name, $defaultValue);
    }
    
    /**
     * Genera el html de la opci�n
     * @return string
     * @access public
     */
    function ___toString()
    {
        $this->savedValue = $this->getStoredValue();
        $value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : '');
        $formName = $this->getFormName();
        $input = "<select name='{$formName}[]' value='{$value}' multiple size='5'>";
        foreach($this->options as $optionValue => $optionName)
        {
            $input .= "\n<option value='{$optionValue}' " . (in_array($optionValue, $value) ? 'selected="selected"' : '') . " > " . _s($optionName) . '</option>';
        }
        $input .= "</select>";
        return $input;
    }

}


