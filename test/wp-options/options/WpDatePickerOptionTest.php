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
class WpDatePickerOptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Probando que el option guarde/recupere la informacion de forma correcta
     */
    public function testSave()
    {
        $obj = new WpOptions(WP_VERSION, new wpdb());
        
        $obj->addDatePickerOption('datepicker','2010-04-20','Date','You can store dates in this option');
        $this->assertEquals('2010-04-20', $obj->getOption('datepicker'));
        
        $obj->setOptionValue('datepicker','2010-04-24');
        $this->assertEquals('2010-04-24', $obj->getOption('datepicker'));
    }
}
