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

class WpTextOption extends WpOption
{
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpTextOption
     */
    public function WpTextOption($name, $defaultValue)
    {
        parent::__construct($name, $defaultValue);
    }
    
    /**
     * Genera el html de la opci�n
     * @return string
     * @access public
     */
    public function ___toString()
    {
        $this->savedValue = $this->getStoredValue();
        $value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== false) ? $this->defaultValue : '');
        return "<textarea name='{$this->getFormName()}' id='{$this->getFormId()}' cols='80' rows='6' >{$value}</textarea>";
    }
}
