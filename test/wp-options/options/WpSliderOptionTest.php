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
class WpSliderOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando el método
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addSliderOption('slider','1','String','You can store strings in this option');
        $this->assertEquals(1, $obj->getOption('slider'));
        
        $obj->setOptionValue('slider',3);
        $this->assertEquals(3, $obj->getOption('slider'));
        
        
        
    }
}
