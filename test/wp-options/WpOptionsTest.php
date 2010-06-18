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
    private $obj;
    public function setUp()
    {
        $this->obj = new WpOptions(WP_VERSION, new wpdb());
    }    

    /**
     * Probando el método
     * @expectedException WpDieException
     */
    public function testMetaException()
    {
        $this->obj->addMetaBox('meta',true);
    }
    
    /**
     * Probando el método
     */
    public function testMeta()
    {
        $this->obj->addStringOption('meta','string','String','You can store strings in this option');
        $this->obj->addMetaBox('meta',true);
        $this->assertTrue( $this->obj->hasMetaBox() );
    }
    
    /**
     * Test the method
     */
    public function testGetFileInfo()
    {
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
    
    public function testGetThemeName()
    {
        $name = 'My Theme Name';
        $this->assertNull($this->obj->getThemeName());
        $this->obj->setThemeName($name);
        $this->assertEquals($name,$this->obj->getThemeName());       
    }
    
    public function testGetManualUrl()
    {
        $url = 'http://google.com';
        $this->assertNull($this->obj->getManualUrl());
        $this->obj->setManualUrl($url);
        $this->assertEquals($url,$this->obj->getManualUrl());
    }
 
    public function testGetForumUrl()
    {
        $url = 'http://google.com';
        $this->assertNull($this->obj->getForumUrl());
        $this->obj->setForumUrl($url);
        $this->assertEquals($url,$this->obj->getForumUrl());
    }
    
    
    
}
