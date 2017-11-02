<?php

use pxgamer\PlexPicker;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testCanBeInitialised()
    {
        $client = new PlexPicker\Picker();
        $this->assertInstanceOf(PlexPicker\Picker::class, $client);
    }
}
