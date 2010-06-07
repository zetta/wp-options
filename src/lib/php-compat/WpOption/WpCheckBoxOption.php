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

class WpCheckBoxOption extends WpOption
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
		$this->savedValue = $this->getStoredValue();
		$value = ($this->savedValue!==false) ? $this->savedValue : (($this->defaultValue!==null) ? $this->defaultValue : 'false');
		$formName = $this->getFormName();
		$id = $this->getFormId();
		$i=0;
		foreach ( $this->options as $optionValue => $optionName )
		{
			$input .= "\n<label for='{$id}_{$i}'><input type='checkbox' id='{$id}_{$i}' name='{$formName}[{$optionValue}]' value='{$optionValue}' ".( in_array($optionValue,$value) ? 'checked="checked"' : '')." /> "._($optionName).'</label>';
			if ($this->onePerLine) $input .= '<br/>';
			$i++;
		}
		return $input;
	}
}


