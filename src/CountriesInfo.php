<?php

namespace MohanedGhawar\CountriesInfo;

class CountriesInfo
{
    private $countries;

    public function __construct()
    {
        $jsonPath = __DIR__ . '/../data/countries.json';
        $this->countries = json_decode(file_get_contents($jsonPath), true);
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
        foreach ($this->countries as $country) {
            if (strtolower($country['name']) === $name) {
                return $country;
            }
        }
        return null;
    }

    /**
     * Get country information by code
     * @param string $code
     * @return array|null
     */
    public function getCountryByCode(string $code): ?array
    {
        $code = strtolower($code);
        foreach ($this->countries as $country) {
            if (strtolower($country['code']) === $code) {
                return $country;
            }
        }
        return null;
    }
}
