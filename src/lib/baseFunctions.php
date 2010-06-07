<?php



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
 * @return WpOptions $wpOptions by Reference
 */
function &getWpThemeOption($optionName){
    global $wpOptions;
    return $wpOptions->getOption($optionName);
}

add_action('admin_menu', array($wpOptions, 'addOptionsPage'));

/**
 *  localization function 
 */
function _s($string, $namespace = 'storelicious')
{
    return __($string,$namespace);
}

