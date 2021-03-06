# plex-picker

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A project to pick a video from your Plex library.

## Structure

```
src/
tests/
vendor/
```

## Install

Via Composer

``` bash
$ composer require pxgamer/plex-picker
```

## Usage

```php

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email owzie123@gmail.com instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/plex-picker.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/plex-picker/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/79118120/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/plex-picker.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/plex-picker.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/plex-picker
[link-travis]: https://travis-ci.org/pxgamer/plex-picker
[link-styleci]: https://styleci.io/repos/79118120
[link-code-quality]: https://codecov.io/gh/pxgamer/plex-picker
[link-downloads]: https://packagist.org/packages/pxgamer/plex-picker
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
