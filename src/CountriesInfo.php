<?php

namespace MohanedGhawar\CountriesInfo;

class CountriesInfo
{
    private $countries;
    private $regions;
    private $cities;

    public function __construct()
    {
        $countriesPath = __DIR__ . '/../data/countries.json';
        $regionsPath = __DIR__ . '/../data/regions.json';
        $citiesPath = __DIR__ . '/../data/cities.json';
        
        $this->countries = json_decode(file_get_contents($countriesPath), true);
        $this->regions = json_decode(file_get_contents($regionsPath), true);
        $this->cities = json_decode(file_get_contents($citiesPath), true);
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
        $code = strtoupper($code);
        return $this->countries[$code] ?? null;
    }

    /**
     * Get regions for a specific country
     * @param string $code 3-letter ISO code of the country (e.g., 'USA', 'GBR')
     * @return array
     */
    public function getCountryRegions(string $code): array
    {
        $code = strtoupper($code);
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

    /**
     * Get all cities in a specific region of a country
     * @param string $countryCode 3-letter ISO code of the country
     * @param string $regionName Name of the region/state/province
     * @return array
     */
    public function getCitiesByRegion(string $countryCode, string $regionName): array
    {
        $countryCode = strtoupper($countryCode);
        return $this->cities[$countryCode][$regionName] ?? [];
    }

    /**
     * Get all cities in a country
     * @param string $countryCode 3-letter ISO code of the country
     * @return array
     */
    public function getAllCitiesInCountry(string $countryCode): array
    {
        $countryCode = strtoupper($countryCode);
        if (!isset($this->cities[$countryCode])) {
            return [];
        }

        $allCities = [];
        foreach ($this->cities[$countryCode] as $regionCities) {
            $allCities = array_merge($allCities, $regionCities);
        }
        return $allCities;
    }

    /**
     * Get the total number of cities in a country
     * @param string $countryCode 3-letter ISO code of the country
     * @return int
     */
    public function getCityCount(string $countryCode): int
    {
        return count($this->getAllCitiesInCountry($countryCode));
    }

    /**
     * Search for cities across all countries
     * @param string $name The city name to search for
     * @return array Array of matching cities with country and region info
     */
    public function searchCities(string $name): array
    {
        if (empty($name)) {
            return [];
        }

        $searchTerm = strtolower($name);
        $results = [];

        foreach ($this->cities as $countryCode => $countryData) {
            foreach ($countryData as $regionName => $cities) {
                foreach ($cities as $city) {
                    if (str_contains(strtolower($city['name']), $searchTerm)) {
                        $city['countryCode'] = $countryCode;
                        $city['regionName'] = $regionName;
                        $results[] = $city;
                    }
                }
            }
        }

        return $results;
    }
}
