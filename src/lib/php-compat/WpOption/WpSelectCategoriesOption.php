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

class WpSelectCategoriesOption extends WpOption
{
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param int|mixed $defaultValue
     * @return WpSelectCategoriesOption
     */
    function WpSelectCategoriesOption($name, $defaultValue)
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
        $this->options = get_categories(array('hide_empty' => false));
        $value = $this->getValue();
        $formName = $this->getFormName();
        $idName = $this->getFormId();
        if($this->isMultiple)
        {
            $input = "<select id='{$idName}' name='{$formName}[]' multiple='multiple' size='5' value='{$value}' >";
            $value = ($value) ? $value : array();
        } else
            $input = "<select id='{$idName}' name='{$formName}' value='{$value}' >";
        
        if(! $this->isMultiple)
        {
            $input .= "<option value='0'>" . _s('Select one category') . "</option>";
            foreach($this->options as $category)
                $input .= "\n<option value='{$category->cat_ID}' " . ($category->cat_ID == $value ? 'selected="selected"' : '') . " >" . _s($category->name) . '</option>';
        } else
            foreach($this->options as $category)
                $input .= "\n<option value='{$category->cat_ID}' " . (in_array($category->cat_ID, $value) ? 'selected="selected"' : '') . " >" . _s($category->name) . '</option>';
        
        $input .= "</select>";
        return $input;
    }

    /**
     * Get the value
     */
    function getValue()
    {
        $val = parent::getValue();
        $val = ($val) ? $val : (
            ($this->isMultiple) ? array() : 0
        );
        return $val;
    }
}


