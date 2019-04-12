<?php


namespace Qbhy\FreeApis\Translation;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qbhy\FreeApis\FreeApis;

class TranslationServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['translation'] = function (FreeApis $apis) {
            return new Translation($apis);
        };
    }

}