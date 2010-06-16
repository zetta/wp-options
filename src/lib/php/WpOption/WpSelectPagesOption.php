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
        $value = $this->getValue();
        if($this->isMultiple)
            $input = "<select id='{$this->getFormId()}' name='{$this->getFormName()}[]' multiple='multiple' size='5' value='{$value}' >";
        else
            $input = "<select id='{$this->getFormId()}' name='{$this->getFormName()}' value='{$value}' >";
        
        if(! $this->isMultiple)
        {
            $input .= "<option value='0'>" . _s('Select one page') . "</option>";
            foreach($this->options as $page)
                $input .= "\n<option value='{$page->ID}' " . ($page->ID == $value ? 'selected="selected"' : '') . " >" . _s($page->post_title) . '</option>';
        } else
            foreach($this->options as $page)
                $input .= "\n<option value='{$page->ID}' " . (in_array($page->ID, $value) ? 'selected="selected"' : '') . " >" . _s($page->post_title) . '</option>';
        
        $input .= "</select>";
        return $input;
    }

    /**
     * Get the value
     */
    public function getValue()
    {
        $val = parent::getValue();
        $val = ($val) ? $val : (
            ($this->isMultiple) ? array() : 0
        );
        return $val;
    }
}


