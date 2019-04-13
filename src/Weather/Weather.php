<?php

namespace Qbhy\FreeApis\Weather;

use Qbhy\FreeApis\Api;

/**
 * Class Weather
 *
 * @package Qbhy\FreeApis\Weather
 */
class Weather extends Api
{
    private $cityMap;

    public function query($cityId)
    {
        return json_decode($this->app->getClient()->get("http://t.weather.sojson.com/api/weather/city/{$cityId}")->getBody()->__toString(), true);
    }

    /**
     * @return array
     */
    public function getCityMap()
    {
        if (is_null($this->cityMap)) {
            $this->cityMap = json_decode(file_get_contents(__DIR__ . '/sites_map.json'), true);
        }

        return $this->cityMap;
    }

    public function queryWithCityName($cityName)
    {
        if (isset($this->getCityMap()[$cityName])) {
            return $this->query($this->getCityMap()[$cityName]);
        }

        throw new WeatherException('不支持的城市:' . $cityName,400);
    }
}