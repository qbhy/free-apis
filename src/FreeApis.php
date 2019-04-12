<?php

namespace Qbhy\FreeApis;

use GuzzleHttp\Client;
use Hanson\Foundation\Foundation;
use Qbhy\FreeApis\Express\ExpressServiceProvider;
use Qbhy\FreeApis\Translation\TranslationServiceProvider;
use Qbhy\Express\Express;
use Qbhy\FreeApis\Translation\Translation;

/**
 * Class FreeApis
 *
 * @property-read Express     $express     快递查询接口
 * @property-read Translation $translation 翻译接口
 *
 * @package Qbhy\FreeApis
 */
class FreeApis extends Foundation
{
    protected $providers = [
        ExpressServiceProvider::class,
        TranslationServiceProvider::class,
        ServiceProvider::class,
    ];

    private $client;

    /**
     * @return Client
     */
    public function getClient()
    {
        if (is_null($this->client)) {
            $this->client = new Client();
        }

        return $this->client;
    }

}