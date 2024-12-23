<?php

namespace MohanedGhawar\CountriesInfo;

class CountriesInfo
{
    private $countries;
    private $regions;

    public function __construct()
    {
        $countriesPath = __DIR__ . '/../data/countries.json';
        $regionsPath = __DIR__ . '/../data/regions.json';
        $this->countries = json_decode(file_get_contents($countriesPath), true);
        $this->regions = json_decode(file_get_contents($regionsPath), true);
    }

    /**
     * Get all countries information
     * @return array
     */
    public function getAllCountries(): array
    {
        return $this->countries;
    }

    /**
     * Get country information by name
     * @param string $name
     * @return array|null
     */
    public function getCountryByName(string $name): ?array
    {
        $name = strtolower($name);
        foreach ($this->countries as $code => $country) {
            if (strtolower($country['name']['common']) === $name) {
                return $country;
            }
        }
        return null;
    }

    /**
     * Get country information by code (3-letter ISO code)
     * @param string $code
     * @return array|null
     */
    public function getCountryByCode(string $code): ?array
    {
        return $this->countries[$code] ?? null;
    }

    /**
     * Get regions for a specific country
     * @param string $code 3-letter ISO code of the country (e.g., 'USA', 'GBR')
     * @return array
     */
    public function getCountryRegions(string $code): array
    {
        return $this->regions[$code] ?? [];
    }

    /**
     * Get all countries in a specific continent
     * @param string $continent
     * @return array
     */
    public function getCountriesByContinent(string $continent): array
    {
        $continent = strtolower($continent);
        return array_filter($this->countries, function($country) use ($continent) {
            return strtolower($country['continent']) === $continent;
        });
    }

    /**
     * Search countries by name
     * @param string $query
     * @return array
     */
    public function searchByName(string $query): array
    {
        $query = strtolower($query);
        return array_filter($this->countries, function($country) use ($query) {
            return str_contains(strtolower($country['name']['common']), $query);
        });
    }
}
