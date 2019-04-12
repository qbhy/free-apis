<?php

namespace Qbhy\FreeApis\Translation;

use GuzzleHttp\RequestOptions;
use Qbhy\FreeApis\Api;

class Translation extends Api
{
    public function google($text, $to)
    {
        return json_decode($this->app
            ->getClient()
            ->request('GET', "http://translate.google.cn/translate_a/single?client=gtx&dt=t&dj=1&ie=UTF-8&sl=auto&tl={$to}&q={$text}", [
                RequestOptions::HEADERS => [
                    'Referer'          => 'https://translate.google.cn/',
                    'User-Agent'       => Api::AGENTS[random_int(0, count(Api::AGENTS) - 1)],
                    'Accept-Language'  => 'zh,zh-CN;q=0.9,en;q=0.8',
                    'Accept-Encoding'  => 'gzip, deflate, br',
                    'Connection'       => 'keep-alive',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Host'             => 'translate.google.cn',
                ],
            ])
            ->getBody()->__toString(), true);
    }


    public function baidu($text, $to)
    {
        return json_decode($this->app
            ->getClient()
            ->request('GET', "http://fanyi.baidu.com/transapi?from=auto&to={$to}&query={$text}", [
                RequestOptions::HEADERS => [
                    'Referer'          => 'https://translate.google.cn/',
                    'User-Agent'       => Api::AGENTS[random_int(0, count(Api::AGENTS) - 1)],
                    'Accept-Language'  => 'zh,zh-CN;q=0.9,en;q=0.8',
                    'Accept-Encoding'  => 'gzip, deflate, br',
                    'Connection'       => 'keep-alive',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Host'             => 'fanyi.baidu.com',
                ],
            ])
            ->getBody()->__toString(), true);
    }

    public function youdao($text, $type = 'AUTO')
    {
        return json_decode($this->app
            ->getClient()
            ->request('GET', "http://fanyi.youdao.com/translate?&doctype=json&type={$type}&i={$text}", [
                RequestOptions::HEADERS => [
                    'Referer'          => 'http://fanyi.youdao.com/',
                    'User-Agent'       => Api::AGENTS[random_int(0, count(Api::AGENTS) - 1)],
                    'Accept-Language'  => 'zh,zh-CN;q=0.9,en;q=0.8',
                    'Accept-Encoding'  => 'gzip, deflate, br',
                    'Connection'       => 'keep-alive',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Host'             => 'fanyi.youdao.com',
                ],
            ])
            ->getBody()->__toString(), true);
    }


}