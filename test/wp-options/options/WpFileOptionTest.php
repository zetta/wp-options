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
class WpFileOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addFileOption('file','pix.png','File','You can store files in this option');
        $this->assertEquals('pix.png', $obj->getOption('file'));
        
        $obj->setOptionValue('file','fix.png');
        $this->assertEquals('fix.png', $obj->getOption('file'));
    }
}
