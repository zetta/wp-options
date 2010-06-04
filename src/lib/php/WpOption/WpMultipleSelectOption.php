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

class WpMultipleSelectOption extends WpOption
{
	
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param mixed $defaultValue
	 * @return WpMultipleSelectOption
	 */
	public function WpMultipleSelectOption($name, $defaultValue)
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
		$input = "<select id=\"{$this->getFormId()}\" name=\"{$this->getFormName()}[]\" value=\"{$value}\" multiple size=\"5\"/>";
		foreach($this->options as $optionValue => $optionName)
		{
			$input .= "\n<option value=\"{$optionValue}\" " . (in_array($optionValue, $value) ? 'selected="selected"' : '') . " > " . _($optionName) . '</option>';
		}
		$input .= "</select>";
		return $input;
	}

}


