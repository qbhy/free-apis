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

    /**
     * so json接口
     *
     * @param $cityId
     *
     * @return array
     */
    public function query($cityId)
    {
        return json_decode($this->app->getClient()->get("http://t.weather.sojson.com/api/weather/city/{$cityId}")->getBody()->__toString(), true);
    }

    /**
     * 中国天气网接口
     *
     * @param $cityId
     *
     * @return array
     */
    public function querySk($cityId)
    {
        return json_decode($this->app->getClient()->get("http://www.weather.com.cn/data/sk/{$cityId}.html")->getBody()->__toString(), true);
    }

    /**
     * 中国天气网接口
     *
     * @param $cityId
     *
     * @return array
     */
    public function queryCityInfo($cityId)
    {
        return json_decode($this->app->getClient()->get("http://www.weather.com.cn/data/cityinfo/{$cityId}.html")->getBody()->__toString(), true);
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

    /**
     * 通过城市名称获取城市ID
     *
     * @param $cityName
     *
     * @return string
     * @throws WeatherException
     */
    public function getCityId($cityName)
    {
        if (isset($this->getCityMap()[$cityName])) {
            return $this->getCityMap()[$cityName];
        }

        throw new WeatherException('不支持的城市:' . $cityName, 400);
    }

    /**
     * @param $cityName
     *
     * @return array
     * @throws WeatherException
     */
    public function queryWithCityName($cityName)
    {
        return $this->query($this->getCityId($cityName));
    }
}