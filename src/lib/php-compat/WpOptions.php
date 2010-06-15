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

/**
 * WpOptions
 */
require_once 'WpOption.php';

class WpOptions
{
    
    /**
     * Where the plugin are located
     * @var string $pluginLocation
     * @access private
     */
    var $themeLocation;
    
    /**
     * Determina si se han dado de alta campos para mostrarse
     * en el metabox
     *
     * @var boolean $hasMetaBoxData
     */
    var $hasMetaBoxData = false;
    
    /**
     * File Location
     *
     * @var string
     * @access private
     */
    var $file;
    
    /**
     * @var strin $basename
     * @access private
     */
    var $basename;
    
    /**
     * Theme Name
     * @var string $themeName
     * @access private
     */
    var $themeName;
    
    /**
     * BaseThemeName
     * @var string
     * @access private
     */
    var $baseThemeName;
    
    /**
     * Options Container
     * @var mixed $options
     * @access private
     */
    var $options = array();
    
    /**
     * MetabOx Options Container
     * @var mixed $options
     * @access private
     */
    var $optionsInMetaBox = array();
    /**
     * Contenido 
     * @var string $content
     * @access private
     */
    var $content = "\n\n<!-- wp-options Generator v1 -->\n\n\t\t";
    
    /**
     * Hojas de estilo utilizadas
     * @var mixed $css
     * @access private
     */
    var $css = array();
    
    /**
     * Version utilizada de Wordpress
     *
     * @var float
     * @access private
     */
    var $wpVersion = 0;
    
    /**
     * @var wpdb
     * @access private
     */
    var $wpdb;
    
    /**
     * Indica si las opciones del tema han sido actualizadas
     * @var boolean
     * @access priate
     */
    var $updated = false;
    
    /**
     * @var string $forumUrl
     * @access private
     */
    var $forumUrl = '';
    
    /**
     * @var string $manualUrl
     * @access private
     */
    var $manualUrl = '';
    
    /**
     * @var array $subpages
     * @access private
     */
    var $subpages = array();
    
    /**
     * @var string $menuIcon
     * @access private
     */
    var $menuIcon = null;
    
    /**
     * Instancía el objeto WpOptions
     *
     * @param float $wpVersion
     * @param wpdb $wpdb
     * @param string $menuIcon
     * @return WpOptions WpOptions
     * @access public
     */
    function WpOptions($wpVersion, $wpdb, $menuIcon = null)
    {
        $this->wpVersion = $wpVersion;
        $this->wpdb = $wpdb;
        $this->file = __FILE__;
        $this->menuIcon = $menuIcon;
        $this->themeLocation = get_bloginfo('template_directory');
    }
    
    /**
     * Determina si se han dado de alta campos para mostrarse
     * en el metabox
     *
     * @return Boolean
     */
    function hasMetaBox()
    {
        return $this->hasMetaBoxData;
    }
    
    /**
     * Agrega la página de opciones en el administrador y la funcion del metabox si es necesaria
     * @access public
     */
    function addOptionsPage()
    {
        if(function_exists(add_object_page))
        {
            add_object_page(_s('Configure ') . $this->themeName, $this->themeName, 8, basename(__FILE__),  $this->getFunctionScope('render'),  $this->menuIcon);
        }
        else
        {
            add_menu_page(_s('Configure ') . $this->themeName, $this->themeName, 8, basename(__FILE__),  $this->getFunctionScope('render'),  $this->menuIcon);
        }
        
        foreach($this->subpages as $sub)
        {
            add_submenu_page(basename(__FILE__), _s($sub['pageTitle']), _s($sub['title']), 8, $sub['slug'], $sub['function']);
        }
        
        if ($this->hasMetaBox())
        {
            add_meta_box('new-meta-boxes', $this->themeName . ' :: '._s("Post Settings").'', $this->getFunctionScope('renderMetaBox'), 'post', 'normal', 'high');
            add_action('save_post', $this->getFunctionScope('savePostData'));
        }
    }
    
    /**
     * Agrega los css y js
     */
    function addMetaData()
    {
        echo "<script type='text/javascript' src='{$this->themeLocation}/lib/js/jquery-1.4.2.min.js'></script>\n";
        echo "<script type='text/javascript' src='{$this->themeLocation}/lib/js/jquery-ui-1.8.2.custom.min.js'></script>\n";
        echo "<script type='text/javascript' src='{$this->themeLocation}/lib/js/colorpicker.js'></script>\n";
        echo "<script type='text/javascript' src='{$this->themeLocation}/lib/js/actions.js'></script>\n";
        $this->addCSS('jquery-ui-1.8.2.custom');
        $this->addCSS('colorpicker');
        $this->includeStyles();
    }
    
