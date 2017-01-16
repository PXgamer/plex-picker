# plex-picker

A project to pick a film from your Plex library.

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

$client = new Picker();

$data = [
    'unwatched' => 1,
];

$client->_setBaseUrl('https://demo.plex.local:32400');

$client->setToken('5KaVLQiL531414faD7PfZ3');

$client->setData($data);

$client->_get();

echo 'Chosen Film: '.$client->chooseFilm();

```