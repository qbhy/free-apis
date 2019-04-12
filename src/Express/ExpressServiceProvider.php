<?php

namespace Qbhy\FreeApis\Express;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qbhy\Express\Express;
use Qbhy\FreeApis\FreeApis;

class ExpressServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['express'] = function (FreeApis $apis) {
            return new Express($apis->getConfig('express'));
        };
    }

}