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
    function WpTextOption($name, $defaultValue)
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
        return "<textarea name='{$formName}' id='{$idName}' cols='60' rows='6' >{$value}</textarea>";
    }
}
