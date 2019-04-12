<?php

namespace Qbhy\FreeApis\Translation;

use GuzzleHttp\RequestOptions;
use Qbhy\FreeApis\Api;

class Translation extends Api
{
    public function google($text, $to = 'zh-CN')
    {
        return json_decode($this->app
            ->getClient()
            ->request('GET', "http://translate.google.cn/translate_a/single?client=gtx&dt=t&dj=1&ie=UTF-8&sl=auto&tl={$to}&q={$text}", [
                RequestOptions::HEADERS => [
                    'Referer'          => 'https://www.kuaidi100.com/',
                    'User-Agent'       => Api::AGENTS[random_int(0, count(Api::AGENTS) - 1)],
                    'Accept-Language'  => 'zh,zh-CN;q=0.9,en;q=0.8',
                    'Accept-Encoding'  => 'gzip, deflate, br',
                    'Connection'       => 'keep-alive',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Host'             => 'www.kuaidi100.com',
                    'Cookie'           => 'Hm_lvt_22ea01af58ba2be0fec7c11b25e88e6c=1554091249,1554099878; WWWID=WWW095E883265EF9D8F762C82F669FCF6EB; Hm_lpvt_22ea01af58ba2be0fec7c11b25e88e6c=1554107822'
                ],
            ])
            ->getBody()->__toString(), true);
    }
}