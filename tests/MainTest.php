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
        'sort' => 'titleSort:asc',
        'type' => '1',
        'test' => true,
    ];

    /**
     * @test
     */
    public function itCanSetTheBaseUrl()
    {
        $client = Picker::make()->setBaseUrl(self::TEST_URL);

        $this->assertTrue($client->baseUrl === self::TEST_URL);
    }

    /**
     * @test
     */
    public function itCanSetTheRequestToken()
    {
        $client = Picker::make()->setToken(self::TEST_TOKEN);

        $this->assertTrue($client->data['X-Plex-Token'] === self::TEST_TOKEN);
    }

    /**
     * @test
     */
    public function itCanSetTheRequestData()
    {
        $client = Picker::make()->setData(self::TEST_DATA);

        $this->assertTrue($client->data === self::TEST_DATA);
    }
}
