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

class WpSelectOption extends WpOption
{
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpSelectOption
     */
    function WpSelectOption($name, $defaultValue)
    {
        parent::__construct($name, $defaultValue);
    }
    
    /**
     * Genera el html de la opción
     * @return string
     * @access public
     */
    function ___toString()
    {
        $this->savedValue = $this->getStoredValue();
        $value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : '');
        $formName = $this->getFormName();
        $idName = $this->getFormId();
        $input = "<select id=\"{$idName}\" name=\"{$formName}\" value=\"{$value}\" >";
        foreach($this->options as $optionValue => $optionName)
        {
            $input .= "\n<option value=\"{$optionValue}\" " . ($optionValue == $value ? 'selected="selected"' : '') . " > " . _s($optionName) . '</option>';
        }
        $input .= "</select>";
        return $input;
    }
}


