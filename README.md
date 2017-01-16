# plex-picker

A project to pick a video from your Plex library.

## Usage

__Include the class:__
- Using Composer  

`composer require pxgamer/plex-picker`  
```php
<?php
require 'vendor/autoload.php';
```
- Including the file manually  
```php
<?php
include 'src/Picker.php';
```

Once included, you can initialise the class using either of the following:

```php
$client = new \pxgamer\PlexPicker\Picker;
```
```php
use \pxgamer\PlexPicker\Picker;
$client = new Picker;
```

Then you can run the task (example below).

```php
<?php

require 'vendor/autoload.php';

use \pxgamer\PlexPicker\Picker;

// Create a new Picker class
$client = new Picker();

// Create the data object
$data = [
    'unwatched' => 1, // You can search by watched/unwatched videos
    'actor' => 1, // You can search by actor ID
    'duplicate' => 1, // You can check for duplicates
    'year' => 2017, // You can search by year
];

// In fact, you can use any of the filters.

// Initialise the base URL of your server
$client->_setBaseUrl('https://demo.plex.local:32400');

// Set your token (will soon have a login function to get a token)
$client->setToken('5KaVLQiL531414faD7PfZ3');

// Set the data (using an array)
$client->setData($data);

// Get the list of videos from the server
$client->_get();

// Select the video
$client->chooseVideo();

echo 'Chosen Film: '. $client->videoData['title'] . ' (' . $client->videoData['year'] . ')';
```