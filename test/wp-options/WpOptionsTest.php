<?php
/*
 * This file is part of wp-options.
 *
 * (c) 2009-2010 Juan Carlos Clemente
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 *  unit test case.
 */
class WpOptionsTest extends PHPUnit_Framework_TestCase
{
    /**
     * Una instancia del objeto WpOptions
     * @var WpOptions
     */
    private $obj;
    
    /**
     * Setup del test, genera un nuevo objeto WpOptions
     */
    public function setUp()
    {
        $this->obj = new WpOptions(WP_VERSION, new wpdb());
    }    

    /**
     * Probando una excepción, no se puede agregar un metabox cuando tal metabox no existe
     * @expectedException WpDieException
     */
    public function testMetaException()
    {
        $this->obj->addMetaBox('meta',true);
    }
    
    /**
     * Prueba el método de agregar metaboxes
     */
    public function testMeta()
    {
        $this->obj->addStringOption('meta','string','String','You can store strings in this option');
        $this->obj->addMetaBox('meta',true);
        $this->assertTrue( $this->obj->hasMetaBox() );
    }
    
    /**
     * Prueba los metodos de wpOptions que se utilizan para subir archivos
     */
    public function testGetFileInfo()
    {
        /**
         * @var array
         * un array de prueba de como llegan los valores de los archivos a la variable $_FILES
         */
        $_FILES = array(
            'fake' => array(
               'name' => array('first' => 'firstName'),
               'type' => array('first' => 'firstType'),
               'tmp_name' => array('first' => 'firstTempName'),
               'error' => array('first' => 0),
               'size' => array('first' => 5)
            )
        );
        $file = $this->obj->getFileInfo('fake','first');
        $this->assertEquals( array(
            'name' => 'firstName',
            'type' => 'firstType',
            'tmp_name' => 'firstTempName',
            'error' => 0,
            'size' => 5
        ), $file);
        $file = $this->obj->getFileInfo('fake','foo');
        $this->assertEquals( array(
            'name' => null,
            'type' => null,
            'tmp_name' => null,
            'error' => null,
            'size' => null
        ), $file);
    }
    
    /**
     * prueba el metodo de agregar el nombre del theme
     */
    public function testGetThemeName()
    {
        $name = 'My Theme Name';
        $this->assertNull($this->obj->getThemeName());
        $this->obj->setThemeName($name);
        $this->assertEquals($name,$this->obj->getThemeName());       
    }

    /**
     * prueba el metodo de guardar/obtener el url del manual
     */
    public function testGetManualUrl()
    {
        $url = 'http://google.com';
        $this->assertNull($this->obj->getManualUrl());
        $this->obj->setManualUrl($url);
        $this->assertEquals($url,$this->obj->getManualUrl());
    }

    /**
     * prueba el metodo de guardar/obtener el url del foro
     */ 
    public function testGetForumUrl()
    {
        $url = 'http://google.com';
        $this->assertNull($this->obj->getForumUrl());
        $this->obj->setForumUrl($url);
        $this->assertEquals($url,$this->obj->getForumUrl());
    }
    
    
    
}
