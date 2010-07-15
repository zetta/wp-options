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

class WpCheckBoxOption extends WpOption
{
    var $emptyValue = array();
    
    /**
     * @var boolean
     */
    var $onePerLine;
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string|int|boolean $defaultValue
     * @param boolean $onePerLine (si deseamos que se muestre cada opcion en una linea diferente
     * @access public
     */
    function WpCheckBoxOption($name, $defaultValue, $onePerLine)
    {
        $this->name = $name;
        $this->defaultValue = $defaultValue;
        $this->onePerLine = $onePerLine;
    }
    
    /**
     * Genera el html de la opción
     * @return string
     * @access public
     */
    function ___toString()
    {
        $input = '';
        $value = $this->getValue();
        $formName = $this->getFormName();
        $id = $this->getFormId();
        $i=0;
        foreach ( $this->options as $optionValue => $optionName )
        {
            $input .= "\n<label for='{$id}_{$i}'>
                      <input type='checkbox' id='{$id}_{$i}' name='{$formName}[{$optionValue}]' value='{$optionValue}' "
                    . ( in_array($optionValue,$value) ? 'checked="checked"' : '')
                    . " /> "._s($optionName).'</label>';
            if ($this->onePerLine) $input .= '<br/>';
            $i++;
        }
        return $input;
    }

    /**
     * Obtiene el valor almacenado en la base de datos
     * @return string|mixed|int
     * @access protected
     */
    function getStoredValue()
    {
        if($this->dbSource == $this->Sources['OPTION'])
            return get_option($this->inputName . '_' . $this->name);
        else if($this->dbSource == $this->Sources['POST_META'])
            return unserialize(get_post_meta($this->post->ID, $this->name . '_value', true));
        else
            return '';
    }
}


