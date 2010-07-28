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
class WpStringOptionTest extends PHPUnit_Framework_TestCase
{

    const FIRST_VALUE = 'this is the default string...';
    const SECOND_VALUE = 'other string';

    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addStringOption('string',self::FIRST_VALUE,'String','You can store strings in this option');
        $this->assertEquals( self::FIRST_VALUE, $obj->getOption('string'));
        
        $obj->setOptionValue('string',self::SECOND_VALUE);
        $this->assertEquals( self::SECOND_VALUE, $obj->getOption('string'));
    }
}
