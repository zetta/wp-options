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

class WpSliderOption extends WpOption
{
    var $emptyValue = '0';
    var $max = 0;
    var $min = 0;
    var $step = 1;
    
    function setMax($max)
    {
        $this->max = $max;
    }
    
    function setMin($min)
    {
        $this->min = $min;
    }
    
    function setStep($step)
    {
        $this->step = $step;
    }
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpColorPickerOption
     */
    function WpSliderOption($name, $defaultValue)
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
        $value = $this->getValue();
        echo var_dump( $value );
        $name = $this->getFormName();
        $id = $this->getFormId();
        return "<div id='slider_{$id}' class='wpSliderDiv'></div>
       <script type='text/javascript'>
	$(function() {
		$('#slider_{$id}').slider({ range: 'min', value : {$value}, min : {$this->min}, max : {$this->max}, step : {$this->step}, slide: function(event, ui) {
				$('#{$id}').val(ui.value);
			} });
	});
	</script>
            <input  id='{$id}' class='wpSliderOption' type='text' name='{$name}' value='{$value}' readonly='readonly' />";
    }
    
    
}
