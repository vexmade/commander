# VexStudios Commander

Basic command bus. All commands must extend `VexStudios\Commander\Support\Command`, and all handlers must implement `VexStudios\Commander\Contracts\Handler`. Nothing else special necessary!

Currently requires Laravel 5’s Contracts, Support, and Container packages.

## Testing

Uses Behat and PHPUnit. One Feature, one Unit test. Simply run `vendor/bin/behat` and `vendor/bin/phpunit`, respectively.
