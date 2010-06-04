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

class WpDatePickerOption extends WpOption
{
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param string $defaultValue
	 * @return WpStringOption
	 */
	function WpDatePickerOption($name, $defaultValue)
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
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== false) ? $this->defaultValue : '');
		$formName = $this->getFormName();
		$idName = $this->getFormId();
		return "<input id=\"{$idName}\" class=\"wpDatePickerOption\" type=\"text\" size=\"45\" name=\"{$formName}\" value=\"{$value}\" />";
	}
}
