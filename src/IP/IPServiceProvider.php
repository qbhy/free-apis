<?php

namespace Qbhy\FreeApis\IP;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qbhy\Express\Express;
use Qbhy\FreeApis\FreeApis;

class IPServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['ip'] = function (FreeApis $apis) {
            return new IP($apis);
        };
    }
}