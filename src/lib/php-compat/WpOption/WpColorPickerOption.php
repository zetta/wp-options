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

class WpColorPickerOption extends WpOption
{
    var $emptyValue = '000000';
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpColorPickerOption
     */
    function WpColorPickerOption($name, $defaultValue)
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
        $value = $this->getValue();
        $formName = $this->getFormName();
        $idName = $this->getFormId();
        return "<input id='{$idName}' class='wpColorPickerOption' type='text' maxlength='6' size='6' name='{$formName}' value='{$value}' />";
    }
}
