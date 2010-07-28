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
class WpRangeSliderOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addRangeSliderOption('rangeslider',array(1,24),'Slider','This is a slider and store numbers');
        $this->assertEquals(array('min' => 1, 'max' =>24), $obj->getOption('rangeslider'));
        
        $obj->setOptionValue('rangeslider',array(12,15));
        $this->assertEquals(array('min' => 12, 'max' =>15), $obj->getOption('rangeslider'));
        
        
        
    }
}
