<?php
// TODO delete this file
global $pagenow;

/**
 * No Remover esto, porque de otra forma la variable $wpOptions se pierde ¬¬
 * puesto que dentro de los archivos del template el scope es diferente
 * o.O!!! Damn Wp!
 * por lo tanto:::
 * @example <code>
 * //Retornará el valor guardado en la opción 'string'
 * echo getWpThemeOption('string'); 
 * </code>
 * @param string $optionName Nombre de la opcion
 * @param int|string $index
 * @return WpOptions $wpOptions by Reference
 */
function &getWpThemeOption($optionName,$index = null)
{
    global $wpOptions;
    $val = $wpOptions->getOption($optionName);
    return is_null($index) ? $val : (
        !is_array($val) ? $val : (
            isset($val[$index]) ? $val[$index] : $val
        )
    );
}

/**
 * main action
 */
add_action('admin_menu', array($wpOptions, 'addOptionsPage'));
//$wpOptions->addOptionsPage();

//

/**
 * Javascript and css just when options page is current
 */
if (($pagenow == 'admin.php') && ($_GET['page'] == 'WpOptions.php'))
{
    add_action('admin_head', array($wpOptions, 'addMetaData'));
}

/**
 * settea el valor de una opción 
 * @param string $optionName
 * @param mixed $optionValue
 * @return WpOptions $wpOptions
 */
function &setWpThemeOption($optionName, $optionValue)
{
    global $wpOptions;
    $wpOptions->setOptionValue($optionName,$optionValue);
    return $wpOptions;
}


/** 
 * function for debugging
 */
function wp_debug_backtrace()
{
    echo '<pre>';
    foreach(debug_backtrace() as $id => $trace)
    {
        $a = array();
        foreach($trace['args'] as $arg)
            $a[] = (string) $arg;
        $args = implode(',',$a);
        if(isset($trace['file']))
            echo "#{$id} {$trace['file']} ({$trace['line']}) {$trace['function']}($args)\n";
        else
            echo "#{$id} {$trace['class']} {".get_class($trace['object'])."} {$trace['function']}($args)\n";
    }
    echo '</pre>';
}

