<?php

namespace Qbhy\FreeApis\Weather;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qbhy\FreeApis\FreeApis;

class WeatherServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['weather'] = function (FreeApis $apis) {
            return new Weather($apis);
        };
    }

}