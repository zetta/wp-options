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
 * @abstract 
 */

class WpOption
{
    /**
     * Post
     * @var stdClass $post
     * @access protected
     */
    var $post;
    
    /**
     * @var string $id
     * @access protected
     */
    var $id;
    
    /**
     * De que lugar deberá extraer la información el campo
     * @access protected
     * @var int 
     */
    var $dbSource;
    
    /**
     * @var boolean
     * @access protected
     */
    var $isMultiple = false;
    
    /**
     * Nombre de la variable dentro del formulario
     * @var string|int|boolean
     * @access protected
     */
    var $name;
    
    /**
     * @var string
     * @access public
     */
    var $parent = '__root__';
    
    /**
     * El campo que se requiere tenga un valor verdadero, para que la opcion pueda ser mostrada
     * en el metabox
     * @var string
     */    
    var $require = null;
    
    /**
     * Valor por default de la opción
     * @var string|int|boolean
     * @access protected
     */
    var $defaultValue = null;
    
    /**
     * Valor previamente guardado en la base de datos
     *
     * @var string|int|boolean
     * @access protected
     */
    var $savedValue;
    
    /**
     * Titulo de la opción
     * @var string
     * @access protected
     */
    var $title;
    
    /**
     * Descripción de la opción almacenada
     *
     * @var string
     * @access protected
     */
    var $description;
    
    /**
     * Nombre del arreglo maestro que guarda los valores del formulario
     * @var string
     * @access protected
     */
    var $inputName;
    
    /**
     * Diseño con el cual se generará la vista
     * @var string
     * @access protected
     */
    var $template;
    
    /**
     * Determina si la opción aparecerá en el metabox
     *
     * @var boolean
     * @access protected
     */
    var $metabox = false;
    
    /**
     *
     * @var boolean
     * @access protected
     */
    var $hideInOptions = false;
    
    /**
     * Las diferentes opciones que puede contener una opcion
     *
     * @var mixed
     * @access protected
     */
    var $options = array();
    
    /**
     * Valor de la opcion 
     * @var mixed|string|int|boolean
     * @access protected
     */
    var $value = null;
    
    /**
     * Option Childs
     * @var mixed
     * @access protected
     */
    var $childs = array();
    
    /**
     * @var boolean
     * @access protected
     */
    var $visible = true;
    
    /**
     * @var mixex
     * @access protected
     */
    var $emptyValue = '';

    /**
     * @var string
     * @access protected
     */
    var $typeOfMetaBox = '';

    /**
     * Constructor de la clase
     *
     * @param string $name
     * @param string $defaultValue
     * @access public
     */
    function __construct($name, $defaultValue)
    {
        $this->name = $name;
        $this->defaultValue = $defaultValue;
    }
    
    /**
     * Regresa la opción para ser impresa en el formulario
     * @return  string $template
     * @access public
     */
    function __toString()
    {
        $this->title = ($this->title) ? $this->title : $this->name;
        $this->template = str_replace('%title%', $this->title, $this->template);
        $this->template = str_replace('%id%', $this->getFormId(), $this->template);
        $this->template = str_replace('%input%', $this->___toString(), $this->template);
        $this->template = str_replace('%description%', $this->description, $this->template);
        $this->template = str_replace('%visible%', (! $this->visible ? ' style="display:none;"' : ''), $this->template);
        $this->template = str_replace('%class%', ($this->parent != '__root__' ? 'child_'. $this->inputName .'_' . $this->parent : ''), $this->template);
        return $this->template;
    }
    
    /**
     * Obtiene el valor almacenado en la base de datos
     * @return string|mixed|int
     * @access protected
     */
    function getStoredValue()
    {
        if($this->dbSource == $this->Sources['OPTION'])
            return get_option($this->inputName . '_' . $this->name);
        else if($this->dbSource == $this->Sources['POST_META'])
        {
            $value = get_post_meta($this->post->ID, $this->name . '_value', true);
            return ($value) ? $value : false;
        }
        else
            wp_die(_s('Unknown WpOption Error'));
    }

    /**
     * Regresa el valor guardado o el default si no existe
     * @access public 
     */
    function getValue()
    {
        if($this->value == null)
        {
            $this->dbSource = is_null( $this->dbSource ) ?  $this->Sources['OPTION'] : $this->dbSource;
            $this->savedValue = $this->getStoredValue();
            $this->value = ($this->savedValue === false) ? $this->defaultValue : (
                ($this->savedValue) ? ($this->savedValue) : $this->emptyValue
            );
        }
        return $this->cast($this->value);
    }

    /**
     * type casting
     */
    function cast($value)
    {
        return $value;
    }

