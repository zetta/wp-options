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
class WpCheckBoxOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $colors = array(
            'blue'   => 'Blue',
            'red'    => 'Red',
            'green'  => 'Green',
            'orange' => 'Orange',
            'yellow' => 'Yellow'
        );
        $selected = array('green','red');
        $other = array('yellow','red');
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addCheckBoxOption('checkbox',$colors,$selected,'Checkbox','You can store checkbox in this option');
        $this->assertEquals($selected, $obj->getOption('checkbox'));
        
        $obj->setOptionValue('checkbox',$other);
        $this->assertEquals($other, $obj->getOption('checkbox')); 
    }
}
