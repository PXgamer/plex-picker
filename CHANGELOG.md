# Changelog

All notable changes to `plex-picker` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v1.2.0 - 2017-11-09

### Added
- New format for the README
- Added more testing data
- Added community files
- Updated to require PHP ^7.1

## v1.1.1 - 2017-11-02

### Added
- Updated to exclude PHP 5.5 or lower
- Removed insecure CURLOPT options

## v1.1.0 - 2017-01-16

### Added
- Added more filters (year, actor, duplicates, etc.) to example
- Changed `chooseFilm` function to `chooseVideo`
- `chooseVideo` now returns the full array instead of a title string
- The `_get` function allows changing for sections (i.e. Movies may be 1 and TV Shows may be 2)

## v1.0.0 - 2017-01-16

### Added
- Added the Picker class