<?php

namespace Qbhy\FreeApis\IP;

use GuzzleHttp\RequestOptions;
use Qbhy\FreeApis\Api;

class IP extends Api
{
    const TAOBAO_API = 'http://ip.taobao.com/service/getIpInfo.php';

    public function getIpInfo(string $ip)
    {
        return json_decode($this->app
            ->getClient()
            ->request('GET', IP::TAOBAO_API, [RequestOptions::QUERY => compact('ip'),])
            ->getBody()->__toString(), true);
    }
}