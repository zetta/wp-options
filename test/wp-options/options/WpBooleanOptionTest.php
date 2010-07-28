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
class WpBooleanOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addBooleanOption('boolean',9,'Boolean','You can store boleans in this option');
        $this->assertNotEquals(9, $obj->getOption('boolean')); // el 9 guardado debe intepretarse como boolean
        $this->assertTrue($obj->getOption('boolean'));
        
        $obj->setOptionValue('boolean',3);
        $this->assertNotEquals( 3, $obj->getOption('boolean'));
        $this->assertTrue($obj->getOption('boolean'));
        
        $obj->setOptionValue('boolean',false);
        $this->assertFalse($obj->getOption('boolean'));
    }
}
