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

class WpDatePickerOption extends WpOption
{
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpStringOption
     */
    public function WpDatePickerOption($name, $defaultValue)
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
        $this->savedValue = $this->getStoredValue();
        $value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== false) ? $this->defaultValue : '');
        return "<input  id=\"{$this->getFormId()}\" class=\"wpDatePickerOption\" type=\"text\" size=\"45\" name=\"{$this->getFormName()}\" value=\"{$value}\" />";
    }
}
