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
class WpColorPickerOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addColorPickerOption('colorpicker','#00ffDD','Color','You can store colors in this option');
        $this->assertEquals('#00ffDD', $obj->getOption('colorpicker'));
        
        $obj->setOptionValue('colorpicker','#aaffDD');
        $this->assertEquals('#aaffDD', $obj->getOption('colorpicker'));
    }
}
