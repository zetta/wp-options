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
    protected $emptyValue = '0';
    protected $max = 0;
    protected $min = 0;
    protected $step = 1;
    
    public function setMax($max)
    {
        $this->max = $max;
    }
    
    public function setMin($min)
    {
        $this->min = $min;
    }
    
    public function setStep($step)
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
    public function WpSliderOption($name, $defaultValue)
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
        $value = $this->getValue();
        return "<div id='slider_{$this->getFormId()}' class='wpSliderDiv'></div>
       <script type='text/javascript'>
	$(function() {
		$('#slider_{$this->getFormId()}').slider({ range: 'min', value : {$value}, min : {$this->min}, max : {$this->max}, step : {$this->step}, slide: function(event, ui) {
				$('#{$this->getFormId()}').val(ui.value);
			} });
	});
	</script>
            <input  id='{$this->getFormId()}' class='wpSliderOption' type='text' name='{$this->getFormName()}' value='{$value}' readonly='readonly' />";
    }
}
