<?php

namespace pxgamer\PlexPicker;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testCanBeInitialised()
    {
        $client = new Picker();
        $this->assertInstanceOf(Picker::class, $client);
    }
}
