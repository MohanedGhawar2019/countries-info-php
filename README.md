# Countries Info (PHP)

A comprehensive PHP library for accessing detailed country information, including regions, capitals, continents, and more.

## Installation

```bash
composer require mohanedghawar/countries-info
```

## Features

- Complete country information (names, codes, capitals, etc.)
- Administrative regions for all countries (states, provinces, etc.)
- Population and area data
- Continent information
- Easy-to-use API
- Regular updates

## Usage

```php
use MohanedGhawar\CountriesInfo\CountriesInfo;

$service = new CountriesInfo();

// Get all countries
$allCountries = $service->getAllCountries();

// Get a specific country by its 3-letter code
$usa = $service->getCountryByCode('USA');

// Get a country by name
$france = $service->getCountryByName('France');

// Get all regions/states of a country
$usStates = $service->getCountryRegions('USA');

// Get all countries in a continent
$europeanCountries = $service->getCountriesByContinent('Europe');

// Search countries by name
$searchResults = $service->searchByName('united');
```

## API Reference

### Methods

#### `getAllCountries(): array`
Returns an array of all country objects.

#### `getCountryByCode(string $code): ?array`
Returns a country object for the given 3-letter ISO code (e.g., 'USA', 'GBR').

#### `getCountryByName(string $name): ?array`
Returns a country object for the given country name.

#### `getCountryRegions(string $code): array`
Returns an array of region names for the given country code.

#### `getCountriesByContinent(string $continent): array`
Returns an array of countries in the specified continent.

#### `searchByName(string $query): array`
Returns an array of countries whose names contain the search term.

### Data Structures

#### Country Object
```php
[
    'name' => [
        'common' => 'United States',
        'official' => 'United States of America'
    ],
    'code' => 'USA',
    'capital' => 'Washington, D.C.',
    'continent' => 'North America',
    'population' => 331002651,
    'area_km2' => 9833517
]
```

#### Regions Array
```php
// Example: $service->getCountryRegions('USA')
[
    'Alabama',
    'Alaska',
    'Arizona',
    // ... all US states
    'Wisconsin',
    'Wyoming'
]
```

## Examples

### Get US States
```php
$service = new CountriesInfo();
$usStates = $service->getCountryRegions('USA');
print_r($usStates); // ['Alabama', 'Alaska', 'Arizona', ...]
```

### Get European Countries
```php
$service = new CountriesInfo();
$europeanCountries = $service->getCountriesByContinent('Europe');
foreach ($europeanCountries as $country) {
    echo $country['name']['common'] . "\n";
}
```

### Search Countries
```php
$service = new CountriesInfo();
$unitedCountries = $service->searchByName('united');
foreach ($unitedCountries as $country) {
    echo $country['name']['common'] . "\n";
}
// Output:
// United States
// United Kingdom
// United Arab Emirates
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

MIT License - see the [LICENSE](LICENSE) file for details.

## Support

If you encounter any issues or have questions, please file an issue on the [GitHub repository](https://github.com/MohanedGhawar2019/countries-info-php/issues).
