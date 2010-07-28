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
class WpRadioOptionTest extends PHPUnit_Framework_TestCase
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
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->AddRadioOption('radio',$colors,'blue','Radio Buttons','Select one of these');
        $this->assertEquals('blue',$obj->getOption('radio'));
        
        $obj->setOptionValue('radio','red');
        $this->assertEquals('red',$obj->getOption('radio'));
    }
}
