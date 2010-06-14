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
    protected $emtpyValue = 0;
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpSelectOption
     */
    public function WpSelectOption($name, $defaultValue)
    {
        parent::__construct($name, $defaultValue);
    }
    
    /**
     * Genera el html de la opción
     * @return string
     * @access public
     */
    public function ___toString()
    {
        $value = $this->getValue();
        $input = "<select id='{$this->getFormId()}' name='{$this->getFormName()}' value='{$value}' >";
        foreach($this->options as $optionValue => $optionName)
        {
            $input .= "\n<option value='{$optionValue}' " . ($optionValue == $value ? 'selected="selected"' : '') . " > " . _s($optionName) . '</option>';
        }
        $input .= "</select>";
        return $input;
    }
}


