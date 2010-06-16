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

class WpCheckOption extends WpOption
{
    protected $emptyValue = 'false';
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpCheckOption
     */
    public function WpCheckOption($name, $defaultValue)
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
        $class = $this->hasChilds() ? 'optionParent' : '';
        $input = "\n<input type='checkbox' class='{$class}' id='{$this->getFormId()}'  name='{$this->getFormName()}' value='true' " . ($this->cast($value) ? 'checked="checked"' : '') . " /> " . _s(substr($this->description, 3, - 4));
        $this->description = '';
        return $input;
    }
    
    /**
     * cast the value to a boolean
     * @param string|int|boolean $value
     * @return boolean
     * @access private
     */
    private function cast($value)
    {
        if(is_bool($value))
            return $value;
        if($value === 'false' || $value === 0 || $value === '0' || $value === 'null' || $value === NULL || $value === false || $value === '')
            return false;
        else
            return true;
    }
    
    /**
     * Método para castear el valor de la opcion y poder almacenarla en la base de datos
     * @param int|string|mixed $value
     * @return string
     * @access public
     */
    public function set($value)
    {
        if($value === 'false' || $value === 0 || $value === '0' || $value === 'null' || $value === NULL || $value === false || $value === '')
            return 'false';
        else
            return 'true';
    }
    
    /**
     * Regresa el valor guardado o el default si no existe
     * @access public 
     */
    public function getValue()
    {
        return $this->cast( parent::getValue() );
    }

}