    /**
     * Obtiene el nombre que utilizará en el formulario
     * @return sttring
     * @access public
     */
    function getFormName()
    {
        if($this->dbSource == $this->Sources['OPTION'])
            return $this->inputName.'['.$this->name.']';
        else if($this->dbSource == $this->Sources['POST_META'])
            return $this->name.'_value';
        else
            return '';
    }

    /**
     * Obtiene el id que se usara en el formulario
     * @return string
     * @access public
     */
    function getFormId()
    {
        return $this->inputName . '_' . $this->name;
    }
    
    /**
     * Método que regresa el valor que se almacenará en la base de datos, 
     * dependiendo de la forma en que necesita ser guardado
     * @param int|string|mixed $value
     * @return int|string|mixed
     * @access public
     */
    function set($value)
    {
        $this->value = $value;
        return $value;
    }
 
    /**
     * Guarda el nombre de la variable que almacena el formulario completo
     * @param string $inputName
     * @access public
     */
    function setInputName($inputName)
    {
        $this->inputName = $inputName;
    }
    
    /**
     * @param string $description
     * @access public
     */
    function setDescription($description)
    {
        $this->description = $description ? '<p>' . _s($description) . '</p>' : '';
    }
    
    /**
     * @param string $template
     * @access public
     */
    function setTemplate($template)
    {
        $this->template = $template;
    }
    
    /**
     * @param string $title
     * @access public
     */
    function setTitle($title)
    {
        $this->title = _s($title);
    }
    
    /**
     * @param mixed $options
     * @access public
     */
    function setOptions($options)
    {
        $this->options = $options;
    }
    
    /**
     * Guarda la opcion metabox para que el elemento se despliege como un metabox
     * @access public
     */
    function addMetabox()
    {
        $this->metabox = true;
    }
    
    /**
     * @return boolean
     */
    function isMetaBox()
    {
        return $this->metabox;
    }
    
    /**
     * @param boolean $isMultiple
     * @access public
     */
    function setIsMultiple($isMultiple)
    {
        $this->isMultiple = $isMultiple;
    }
    
    /**
     * @return boolean
     * @access public
     */
    function getHideInOptions()
    {
        return $this->hideInOptions;
    }
    
    /**
     * @param boolean $hideInOptions
     * @access public
     */
    function setHideInOptions($hideInOptions)
    {
        $this->hideInOptions = $hideInOptions;
    }
    
    /**
     * Agrega una opcion dentro del arbol jerárquico
     *
     * @param WpOption $child
     * @access public
     */
    function addChild($child)
    {
        $this->childs[] = $child;
    }
    
    /**
     * @return mixed
     * @access public
     */
    function getChilds()
    {
        return $this->childs;
    }
    
    /**
     * @return boolean
     * @access public
     */
    function hasChilds()
    {
        return (count($this->childs) > 0) ? true : false;
    }
    
    /**
     * @return string
     * @access public
     */
    function getParent()
    {
        return $this->parent;
    }
    
    /**
     * @param string $parent
     * @access public
     */
    function setParent($parent)
    {
        $this->parent = $parent;
    }
    
    /**
     * @return string|int|boolean
     * @access public
     */
    function getName()
    {
        return $this->name;
    }
    
    /**
     * @return boolean
     * @access public
     */
    function isVisible()
    {
        return $this->visible;
    }
    
    /**
     * @param boolean $visible
     * @access public
     */
    function setVisible($visible)
    {
        $this->visible = $visible;
    }
    
    /**
     * @return string|int|boolean
     */
    function getDefaultValue()
    {
        return $this->defaultValue;
    }
    
    /**
     * @return string|int|boolean
     */
    function getSavedValue()
    {
        return $this->savedValue;
    }
    
    /**
     * @param string|int|boolean $defaultValue
     */
    function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }
    
    /**
     * @param string|int|boolean $savedValue
     */
    function setSavedValue($savedValue)
    {
        $this->savedValue = $savedValue;
    }
    
    /**
     * @param mixed|string|int|boolean $value
     */
    function setValue($value)
    {
        $this->value = $value;
    }
    
    /**
     * @param int $dbSource
     */
    function setDbSource($dbSource)
    {
        $this->dbSource = $dbSource;
    }
    
    /**
     * @var mixed
     */
     var $Sources = array(
        'OPTION' => 1, 
        'POST_META' => 2);
    
    /**
     * @param stdClass $post
     */
    function setPost($post)
    {
        $this->post = $post;
    }
    
    /**
     * @return string
     */
    function getRequire()
    {
        return $this->require;
    }
    
    /**
     * @param string $require
     */
    function setRequire($require)
    {
        $this->require = $require;
    }
    
    var $VERSION = "1.1";

    /**
     * @param string
     */
    function setTypeOfMetaBox($type)
    {
        $this->typeOfMetaBox = $type;
    }
    
    /**
     * @return string
     */
    function getTypeOfMetaBox()
    {
        return $this->typeOfMetaBox;
    }
}
