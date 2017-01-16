<?php

namespace pxgamer\PlexPicker;

/**
 * Class Picker
 * Package pxgamer\PlexPicker
 */
class Picker
{
	public $baseUrl;
	
	private $plexResponse;

    public function __construct($baseUrl, $data = [])
    {
        $this->baseUrl = $baseUrl;
    }
}
