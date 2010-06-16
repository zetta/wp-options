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

require_once 'WpSliderOption.php';

class WpRangeSliderOption extends WpSliderOption
{
    protected $emptyValue = '0';


    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpRangeSliderOption
     */
    public function WpRangeSliderOption($name, $defaultValue)
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
                $('#slider_{$this->getFormId()}').slider({ range: true, values: [ ${value['min']}, ${value['max']} ], min : {$this->min}, max : {$this->max}, step : {$this->step}, slide: function(event, ui) {
                    $('#{$this->getFormId()}').val(ui.values[0]+'-'+ui.values[1]);
                    $('#{$this->getFormId()}_min').val(ui.values[0]);
                    $('#{$this->getFormId()}_max').val(ui.values[1]);
                }});
            });
        </script>
        <input id='{$this->getFormId()}_min' type='hidden' name='{$this->getFormName()}[min]' value='{$value['min']}' />
        <input id='{$this->getFormId()}_max' type='hidden' name='{$this->getFormName()}[max]' value='{$value['max']}' />
       <input  id='{$this->getFormId()}' class='wpSliderOption' type='text' value='{$value['min']}-{$value['max']}' readonly='readonly' />";
    }
}
