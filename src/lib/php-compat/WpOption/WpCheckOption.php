<?php
/**
 * Spiga
 *
 * SpigaTheme
 *
 * @category   Wordpress
 * @package    WordPress_Themes
 * @copyright  Copyright (c) 2008-2009 Spiga (http://www.spiga.com.mx)
 * @author     zetta (http://www.ctrl-zetta.com)
 * @version    1.0
 */

class WpCheckOption extends WpOption
{
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param string $defaultValue
	 * @return WpCheckOption
	 */
	function WpCheckOption($name, $defaultValue)
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
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : 'false');
		$formName = $this->getFormName();
		$idName = $this->getFormId();
		$class = $this->hasChilds() ? 'optionParent' : '';
		$input = "\n<input  type=\"checkbox\" class=\"{$class}\" id=\"{$idName}\"  name=\"{$formName}\" value=\"true\" " . ($this->cast($value) ? 'checked="checked"' : '') . " /> " . _(substr($this->description, 3, - 4));
		$this->description = '';
		return $input;
	}
	
	/**
	 * cast the value to a boolean
	 * @param string|int|boolean $value
	 * @return boolean
	 * @access private
	 */
	function cast($value)
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
	function set($value)
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
	function getValue()
	{
		if($this->value == null)
		{
			$this->savedValue = get_option($this->inputName . '_' . $this->name);
			$this->value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== false) ? $this->defaultValue : '');
			$this->value = $this->cast($this->value);
		}
		return $this->value;
	}

}
