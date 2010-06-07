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
	private $onePerLine;
	
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param string|int|boolean $defaultValue
	 * @param boolean $onePerLine (si deseamos que se muestre cada opcion en una linea diferente
	 * @access public
	 */
	public function WpCheckBoxOption($name, $defaultValue, $onePerLine)
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
		$value = ($this->savedValue!=false) ? $this->savedValue : (($this->defaultValue!=null) ? $this->defaultValue : array());
		$i=0;
		foreach ( $this->options as $optionValue => $optionName )
		{
			$input .= "\n<label for='{$this->getFormId()}_{$i}'><input type='checkbox' id='{$this->getFormId()}_{$i}' name='{$this->getFormName()}[{$optionValue}]' value='{$optionValue}' ".( in_array($optionValue,$value) ? 'checked="checked"' : '')." /> "._s($optionName) . '</label>';
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
	public function getStoredValue()
	{
		if($this->dbSource == self::$Sources['OPTION'])
			return get_option($this->inputName . '_' . $this->name);
		else if($this->dbSource == self::$Sources['POST_META'])
			return unserialize(get_post_meta($this->post->ID, $this->name . '_value', true));
		else
			return '';
	}
	
}


