<?php

namespace pxgamer\PlexPicker;

use PHPUnit\Framework\TestCase;

/**
 * Class MainTest
 */
class MainTest extends TestCase
{
    const TEST_URL = 'https://test-plex';
    const TEST_TOKEN = 'random-string-token';
    const TEST_DATA = [
        'test',
        'data',
    ];

    /**
     * @test
     */
    public function itCanSetTheBaseUrl()
    {
        $client = new Picker();
        $client->setBaseUrl(self::TEST_URL);

        $this->assertTrue($client->baseUrl === self::TEST_URL);
    }

    /**
     * @test
     */
    public function itCanSetTheRequestToken()
    {
        $client = new Picker();
        $client->setToken(self::TEST_TOKEN);

        $this->assertTrue($client->data['X-Plex-Token'] === self::TEST_TOKEN);
    }

    /**
     * @test
     */
    public function itCanSetTheRequestData()
    {
        $client = new Picker();
        $client->setData(self::TEST_DATA);

        $this->assertTrue($client->data === self::TEST_DATA);
    }
}
