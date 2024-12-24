# Countries Info PHP

A comprehensive PHP library for accessing detailed country information, including regions, cities, capitals, continents, and more.

## Installation

```bash
composer require mohanedghawar/countries-info
```

## Features

- Complete country information (names, codes, capitals, etc.)
- Administrative regions for all countries (states, provinces, etc.)
- Detailed city data including:
  - City names and populations
  - Geographical coordinates
  - Hierarchical organization (Country -> Region -> Cities)
- Population and area data
- Continent information
- Easy-to-use API
- Regular updates

## Usage

```php
use MohanedGhawar\CountriesInfo\CountriesInfo;

$countriesInfo = new CountriesInfo();

// Get all countries
$countries = $countriesInfo->getAllCountries();

// Get country by code
$usa = $countriesInfo->getCountryByCode('USA');

// Get country by name
$france = $countriesInfo->getCountryByName('France');

// Get countries by continent
$europeanCountries = $countriesInfo->getCountriesByContinent('Europe');

// Search countries by name
$searchResults = $countriesInfo->searchByName('united');

// Get regions (states/provinces) for a country
$usStates = $countriesInfo->getCountryRegions('USA');

// Get cities in a specific region
$californiaCities = $countriesInfo->getCitiesByRegion('USA', 'California');

// Get all cities in a country
$allUsCities = $countriesInfo->getAllCitiesInCountry('USA');

// Get total number of cities in a country
$usCityCount = $countriesInfo->getCityCount('USA');

// Search for cities across all countries
$citiesNamedParis = $countriesInfo->searchCities('Paris');
```

## API Reference

### Methods

#### Countries
- `getAllCountries(): array`
Returns an array of all country objects.

- `getCountryByCode(string $code): ?array`
Returns a country object for the given 3-letter ISO code (e.g., 'USA', 'GBR').

- `getCountryByName(string $name): ?array`
Returns a country object for the given country name.

- `getCountriesByContinent(string $continent): array`
Returns an array of countries in the specified continent.

- `searchByName(string $query): array`
Returns an array of countries whose names contain the search term.

#### Regions
- `getCountryRegions(string $code): array`
Returns an array of region names for the given country code.

#### Cities
- `getCitiesByRegion(string $countryCode, string $regionName): array`
Returns an array of city objects for the given country code and region name.

- `getAllCitiesInCountry(string $countryCode): array`
Returns an array of city objects for the given country code.

- `getCityCount(string $countryCode): int`
Returns the total number of cities in the given country code.

- `searchCities(string $name): array`
Returns an array of city objects whose names contain the search term.

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

#### City Object
```php
[
    'name' => 'Los Angeles',
    'latitude' => '34.05223',
    'longitude' => '-118.24368',
    'population' => 3971883,
    'countryCode' => 'USA',  // Only included in searchCities results
    'regionName' => 'California'  // Only included in searchCities results
]
```

#### Regions Array
```php
// Example: $countriesInfo->getCountryRegions('USA')
[
    'Alabama',
    'Alaska',
    'Arizona',
    // ... all US states
    'Wisconsin',
    'Wyoming'
]
```

## Data Coverage

- 250+ Countries
- 4,000+ Regions/States
- 150,000+ Cities worldwide

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

MIT License - see the [LICENSE](LICENSE) file for details.

## Support

If you encounter any issues or have questions, please file an issue on the [GitHub repository](https://github.com/MohanedGhawar2019/countries-info-php/issues).
