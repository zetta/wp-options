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
class WpMultipleSelectOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $fontSize = array(
            '10px' => '10px',
            '11px' => '11px',
            '12px' => '12px',
            '13px' => '13px',
            '14px' => '14px',
            '15px' => '15px'
        );
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addMultipleSelectOption('select',$fontSize,array('13px','11px'),'Multiple Select','Select one or more font sizes');
        $this->assertEquals(array('13px','11px'), $obj->getOption('select'));
        
        $obj->setOptionValue('select',array('13px','15px'));
        $this->assertEquals(array('13px','15px'), $obj->getOption('select'));
    }
}
