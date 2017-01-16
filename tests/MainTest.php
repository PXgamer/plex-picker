<?php

use pxgamer\PlexPicker;

class MainTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInitialised()
    {
        $client = new PlexPicker\Picker();
        $this->assertInstanceOf(PlexPicker\Picker::class, $client);
    }
}
