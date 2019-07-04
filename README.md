# free-apis
免费的常用 API 

## 如何安装 ?
```bash
$ composer require 96qbhy/free-apis
```

## 如何使用 ?
```php

$api = new Qbhy\FreeApis\FreeApis([
    'debug'   => true,
    'express' => '查快递app key',
]);

var_dump($api->express->query('快递单号')); // 查快递
var_dump($api->translation->google('你好', 'en')); // 翻译
var_dump($api->weather->queryWithCityName('广州')); // 天气查询
var_dump($api->ip->getIpInfo('IP地址')); // IP查询
```

96qbhy@gmail.com  
[96qbhy/free-apis](https://github.com/qbhy/free-apis)