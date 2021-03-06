# Changelog

All notable changes to this project will be documented in this file and grouped as follows:

  - `Added` for new features
  - `Changed` for changes in existing functionality
  - `Deprecated` for soon-to-be removed features
  - `Removed` for now removed features
  - `Fixed` for any bug fixes
  - `Security` in case of vulnerabilities

The format is based on [Keep a Changelog], and this project adheres to [Semantic Versioning].

## [Unreleased]

### Changed

  - README documentation for clarity

### Fixed

  - `log` not allowing an array passed in for logging to be treated as a single value
  - Warning generated when PHP's default time zone not set

## [1.0.0]

### Added

  - `Debug` class
  - README documentation
  - `composer.json` (and published to [Packagist])
  - `log_all` function
  - `CHANGELOG.md` (following [Keep a Changelog])
  - Ability to log at the time of object creation

### Changed

  - Log encoding from `serialize` to `json_encode`
  - Default log file from `debug.log` to `debug.json`

<!-- Version Links -->
[Unreleased]: https://github.com/brannonh/php-debug/compare/1.0.0...HEAD
[1.0.0]: https://github.com/brannonh/php-debug/releases/tag/1.0.0

<!-- External Links -->
[Keep a Changelog]: https://keepachangelog.com/en/1.0.0
[semantic versioning]: https://semver.org/spec/v2.0.0.html
[Packagist]: https://packagist.org/packages/brannonh/php-debug
