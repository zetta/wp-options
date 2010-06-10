<?php
/**
 * Spiga
 *
 * wp-options
 *
 * @category   Wordpress
 * @package    Storelicious_Themes
 * @copyright  Copyright (c) 2008-2010 Spiga (http://www.spiga.mx)
 * @author     zetta (http://www.ctrl-zetta.com)
 * @version    1.1
 */

class WpSelectTagsOption extends WpOption
{
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param int|mixed $defaultValue
     * @return WpSelectTagsOption
     */
    function WpSelectTagsOption($name, $defaultValue)
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
        $this->options = get_tags(array(
            'hide_empty' => false));
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
            $input .= "<option value=\"0\">" . _s('Select one tag') . "</option>";
            foreach($this->options as $tag)
                $input .= "\n<option value=\"{$tag->name}\" " . ($tag->name == $value ? 'selected="selected"' : '') . " >" . _s($tag->name) . '</option>';
        } else
            foreach($this->options as $tag)
                $input .= "\n<option value=\"{$tag->name}\" " . (in_array($tag->name, $value) ? 'selected="selected"' : '') . " >" . _s($tag->name) . '</option>';
        
        $input .= "</select>";
        return $input;
    }
}


