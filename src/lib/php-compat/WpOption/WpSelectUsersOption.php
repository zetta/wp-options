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

class WpSelectUsersOption extends WpOption
{
	/**
	 * Constructor de la clase
	 *
	 * @param string $name
	 * @param int|mixed $defaultValue
	 * @return WpSelectUsersOption
	 */
	function WpSelectUsersOption($name, $defaultValue)
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
		$this->options = get_users_of_blog();
		$this->savedValue = $this->getStoredValue();
		$value = ($this->savedValue !== false) ? $this->savedValue : (($this->defaultValue !== null) ? $this->defaultValue : '');
		$formName = $this->getFormName();
		$idName = $this->getFormId();
		if($this->isMultiple)
		{
			$input = "<select id=\"{$idName}\" name=\"{$formName}[]\" multiple=\"multiple\" size=\"5\" value=\"{$value}\" >";
			$value = ($value) ? $value : array();
		} else
			$input = "<select id=\"{$idName}\" name=\"{$formName}\" value=\"{$value}\" >";
		
		if(! $this->isMultiple)
		{
			$input .= "<option value=\"0\">" . _s('Select one page') . "</option>";
			foreach($this->options as $user)
				$input .= "\n<option value=\"{$user->user_id}\" " . ($user->user_id == $value ? 'selected="selected"' : '') . " >" . _s($user->display_name) . '</option>';
		} else
			foreach($this->options as $user)
				$input .= "\n<option value=\"{$user->user_id}\" " . (in_array($user->user_id, $value) ? 'selected="selected"' : '') . " >" . _s($user->display_name) . '</option>';
		
		$input .= "</select>";
		return $input;
	}
}


