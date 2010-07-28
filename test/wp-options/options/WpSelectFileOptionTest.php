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
class WpSelectFileOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addSelectFileOption('file','.','WpSelectFileOptionTest.php','This is a file select combobox');
        $this->assertEquals('WpSelectFileOptionTest.php', $obj->getOption('file'));
        
        $obj->setOptionValue('file','WpSelectUsersOptionTest.php');
        $this->assertEquals('WpSelectUsersOptionTest.php', $obj->getOption('file'));
    }
}