    /**
     * Para aquello del callback, esta function no deberia existir, pero no me gusta como se formatea mi código
     * con el ZendStuio cuando utilizo arrays tan pequeños... pero ya ni modo =P 
     *
     * @param string $funcName
     * @return mixed
     * @access private
     */
    function getFunctionScope($funcName)
    {
        return array($this, $funcName);
    }
    
    /**
     * Add a subpage
     * @param string $pageTitle
     * @param string title
     * @param string $slug
     * @param string $function
     **/
    function addSubPage($pageTitle,$title,$slug,$function)
    {
        $this->subpages[] = array(
            'title' => $title,
            'pageTitle' => $pageTitle,
            'slug' => $slug,
            'function' => $function
        );
    }
    
    /**
     * Agrega un titulo a las opciones
     *
     * @param string $title
     * @access public
     */
    function addTitle($title)
    {
        require_once 'WpOption/WpOptionTitle.php';
        $title = new WpOptionTitle($title);
        $this->options[] = $title;
    }
    
    /**
     * Agrega un metabox en la pagina de post
     * @param string $metaBoxName Tiene que ser un nombre de opcion previamente creado
     * @param boolean $hideInOptionsPage Si es verdadero la opcion solo se mostrará en el metabox y se ocultará en la
     *        página de opciones, en caso contrario se mostrará en ambas
     * @access public
     */
    function addMetaBox($metaBoxName, $hideInOptionsPage = true)
    {
        if(! isset($this->options[$metaBoxName]))
            wp_die(_s("Can't add new Metabox if the option").' <strong>'.$metaBoxName.'</strong> '._s("doesn't exist"));
        
        $this->options[$metaBoxName]->addMetabox();
        $this->options[$metaBoxName]->setHideInOptions($hideInOptionsPage);
        $this->hasMetaBoxData = true;
        $this->optionsInMetaBox[] = $this->options[$metaBoxName];
    }
    
    /**
     * Agrega un metabox en la pagina de post
     * @param mixed $metaBoxName Arreglo con los nombres de las opciones previamente creadas
     * @param boolean $hideInOptionsPage Si es verdadero la opcion solo se mostrará en el metabox y se ocultará en la
     *        página de opciones, en caso contrario se mostrará en ambas
     * @access public
     */
    function addMetaBoxes($metaBoxNames, $hideInOptionsPage = true)
    {
        foreach($metaBoxNames as $metaBoxName)
        {
            
            if(! isset($this->options[$metaBoxName]))
                wp_die(_s("Can't add new Metabox if the option").' <strong>'.$metaBoxName.'</strong> '._s("doesn't exist"));
            
            $this->options[$metaBoxName]->addMetabox();
            $this->options[$metaBoxName]->setHideInOptions($hideInOptionsPage);
            $this->optionsInMetaBox[] = $this->options[$metaBoxName];
        }
        $this->hasMetaBoxData = true;
    }
    
    /**
     * Agrega un metabox en la pagina de post con un campo que condiciona si este se mostrará o no
     *
     * @param string $metaBoxName El nombre de una opción previamente almacenada
     * @param string $condition El nombre de una opción previamente almacenada
     * @param boolean $hideInOptionsPage
     * @access public
     */
    function addConditionalMetaBox($metaBoxName, $condition, $hideInOptionsPage = true)
    {
        if(! isset($this->options[$metaBoxName]))
            wp_die(_s("Can't add new Metabox if the option").' <strong>'.$metaBoxName.'</strong> '._s("doesn't exist"));
        
        if(! isset($this->options[$condition]))
            wp_die(_s("Can't add new Metabox if the option").' <strong>'.$condition.'</strong> '._s("doesn't exist"));
        
        if(get_class($this->options[$condition]) != 'wpcheckoption')
            wp_die(_s("Can't add ConditionalMetaBoxes if the Option").' <strong>'.$condition.'</strong> '._s("isn't a WpCheckOption Option"));
        
        $this->options[$metaBoxName]->addMetabox();
        $this->options[$metaBoxName]->setHideInOptions($hideInOptionsPage);
        $this->optionsInMetaBox[] = $this->options[$metaBoxName];
        $this->hasMetaBoxData = true;
        $this->options[$metaBoxName]->setRequire($condition);
    }
    
