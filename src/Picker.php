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
                CURLOPT_URL            => $url.http_build_query($this->data),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 15,
            ]
        );

        $this->plexResponse = (array)simplexml_load_string(curl_exec($cu));

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
}
