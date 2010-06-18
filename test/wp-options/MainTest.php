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
class MainTest extends PHPUnit_Framework_TestCase
{

    /**
     * Probando el método
     * @expectedException PHPUnit_Framework_Exception
     */
    public function testMetaException()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        $obj->addMetaBox('meta',true);
    }
    
    /**
     * Probando el método
     */
    public function testMeta()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        $obj->addStringOption('meta','string','String','You can store strings in this option');
        $obj->addMetaBox('meta',true);
        $this->assertTrue( $obj->hasMetaBox() );
    }
}