    /**
     * Agrega una condición a algunas opciones previamente almacenadas
     *
     * @param string $condition El nombre de una opción previamente almacenada
     * @param mixed $options
     * @access public
     */
    function setConditionalOptions($condition, $options)
    {
        if(! isset($this->options[$condition]))
            wp_die(_s("Can't add ConditionalOptions if the option").' <strong>'.$condition.'</strong> '._s("doesn't exist"));
        
        if(! isset($this->options[$condition]))
            wp_die(_s("Can't add new Metabox if the option").' <strong>'.$condition.'</strong> '._s("doesn't exist"));
        
        if(get_class($this->options[$condition]) != 'wpcheckoption')
            wp_die(_s("Can't add ConditionalOptions if the Option").' <strong>'.$condition.'</strong> '._s("isn't a WpCheckOption Option"));
        
        foreach($options as $option)
        {
            if(! isset($this->options[$option]))
                wp_die(_s("Can't add ConditionalOptions if the option").' <strong>'.$option.'</strong> '._s("doesn't exist"));
            $this->options[$option]->setParent($condition);
            $this->options[$condition]->addChild($this->options[$option]);
        }
    }
    
    /**
     * Agrega una opción de tipo String (input)
     *
     * @param string $name
     * @param string $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addStringOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpStringOption.php';
        $spigaOption = new WpStringOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción de tipo String (textarea)
     *
     * @param string $name
     * @param string $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addTextOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpTextOption.php';
        $spigaOption = new WpTextOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción de tipo Boleano (input - radio [2 opciones])
     *
     * @param string $name
     * @param boolean $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addBooleanOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpBooleanOption.php';
        $spigaOption = new WpBooleanOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción de tipo Entero (input)
     *
     * @param string $name
     * @param int $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addNumberOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpNumberOption.php';
        $spigaOption = new WpNumberOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción multiple (input - radio [x opciones])
     *
     * @param string $name
     * @param mixed $options Array asociativo con los valores a mostrar
     * @param string|int|boolean $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @param boolean [optional] $onePerLine (si deseamos que se muestre cada opcion en una linea diferente
     * @access public
     */
    function addRadioOption($name, $options, $defaultValue, $title = '', $description = '', $onePerLine = true)
    {
        require_once 'WpOption/WpRadioOption.php';
        $spigaOption = new WpRadioOption($name, $defaultValue, $onePerLine);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setOptions($options);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción multiple (input - checkbox [x opciones])
     *
     * @param string $name
     * @param mixed $selectedValues
     * @param mixed $options Array asociativo con los valores a mostrar
     * @param string [optional] $title
     * @param string [optional] $description
     * @param boolean [optional] $onePerLine (si deseamos que se muestre cada opcion en una linea diferente
     * @access public
     */
    function addCheckBoxOption($name, $options, $selectedValues, $title = '', $description = '', $onePerLine = true)
    {
        require_once 'WpOption/WpCheckBoxOption.php';
        $spigaOption = new WpCheckBoxOption($name, $selectedValues, $onePerLine);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setOptions($options);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción de tipo checkbox que regresa un boleano
     *
     * @param string $name
     * @param mixed $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addCheckOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpCheckOption.php';
        $spigaOption = new WpCheckOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega un dropdown/pulldown/combobox como quieras llamarle
     *
     * @param string $name
     * @param int|string $selectedValue
     * @param mixed $options Array asociativo con los valores a mostrar
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addSelectOption($name, $options, $selectedValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpSelectOption.php';
        $spigaOption = new WpSelectOption($name, $selectedValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setOptions($options);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega un dropdown/pulldown/combobox como quieras llamarle de selección múltiple
     *
     * @param string $name
     * @param mixed $selectedValues
     * @param mixed $options Array asociativo con los valores a mostrar
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addMultipleSelectOption($name, $options, $selectedValues, $title = '', $description = '')
    {
        require_once 'WpOption/WpMultipleSelectOption.php';
        $spigaOption = new WpMultipleSelectOption($name, $selectedValues);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setOptions($options);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega un dropdown/pulldown/combobox que lista las categorias
     *
     * @param string $name
     * @param int|mixed [optional] $selectedValue Si el campo será de opción multiple, 
     *   se necesita enviar un arreglo en caso contrario se envia un entero
     * @param boolean [optional] $isMultiple 
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addSelectCategoriesOption($name, $selectedValue = 0, $isMultiple = false, $title = '', $description = '')
    {
        require_once 'WpOption/WpSelectCategoriesOption.php';
        $spigaOption = new WpSelectCategoriesOption($name, $selectedValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setIsMultiple($isMultiple);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega un dropdown/pulldown/combobox que lista las páginas
     *
     * @param string $name
     * @param int|mixed [optional] $selectedValue Si el campo será de opción multiple, 
     *   se necesita enviar un arreglo en caso contrario se envia un entero
     * @param boolean [optional] $isMultiple 
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addSelectPagesOption($name, $selectedValue = 0, $isMultiple = false, $title = '', $description = '')
    {
        require_once 'WpOption/WpSelectPagesOption.php';
        $spigaOption = new WpSelectPagesOption($name, $selectedValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setIsMultiple($isMultiple);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega un dropdown/pulldown/combobox que lista los usuarios del blog
     *
     * @param string $name
     * @param int|mixed [optional] $selectedValue Si el campo será de opción multiple, 
     *   se necesita enviar un arreglo en caso contrario se envia un entero
     * @param boolean [optional] $isMultiple 
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addSelectUsersOption($name, $selectedValue = 0, $isMultiple = false, $title = '', $description = '')
    {
        require_once 'WpOption/WpSelectUsersOption.php';
        $spigaOption = new WpSelectUsersOption($name, $selectedValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setIsMultiple($isMultiple);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega un dropdown/pulldown/combobox que lista los tags
     *
     * @param string $name
     * @param int|mixed [optional] $selectedValue Si el campo será de opción multiple, 
     *   se necesita enviar un arreglo en caso contrario se envia un entero
     * @param boolean [optional] $isMultiple 
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addSelectTagsOption($name, $selectedValue = 0, $isMultiple = false, $title = '', $description = '')
    {
        require_once 'WpOption/WpSelectTagsOption.php';
        $spigaOption = new WpSelectTagsOption($name, $selectedValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $spigaOption->setIsMultiple($isMultiple);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción de tipo DatePicker (input)
     *
     * @param string $name
     * @param string $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addDatePickerOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpDatePickerOption.php';
        $spigaOption = new WpDatePickerOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Agrega una opción de tipo ColorPicker (input)
     *
     * @param string $name
     * @param string $defaultValue
     * @param string [optional] $title
     * @param string [optional] $description
     * @access public
     */
    function addColorPickerOption($name, $defaultValue, $title = '', $description = '')
    {
        require_once 'WpOption/WpColorPickerOption.php';
        $spigaOption = new WpColorPickerOption($name, $defaultValue);
        $spigaOption->setTitle($title);
        $spigaOption->setDescription($description);
        $this->options[$name] = $spigaOption;
    }
    
    /**
     * Envia a pantalla el método __toString y además checa los cambios que se realizaron en los valores
     * @access public
     */
    function render()
    {
        $this->saveTemplates();
        $this->updateOptions();
        echo $this->__toString();
    }
    
    /**
     * Genera el formulario (metabox) de las opciones agregadas
     * @access public
     */
    function renderMetaBox()
    {
        global $post;
        $this->saveTemplates();
        $fields = '';
        foreach($this->optionsInMetaBox as $option)
        {
            if($option->getRequire() != null)
            {
                $this->options[$option->getRequire()]->setInputName($this->getCamelCase('wp_options') . '_' . $this->baseThemeName);
                $this->options[$option->getRequire()]->setDbSource($option->Sources['OPTION']);
                if($this->options[$option->getRequire()]->getValue() == false)
                    continue;
            }
            $option->setDbSource($option->Sources['POST_META']);
            $option->setTemplate($this->templateOption);
            $option->setDefaultValue('');
            $option->setValue('');
            $option->setPost($post);
            $fields .= $option->__toString();
        }
        $this->templateLayoutMetaBox = str_replace('%fields%', $fields, $this->templateLayoutMetaBox);
        echo $this->templateLayoutMetaBox;
    }
    
    /**
     * Guarda la metadata del post, (metabox)
     * @param int $idPost
     * @access public
     */
    function savePostData($idPost)
    {
        if(isset($_POST['post_type']) && $_POST['post_type'] == 'page')
            if(! current_user_can('edit_page', $idPost))
                wp_die(_s("You don't have permission to edit this page"));
            else if(! current_user_can('edit_post', $idPost))
                wp_die(_s("You don't have permission to edit this post"));
        
        foreach($this->optionsInMetaBox as $option)
        {
            $option->setDbSource($option->Sources['POST_META']);
            $option->setInputName($this->getCamelCase('wp_options') . '_' . $this->baseThemeName);
            $option->setDefaultValue('');
            $option->setValue('');
            if(is_array($_POST[$option->getFormName()]))
                $data = $_POST[$option->getFormName()];
            else
                $data = (get_magic_quotes_gpc()) ? stripslashes($_POST[$option->getFormName()]) : $_POST[$option->getFormName()]; 
            $data = $option->set($data);
            
            if(get_post_meta($idPost, $option->getName() . '_value') == "")
                add_post_meta($idPost, $option->getName() . '_value', $data, true);
            elseif($data != get_post_meta($idPost, $option->getName() . '_value', true))
                update_post_meta($idPost, $option->getName() . '_value', $data);
            elseif($data == "")
                delete_post_meta($idPost, $option->getName() . '_value', get_post_meta($idPost, $option->getName() . '_value', true));
        }
    }
    
    /**
     * Muestra la pagina de opciones
     * @return string
     * @access public
     */
    function __toString()
    {
        $this->addContent("<script type='text/javascript' src='{$this->themeLocation}/lib/js/jquery-1.4.2.min.js'></script>\n");
        $this->addContent("<script type='text/javascript' src='{$this->themeLocation}/lib/js/jquery-ui-1.8.2.custom.min.js'></script>\n");
        $this->addContent("<script type='text/javascript' src='{$this->themeLocation}/lib/js/colorpicker.js'></script>\n");
        $this->addContent("<script type='text/javascript' src='{$this->themeLocation}/lib/js/actions.js'></script>\n");
        $this->addCSS('jquery-ui-1.8.2.custom');
        $this->addCSS('colorpicker');
        
        if(count($this->css) > 0)
            $this->includeStyles();
        
        $fields = $this->getChilds($this->options, '__root__');
        $this->templateLayout = str_replace('%fields%', $fields, $this->templateLayout);
        $this->templateLayout = str_replace('%updatedMessage%', ($this->updated ? "<div class='updated'><p><strong>" . _s('Updated Options') . "</strong></p></div>\n" : ''), $this->templateLayout);
        $this->addContent($this->templateLayout);
        return $this->content;
    }
    
    /**
     * Muesta las opciones que son dependientes de una opción
     *
     * @param mixed $options
     * @param string $parentName
     * @return string
     * @access private
     */
    function getChilds($options, $parentName)
    {
        $fields = '';
        foreach($options as $option)
        {
            if(is_subclass_of($option, 'WpOption'))
            {
                if($option->getHideInOptions())
                    continue;
                if($option->getParent() != $parentName)
                    continue;
                
                $option->setInputName($this->getCamelCase('wp_options') . '_' . $this->baseThemeName);
                $option->setTemplate($this->templateOption);
                $option->setDbSource($option->Sources['OPTION']);
                if($parentName != '__root__' && $this->options[$parentName]->getValue() == false)
                    $option->setVisible(false);
            }
            if(get_class($option) == 'wpoptiontitle')
                $option->setTemplate($this->templateHeader);
            $fields .= $option->__toString();
            
            if(is_subclass_of($option, 'WpOption') && $option->hasChilds())
                $fields .= $this->getChilds($option->getChilds(), $option->getName());
        }
        return $fields;
    }
    
    /**
     * Guarda los nuevos valores del plugin
     * dependiendo de la interaccion del usuario
     * @access public
     */
    function updateOptions()
    {
        if(isset($_POST['post']) && $_POST['post'] == 'updateWpOptions')
        {
            $prefix = $this->getCamelCase('wp_options') . '_' . $this->baseThemeName;
            foreach($this->options as $optionName => $option)
            {
                if(is_subclass_of($option, 'WpOption'))
                {
                    $value = (is_string($_POST[$prefix][$optionName])) ? stripslashes($_POST[$prefix][$optionName]) : $_POST[$prefix][$optionName];
                    $this->setOptionValue($optionName, $value);
                }
            }
            $this->updated = true;
        }
        if(isset($_POST['post']) && $_POST['post'] == 'deleteWpOptions')
        {
            foreach($this->options as $optionName => $option)
            {
                if(is_subclass_of($option, 'WpOption'))
                {
                    delete_option($this->getCamelCase('wp_options') . '_' . $this->baseThemeName .'_' . $optionName);
                }
            }
            if(version_compare(get_bloginfo('version'),'3.0.0','<'))
            {
                update_option('current_theme', 'default');
                update_option('template', 'default');
                update_option('stylesheet', 'default');
                do_action('switch_theme', 'Default');
            }else
            {
                update_option('current_theme', 'twentyten');
                update_option('template', 'twentyten');
                update_option('stylesheet', 'twentyten');
                do_action('switch_theme', 'Twentyten');
            }
            print '<meta http-equiv="refresh" content="0;URL=themes.php?activated=true">';
            echo "<script> self.location('themes.php?activated=true');</script>";
            exit();
        }
    }
    
    /**
     * Regresa el valor de una opción almacenada
     * @access public
     */
    function getOption($optionName)
    {
        if(! isset($this->options[$optionName]))
            wp_die(_s("The option").' <strong>'.$optionName.'</strong> '._s("doesn't exist"));
        $this->options[$optionName]->setInputName($this->getCamelCase('wp_options') . '_' . $this->baseThemeName);
        return $this->options[$optionName]->getValue();
    }
    
    /**
     * Regresa el valor de una opción almacenada en el post
     * @access public
     */
    function getPostOption($optionName)
    {
        global $post;
        if (! isset($this->options[$optionName]))
            wp_die(_s("The option").' <strong>'.$optionName.'</strong> '._s("doesn't exist"));
        $option = $this->options[$optionName];
        $this->options[$optionName]->setInputName($this->getCamelCase('wp_options') . '_' . $this->baseThemeName);
        $this->options[$optionName]->setPost($post);
        //$meta = $::$Sources['POST_META'];
        $this->options[$optionName]->setDbSource( $option->Sources['POST_META'] );
        return $this->options[$optionName]->getStoredValue();
        
    }
    
    /**
     * Guarda el valor a una opción
     * @param string $optionName
     * @param mixed $value
     */
    function setOptionValue($optionName, $value)
    {
        if (! isset($this->options[$optionName]))
           wp_die(_s("The option").' <strong>'.$optionName.'</strong> '._s("doesn't exist"));
        $prefix = $this->getCamelCase('wp_options');
        $this->options[$optionName]->setInputName($this->getCamelCase('wp_options') . '_' . $this->baseThemeName);
        $this->options[$optionName]->set($value);
        update_option($prefix . '_' . $this->baseThemeName .'_' . $optionName, $this->options[$optionName]->set( $value ));
    }
    
    /**    
     * Genera los tags para agregar las hojas de estilo
     * @access private
     */
    function includeStyles()
    {
        foreach($this->css as $css)
        {
            echo "<link rel='stylesheet' href='{$this->themeLocation}/lib/css/{$css}.css' type='text/css' media='all' />";
        }
    }
    
    /**
     * CSS filePath
     * @param string $css
     * @access public
     */
    function addCSS($css)
    {
        array_push($this->css, $css);
    }
    
    /**
     * @return string
     * @access public
     */
    function getThemeName()
    {
        return $this->themeName;
    }
    
    /**
     * @param string $themeName
     * @access public
     */
    function setThemeName($themeName)
    {
        $this->themeName = $themeName;
        $this->baseThemeName = ereg_replace("[^A-Za-z0-9\\_\\ ]", "", $themeName);
    }
    
    /**
     * @param string $themeLocation
     * @access public
     * @deprecated
     */
    function setThemeLocation($themeLocation)
    {
        $this->themeLocation = get_bloginfo('siteurl') . $themeLocation;
    }
    
    /**
     * Agrega contenido a la vista
     *
     * @param string $content
     * @access private
     */
    function addContent($content)
    {
        $this->content .= $content;
    }
    
    /**
     * Regresa el CamelCase de una cadena de caracteres separada por guion bajo 
     *
     * @param string $string
     * @param boolean $first
     * @param boolean $preserve
     * @return string
     * @access private
     */
    function getCamelCase($string, $first = false, $preserve = false)
    {
        $string = str_replace(" ", '_', $string);
        $array = explode('_', $string);
        $string = '';
        foreach($array as $i => $segment)
        {
            if(! $preserve)
                $segment = strtolower($segment);
            if($i || $first)
                $segment = ucfirst($segment);
            $string .= $segment;
        }
        return $string;
    }
    
    /**
     * @return string
     * @access public
     */
    function getForumUrl()
    {
        return $this->forumUrl;
    }
    
    /**
     * @return string
     * @access public
     */
    function getManualUrl()
    {
        return $this->manualUrl;
    }
    
    /**
     * @param string $forumUrl
     * @access public
     */
    function setForumUrl($forumUrl)
    {
        $this->forumUrl = $forumUrl;
    }
    
    /**
     * @param string $manualUrl
     * @access public
     */
    function setManualUrl($manualUrl)
    {
        $this->manualUrl = $manualUrl;
    }
    
    /**
     * Variable que almacena el layout de las opciones en el formulario
     * @var string
     * @access private
     */
    var $templateOption = "";
    
    /**
     * Variable que almacena el layout de las opciones que se 'wrappean' en el formulario
     * @var string
     * @access private
     */
    var $templateWrappedOption = "";

    /**
     * Variable que almacena el layout para el diseño de los headers
     * @var string
     * @access private
     */
    var $templateHeader = "";
    
    /**
     * Variable que almacena el layout para el diseño en general
     * @var string
     * @access private
     */
    var $templateLayout = '';
    
    /**
     * El diseño del metabox
     *
     * @var string
     * @access private
     */
    var $templateLayoutMetaBox = '';
    
    /**
     * Guarda el template a utilizar en los headers
     * @access private
     */
    function saveTemplates()
    {
        $this->templateHeader = <<<TPL

            <tr valign="top">
                <th colspan="2">
                    %title%
                </th>
            </tr>    
TPL;
        $this->templateOption = <<<TPL

            <tr%visible% class="%class%">
                <td class="option-title"><label for="%id%">%title%</label></td>
                <td class="%id%">%input% %description%</td>
            </tr>
TPL;
        $this->templateLayout = <<<TPL

            <div class="wrap">
                <div class="icon32" id="icon-tools"><br /></div>
                <a href="http://storelicious.com" title="Premium WordPress Themes" id="storelicious_logo"><img src="{$this->themeLocation}/lib/pix/brandstorelicious.gif" alt="Storelicious" /> </a>
                <h2>Welcome to configuration page of <strong>{$this->themeName}</strong>!</h2>
                %updatedMessage%
                
                <form action=""" method="post">
                
                 <div class="info">
                       <input name="save" class="button-primary floatRight" type="submit" value="Save changes" />
                          <strong>Stuck on these options?</strong> <a href="{$this->manualUrl}" target="_blank">Read The Documentation Here</a> or 
                          <a href="{$this->forumUrl}" target="blank">Visit Our Support Forum</a>
                </div>
                
                    <input type="hidden" name="post" value="updateWpOptions">
                    <table class="widefat" id="storelicious">
                        <thead><tr><th colspan="2">{$this->themeName}</th></tr></thead>
                        <tfoot>
                            <tr>
                                <th>End Storelicious Options</th>
                                <th align="right"><a href='#storelicious'>Back to top</a></th>
                            </tr>
                        </tfoot>
                        <tbody>%fields%</tbody>                            
                    </table>
                    <p class="submit"><input type="submit" class="button-primary" value="Save changes" />
                </form>
                <h2>Delete Theme options</h2>
                <p>To completely remove these theme options from your database (reminder: they are all stored in Wordpress options table <em>{$this->wpdb->options}</em>), click on
                the following button. You will be then redirected to the <a href="themes.php">Themes admin interface</a> and the Default theme will have been activated.</p>
                <p><strong>Special notice for people allowing their readers to change theme</strong> (i.e. using a Theme Switcher on their blog)<br/>
                Unless you really remove the theme files from your server, this theme will still be available to users, and therefore will self-install again as soon as someone selects it. Also, all custom variables as defined in the above menu will be blank, this could lead to unexpected behaviour.
                Press "Delete" only if you intend to remove the theme files right after this.</p>
                <form action="" method="post">
                    <input type="hidden" name="post" value="deleteWpOptions" />
                    <p class="submit"><input type="submit" value="Delete Options" onclick="return confirm('Are you really sure you want to delete ?');"/></p>
                </form>
            </div>
TPL;
        
        $this->templateLayoutMetaBox = <<<TPL
        
                <table class="widefat" id="storelicious_metabox">
                    <tbody>
                        %fields%
                    </tbody>                            
                </table>
TPL;
}

}


















