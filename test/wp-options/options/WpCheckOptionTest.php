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
class WpCheckOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addCheckOption('check',true,'Check','You can store booleans(single checkbox) in this option');
        $this->assertTrue($obj->getOption('check')); 
        
        $obj->setOptionValue('check',false);
        $this->assertFalse($obj->getOption('check')); 
    }
}
