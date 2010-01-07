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

class WpRadioOption extends WpOption
{
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
	function WpRadioOption($name, $defaultValue, $onePerLine)
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
		$this->savedValue = $this->getStoredValue();
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : 'false');
		$formName = $this->getFormName();
		foreach($this->options as $optionValue => $optionName)
		{
			$input .= "\n<input type=\"radio\" name=\"{$formName}\" value=\"{$optionValue}\" " . ($value == $optionValue ? 'checked="checked"' : '') . " /> " . _($optionName);
			if($this->onePerLine)
				$input .= '<br/>';
		}
		return $input;
	}
}
