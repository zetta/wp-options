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

class WpNumberOption extends WpOption
{
    protected $emptyValue = '0';
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param int|mixed $defaultValue
     * @return WpNumberOption
     */
    public function WpNumberOption($name, $defaultValue)
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
        return "<input type='text' id='{$this->getFormId()}' size='6' name='{$this->getFormName()}' value='{$value}' />";
    }
}
