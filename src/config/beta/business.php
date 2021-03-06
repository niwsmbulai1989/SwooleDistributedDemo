<?php
/**
 * Created by PhpStorm.
 * User: zhangjincheng
 * Date: 16-7-14
 * Time: 下午1:58
 */

//强制关闭gzip
$config['http']['gzip_off'] = false;

//默认访问的页面
$config['http']['index'] = 'index.html';

/**
 * 设置域名和Root之间的映射关系
 */

$config['http']['root'] = [
    'default' =>
        [
            'root' => 'localhost',
            'index' => 'index.html'
        ]
    ,
    'www.alpha.com' =>
        [
            'root' => 'alpha',
            'index' => 'Index.html'
        ],
    'www.beta.com' =>
        [
            'root' => 'beta',
            'index' => 'Index.html'
        ],
    'sder.xin' =>
        [
            'root' => 'www',
            'index' => 'Index.html'
        ],
    'www.sder.xin' =>
        [
            'root' => 'www',
            'index' => 'Index.html'
        ],
    '182.92.224.125' =>
        [
            'root' => 'docs',
            'index' => 'index.html'
        ],
    'docs.sder.xin' =>
        [
            'root' => 'docs',
            'index' => 'index.html'
        ]
];

return $config;
