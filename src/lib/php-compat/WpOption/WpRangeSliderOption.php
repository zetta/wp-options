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
    var $emptyValue = '0';


    
    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @return WpRangeSliderOption
     */
    function WpRangeSliderOption($name, $defaultValue)
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
        $name = $this->getFormName();
        $id = $this->getFormId();
        return "<div id='slider_{$id}' class='wpSliderDiv'></div>
        <script type='text/javascript'>
            $(function() {
                $('#slider_{$id}').slider({ range: true, values: [ ${value['min']}, ${value['max']} ], min : {$this->min}, max : {$this->max}, step : {$this->step}, slide: function(event, ui) {
                    $('#{$id}').val(ui.value);
                    $('#{$id}_min').val(ui.values[0]);
                    $('#{$id}_max').val(ui.values[1]);
                }});
            });
        </script>
        <input type='hidden' name='{$name}[min]' value='{$value['min']}' />
        <input type='hidden' name='{$name}[max]' value='{$value['max']}' />
        <input  id='{$id}' class='wpSliderOption' type='text' value='{$value['min']}-{$value['max']}' readonly='readonly' />";
    }
}
