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

class WpSelectPagesOption extends WpOption
{
	
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param string $defaultValue
	 * @return WpSelectPagesOption
	 */
	public function WpSelectPagesOption($name, $defaultValue)
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
		$this->options = get_pages();
		$this->savedValue = $this->getStoredValue();
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : '');
		
		if($this->isMultiple)
		{
			$input = "<select name=\"{$this->getFormName()}[]\" multiple=\"multiple\" size=\"5\" value=\"{$value}\" />";
			$value = ($value) ? $value : array();
		} else
			$input = "<select name=\"{$this->getFormName()}\" value=\"{$value}\" />";
		
		if(! $this->isMultiple)
		{
			$input .= "<option value=\"0\">" . _('Select one page') . "</option>";
			foreach($this->options as $page)
				$input .= "\n<option value=\"{$page->ID}\" " . ($page->ID == $value ? 'selected="selected"' : '') . " >" . _($page->post_title) . '</option>';
		} else
			foreach($this->options as $page)
				$input .= "\n<option value=\"{$page->ID}\" " . (in_array($page->ID, $value) ? 'selected="selected"' : '') . " >" . _($page->post_title) . '</option>';
		
		$input .= "</select>";
		return $input;
	
	}

}


