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

class WpSelectFileOption extends WpOption
{
    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpSelectFileOption
     */
    public function WpSelectFileOption($name, $defaultValue)
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
        $this->options = $this->getFiles($this->options);
        $value = $this->getValue();
        if($this->isMultiple)
            $input = "<select id='{$this->getFormId()}' name='{$this->getFormName()}[]' multiple='multiple' size='5' >";
        else
            $input = "<select id='{$this->getFormId()}' name='{$this->getFormName()}' >";
        
        if(! $this->isMultiple)
        {
            $input .= "<option value='0'>" . _s('Select one file') . "</option>";
            foreach($this->options as $file)
                $input .= "\n<option value='{$file}' " . ($file === $value ? 'selected="selected"' : '') . " >" . _s($file) . '</option>';
        } else
            foreach($this->options as $file)
                $input .= "\n<option value='{$file}' " . (in_array($file, $value) ? 'selected="selected"' : '') . " >" . _s($file) . '</option>';
        
        $input .= "</select>";
        return $input;
    }

    /**
     * 
     */
    public function getFiles($dir)
    {
        $arr = array();
        if ($handle = opendir(get_theme_root().'/'.get_template().'/'.$dir)){
            while (false !== ($file = readdir($handle))){
                if ($file != "." && $file != "..") {
                    $arr[] = $file;
                }
            }
            closedir($handle);
        }
        return $arr;
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


