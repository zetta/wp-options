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
		$input = "\n<input type=\"radio\" name=\"{$formName}\" value=\"true\" " . ($this->cast($value) ? 'checked="checked"' : '') . " /> " . _('Yes') . " &nbsp;";
		$input .= "\n<input type=\"radio\" name=\"{$formName}\" value=\"false\" " . (! $this->cast($value) ? 'checked="checked"' : '') . " /> " . _('No');
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
