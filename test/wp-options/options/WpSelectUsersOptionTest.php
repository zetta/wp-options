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
class WpSelectUsersOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addSelectUsersOption('users','1','Users','This is a user select combobox');
        $this->assertEquals(1, $obj->getOption('users'));
        
        $obj->setOptionValue('users',3);
        $this->assertEquals(3, $obj->getOption('users'));
    }
}
