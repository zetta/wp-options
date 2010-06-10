<?php

global $pagenow;

/**
 * No Remover esto, porque de otra forma la variable $wpOptions se pierde ��
 * puesto que dentro de los archivos del template el scope es diferente
 * o.O!!! Damn Wp!
 * por lo tanto:::
 * @example <code>
 * //Retornar� el valor guardado en la opci�n 'string'
 * echo getWpThemeOption('string'); 
 * </code>
 * @param string $optionName Nombre de la opcion
 * @return WpOptions $wpOptions by Reference
 */
function &getWpThemeOption($optionName)
{
    global $wpOptions;
    return $wpOptions->getOption($optionName);
}

/**
 * main action
 */
add_action('admin_menu', array($wpOptions, 'addOptionsPage'));

/**
 * Javascript and css just when options page is current
 */
if (($pagenow == 'admin.php') && ($_GET['page'] == 'WpOptions.php'))
{
    add_action('admin_head', array($wpOptions, 'addMetaData'));
}
/**
 * settea el valor de una opci�n 
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
