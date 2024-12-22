# Countries Info PHP

A comprehensive PHP library for accessing detailed country information including names, codes, capitals, continents, population, and area.

## Installation

You can install the package via composer:

```bash
composer require mohanedghawar/countries-info
```

## Usage

```php
use MohanedGhawar\CountriesInfo\CountriesInfo;

$countriesInfo = new CountriesInfo();

// Get all countries
$countries = $countriesInfo->getAllCountries();

// Get country by name
$france = $countriesInfo->getCountryByName('France');

// Get country by code
$usa = $countriesInfo->getCountryByCode('US');
```

## Data Structure

Each country contains:
```php
[
    'name' => string,      // Country name
    'code' => string,      // ISO 2-letter code
    'capital' => string,   // Capital city
    'continent' => string, // Continent
    'population' => int,   // Population
    'area' => float,      // Area in square kilometers
]
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
