<?php

namespace pxgamer\PlexPicker;

use GuzzleHttp\Client;
use pxgamer\PlexPicker\Exceptions\NoVideosFoundException;

/**
 * Class Picker
 */
class Picker
{
    /**
     * @var array
     */
    public $data = [
        'sort' => 'titleSort:asc',
        'type' => '1',
    ];
    /**
     * @var string|null
     */
    private $baseUrl;
    /**
     * @var Client
     */
    private $guzzle;
    /**
     * @var array
     */
    private $plexResponse = [];
    /**
     * @var Video|null
     */
    private $video;
    /**
     * @var array
     */
    private $videoData = [];

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

        $this->plexResponse = (array)simplexml_load_string($response->getBody()->getContents()) ?? [];

        return $this;
    }

    /**
     * @return Video
     * @throws NoVideosFoundException
     */
    public function chooseVideo(): Video
    {
        if (!isset($this->plexResponse['Video'])) {
            throw new NoVideosFoundException();
        }

        $chosenId = array_rand($this->plexResponse['Video']);
        $selectedVideo = (array)$this->plexResponse['Video'][$chosenId];

        $this->videoData = $selectedVideo['@attributes'];

        return $this->getVideo();
    }

    /**
     * @return string|null
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return array
     */
    public function getPlexResponse(): array
    {
        return $this->plexResponse;
    }

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        return Video::make($this->videoData);
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
