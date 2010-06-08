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

class WpOptionTitle
{
	/**
	 * @var string $title
	 * @access private
	 */
	var $title;
	
	/**
	 * @var string
	 * @access private
	 */
	var $template;
	
	/**
	 * Constructor de la clase
	 *
	 * @param string $title
	 * @return wp-optionsOptionTitle
	 * @access public
	 */
	function WpOptionTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * @param string $template
	 * @access public
	 */
	function setTemplate($template)
	{
		$this->template = $template;
	}
	
	/**
	 * @return string
	 * @access public
	 */
	function __toString()
	{
		return str_replace('%title%', $this->title, $this->template);
	}
}
