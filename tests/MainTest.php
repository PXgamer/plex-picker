<?php

namespace pxgamer\PlexPicker;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    const TEST_URL = 'https://test-plex';
    const TEST_TOKEN = 'random-string-token';
    const TEST_DATA = [
        'test',
        'data',
    ];

    public function testCanSetBaseUrl()
    {
        $client = new Picker();
        $client->setBaseUrl(self::TEST_URL);

        $this->assertTrue($client->baseUrl === self::TEST_URL);
    }

    public function testCanGetCanSetToken()
    {
        $client = new Picker();
        $client->setToken(self::TEST_TOKEN);

        $this->assertTrue($client->data['X-Plex-Token'] === self::TEST_TOKEN);
    }

    public function testCanGetCanSetData()
    {
        $client = new Picker();
        $client->setData(self::TEST_DATA);

        $this->assertTrue($client->data === self::TEST_DATA);
    }
}
