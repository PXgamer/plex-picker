<?php

namespace pxgamer\PlexPicker;

use GuzzleHttp\Client;

/**
 * Class Picker
 */
class Picker
{
    private const HTTP_STATUS_OK = 200;

    /**
     * @var string
     */
    public $baseUrl;

    /**
     * @var array
     */
    public $plexResponse;

    /**
     * @var array
     */
    public $videoData;

    /**
     * @var array
     */
    public $data = [
        'sort' => 'titleSort:asc',
        'type' => '1',
    ];

    /**
     * @var Client
     */
    private $guzzle;

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->data['X-Plex-Token'] = $token;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * @param int $sectionId
     * @return array
     */
    public function get(int $sectionId = 1)
    {
        $url = $this->baseUrl.'/library/sections/'.$sectionId.'/all?';

        $response = $this->getClient()
            ->get($url, $this->data);

        if ($response->getStatusCode() === self::HTTP_STATUS_OK) {
            $this->plexResponse = simplexml_load_string($response->getBody()->getContents());
        }

        return $this->plexResponse;
    }

    /**
     * @return mixed|string
     */
    public function chooseVideo()
    {
        if (!isset($this->plexResponse['Video'])) {
            return 'No videos found';
        }

        $chosen = (array)$this->plexResponse['Video'][array_rand($this->plexResponse['Video'])];

        $this->videoData = $chosen['@attributes'];

        return $this->videoData;
    }

    /**
     * @return Client
     */
    private function getClient()
    {
        if (!$this->guzzle instanceof Client) {
            $this->guzzle = new Client();
        }

        return $this->guzzle;
    }
}
