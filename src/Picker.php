<?php

namespace pxgamer\PlexPicker;

/**
 * Class Picker
 */
class Picker
{
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
    public $data = [];

    /**
     * @param string $baseUrl
     * @return string
     */
    public function setBaseUrl(string $baseUrl)
    {
        return $this->baseUrl = $baseUrl;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->data['X-Plex-Token'] = $token;
        $this->data['sort'] = 'titleSort:asc';
        $this->data['type'] = '1';
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * @param int $section_id
     * @return array
     */
    public function get($section_id = 1)
    {
        $url = $this->baseUrl.'/library/sections/'.$section_id.'/all?';

        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => $url.http_build_query($this->data),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 15,
            ]
        );

        $this->plexResponse = (array) simplexml_load_string(curl_exec($cu));

        return $this->plexResponse;
    }

    /**
     * @param int $numberOfVideos
     * @return array|string
     */
    public function chooseVideo(int $numberOfVideos = 1)
    {
        if (!isset($this->plexResponse['Video'])) {
            return 'No videos found';
        }

        if ($numberOfVideos > 1) {
            $iterator = 0;

            while ($iterator < $numberOfVideos) {
                $this->videoData[] = $this->selectRandom();
                $iterator++;
            }
        } else {
            $this->videoData = $this->selectRandom();
        }

        return $this->videoData;
    }

    /**
     * @return array
     */
    public function selectRandom()
    {
        $videoId = array_rand($this->plexResponse['Video']);
        $chosen = (array)$this->plexResponse['Video'][$videoId];

        return $chosen['@attributes'];
    }
}
