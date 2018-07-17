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
     * @var string|null
     */
    public $baseUrl;

    /**
     * @var array
     */
    private $plexResponse = [];

    /**
     * @var array|null
     */
    private $videoData;

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
     * @return self
     */
    public static function make(): self
    {
        return new self();
    }

    /**
     * @param string $baseUrl
     * @return self
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param string $token
     * @return self
     */
    public function setToken(string $token): self
    {
        $this->data['X-Plex-Token'] = $token;

        return $this;
    }

    /**
     * @param array $data
     * @return self
     */
    public function setData(array $data): self
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }

    /**
     * @param int $sectionId
     * @return self
     */
    public function get(int $sectionId = 1): self
    {
        $url = $this->baseUrl.'/library/sections/'.$sectionId.'/all?';

        $response = $this->getClient()
            ->get($url, [
                'query' => $this->data,
            ]);

        if ($response->getStatusCode() === self::HTTP_STATUS_OK) {
            $this->plexResponse = (array)simplexml_load_string($response->getBody()->getContents());
        }

        return $this;
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
     * @return array
     */
    public function getPlexResponse(): array
    {
        return $this->plexResponse;
    }

    /**
     * @return Client
     */
    private function getClient(): Client
    {
        if (!$this->guzzle instanceof Client) {
            $this->guzzle = new Client();
        }

        return $this->guzzle;
    }
}
