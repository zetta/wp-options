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

class WpBooleanOption extends WpOption
{
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     */
    function WpBooleanOption($name, $defaultValue)
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
        $formName = $this->getFormName();
        $idName = $this->getFormId();
        $value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : 'false');
        $input = "\n<label for='{$idName}_true'><input type='radio' name='{$formName}' id='{$idName}_true' value='true' " . ($this->cast($value) ? 'checked="checked"' : '') . " /> " . _s('Yes') . "</label> &nbsp;";
        $input .= "\n<label for='{$idName}_false'><input type='radio' name='{$formName}' id='{$idName}_false' value='false' " . (! $this->cast($value) ? 'checked="checked"' : '') . " /> " . _s('No') .'</label>';
        return $input;
    }
    
    /**
     * cast the value to a boolean
     * @param string|int|boolean $value
     * @return boolean
     * @access public
     */
    function cast($value)
    {
        if(is_bool($value))
            return $value;
        if($value === 'false' || $value === 0 || $value === '0' || $value === 'null' || $value === NULL || $value === false)
            return false;
        else
            return true;
    }
}
