<?php

namespace pxgamer\PlexPicker;

/**
 * Class Picker
 * Package pxgamer\PlexPicker
 */
class Picker
{
	public $baseUrl;
	
	public $plexResponse;
	
	public $data = [];
	
    public function _setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
	
    public function setToken($token)
    {
        $this->data['X-Plex-Token'] = $token;
        $this->data['sort'] = 'titleSort:asc';
        $this->data['type'] = '1';
    }
	
    public function setData($data)
    {
        $this->data = array_merge($this->data, $data);
    }
	
	public function _get()
	{
		$url = $this->baseUrl . '/library/sections/1/all?';
		
		$cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => $url . http_build_query($this->data),
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 15,
            ]
        );
		
		$this->plexResponse = simplexml_load_string(curl_exec($cu));
		
        return $this->plexResponse;
	}
	
	public function chooseFilm()
	{
	}
}
