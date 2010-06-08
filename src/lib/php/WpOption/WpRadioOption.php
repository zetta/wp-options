<?php
/**
 * Spiga
 *
 * wp-options
 *
 * @category   Wordpress
 * @package    WordPress_Themes
 * @copyright  Copyright (c) 2008-2010 Spiga (http://www.spiga.mx)
 * @author     zetta (http://www.ctrl-zetta.com)
 * @version    1.1
 */

class WpRadioOption extends WpOption
{
	/**
	 * @var boolean
	 */
	private $onePerLine;
	
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param string|int|boolean $defaultValue
	 * @param boolean $onePerLine (si deseamos que se muestre cada opcion en una linea diferente
	 * @access public
	 */
	public function WpRadioOption($name, $defaultValue, $onePerLine)
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
	public function ___toString()
	{
		$input = '';
		$this->savedValue = $this->getStoredValue();
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : 'false');
		$i=0;
		foreach($this->options as $optionValue => $optionName)
		{
			$input .= "\n<label for='{$this->getFormId()}_{$i}'><input type='radio' id='{$this->getFormId()}_{$i}' name='{$this->getFormName()}' value='{$optionValue}' " . ($value == $optionValue ? 'checked="checked"' : '') . " /> " . _s($optionName).'</label>';
			if($this->onePerLine) $input .= '<br/>';
			$i++;
		}
		return $input;
	}
}
