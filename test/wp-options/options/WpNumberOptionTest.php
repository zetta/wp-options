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
class WpNumberOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addNumberOption('number',9,'Number','You can store numbers in this option');
        $this->assertEquals(9, $obj->getOption('number'));
        
        $obj->setOptionValue('number',3);
        $this->assertEquals( 3, $obj->getOption('number'));
    }
}
