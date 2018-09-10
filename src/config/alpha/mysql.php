<?php
/**
 * Created by PhpStorm.
 * User: zhangjincheng
 * Date: 16-7-15
 * Time: 下午4:49
 */
$config['mysql']['enable'] = true;
$config['mysql']['active'] = 'webim';
//$config['mysql']['test']['host'] = '127.0.0.1';
//$config['mysql']['test']['port'] = '3306';
//$config['mysql']['test']['user'] = 'root';
//$config['mysql']['test']['password'] = '123456';
//$config['mysql']['test']['database'] = 'one';
//$config['mysql']['test']['charset'] = 'utf8';
//$config['mysql']['asyn_max_count'] = 10;
$config['mysql']['webim']['enable'] = true;
$config['mysql']['webim']['host'] = 'localhost';
$config['mysql']['webim']['port'] = '3306';
$config['mysql']['webim']['user'] = 'root';
$config['mysql']['webim']['password'] = 'root';
$config['mysql']['webim']['database'] = 'webim';
$config['mysql']['webim']['charset'] = 'utf8';


return $config;