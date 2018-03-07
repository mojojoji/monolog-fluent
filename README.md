Fluentd Handler for Monolog

## Installation

Add this lines to your composer.json:

```bash
$ composer require jojihere/monolog-fluent
```

## Usage

```php
<?php
use FluentHandler\FluentHandler;
use Monolog\Logger;

$logger = new Logger('Logger');
$logger->pushHandler(new FluentHandler());

$logger->debug('tag', ['test' => 'data']);
```

Fluent Handler construct takes logger, host, port as parameters

To use host as 127.0.0.1 and port as 24224
```php
<?php
$logger = new Logger('Logger');
$logger->pushHandler(new FluentHandler(null, '127.0.0.1', 24224));
```

To use logger for an existing fluent logger object
```php
<?php
$fluent = new FluentLogger("localhost", 24224);
$logger = new Logger('Logger');
$logger->pushHandler(new FluentHandler($fluent));
```

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

### Test

```bash
$ make phpunit
$ make test
```

## Copyright

Copyright (C) 2016 Joji Augustine, released under the MIT License.
