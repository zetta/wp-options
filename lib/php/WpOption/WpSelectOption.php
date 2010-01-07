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

class WpSelectOption extends WpOption
{
	
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param string $defaultValue
	 * @return WpSelectOption
	 */
	public function WpSelectOption($name, $defaultValue)
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
		$this->savedValue = $this->getStoredValue();
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : '');
		$input = "<select name=\"{$this->getFormName()}\" value=\"{$value}\" />";
		foreach($this->options as $optionValue => $optionName)
		{
			$input .= "\n<option value=\"{$optionValue}\" " . ($optionValue == $value ? 'selected="selected"' : '') . " > " . _($optionName) . '</option>';
		}
		$input .= "</select>";
		return $input;
	}
}


