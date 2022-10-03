# pdfMatrix Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gdinko/pdfmatrix-sdk.svg?style=flat-square)](https://packagist.org/packages/gdinko/pdfmatrix-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/gdinko/pdfmatrix-sdk/run-tests?label=tests)](https://github.com/gdinko/pdfmatrix-sdk/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/gdinko/pdfmatrix-sdk/Check%20&%20fix%20styling?label=code%20style)](https://github.com/gdinko/pdfmatrix-sdk/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/gdinko/pdfmatrix-sdk.svg?style=flat-square)](https://packagist.org/packages/gdinko/pdfmatrix-sdk)

[pdfmatrix.com JSON API Documentation](https://pdfmatrix.com/documentation)

## Installation

You can install the package via composer:

```bash
composer require gdinko/pdfmatrix-sdk
```

If you need to export configuration file:

```bash
php artisan vendor:publish --tag=pdfmatrix-config
```

## Configuration

Add this to .env file:

```bash
PDFMATRIX_API_TOKEN= #Get API token from pdfmatrix.com
```

## Usage

```php
use Gdinko\PdfMatrix\Facades\PdfMatrix;

$me = PdfMatrix::me();

dd($me);
```

Methods

```php
use Gdinko\PdfMatrix\Facades\PdfMatrix;

//Account information
PdfMatrix::me(): array

//PDF Generation
PdfMatrix::pdf(PdfRequestInterface $request)

//PDF Storage
PdfMatrix::listMyFiles(): array
PdfMatrix::getFile($hash): string
PdfMatrix::deleteFile($id): array
```

## Examples

Get information about pdfmatrix API usage

```php
$me = PdfMatrix::me();

dd($me);
```

List my files stored on pdfmatrix.com cloud

```php
$response = PdfMatrix::listMyFiles();

dd($response);
```

Generate pdf from url and get JSON response from pdfmatrix.com

```php

use Gdinko\PdfMatrix\Facades\PdfMatrix;
use Gdinko\PdfMatrix\Requests\PdfRequest;
use Gdinko\PdfMatrix\Exceptions\PdfMatrixException;
use Gdinko\PdfMatrix\Exceptions\PdfMatrixValidationException;

try {

    $jsonResponse = PdfMatrix::pdf(
        new PdfRequest([
            'url' => 'https://pdfmatrix.com',
        ])
    );

    dd($jsonResponse);

} catch (PdfMatrixException $e) {
    echo $e->getCode() . '<br />';
    echo $e->getMessage() . '<br />';
    print_r($e->getErrors());
} catch (PdfMatrixValidationException $ve) {
    echo $ve->getCode() . '<br />';
    echo $ve->getMessage() . '<br />';
    print_r($ve->getErrors());
}
```

Generate pdf from url and send it for download to the browser

```php

use Gdinko\PdfMatrix\Facades\PdfMatrix;
use Gdinko\PdfMatrix\Requests\PdfRequest;
use Gdinko\PdfMatrix\Exceptions\PdfMatrixException;
use Gdinko\PdfMatrix\Exceptions\PdfMatrixValidationException;

try {

    return PdfMatrix::pdf(
        new PdfRequest([
            'url' => 'https://pdfmatrix.com',
            'return' => 'download'
        ])
    );

} catch (PdfMatrixException $e) {
    echo $e->getCode() . '<br />';
    echo $e->getMessage() . '<br />';
    print_r($e->getErrors());
} catch (PdfMatrixValidationException $ve) {
    echo $ve->getCode() . '<br />';
    echo $ve->getMessage() . '<br />';
    print_r($ve->getErrors());
}
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dinko359@gmail.com instead of using the issue tracker.

## Credits

-   [pdfmatrix.com](https://pdfmatrix.com)
-   [Dinko Georgiev](https://github.com/gdinko)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
