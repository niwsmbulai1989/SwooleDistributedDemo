<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午12:51
 */

namespace app\Controllers;

use app\Controllers\Controller;
use Server\Asyn\Mysql\Miner;
class test
{

    public function http_test()
    {
        return 11;
        return 11;
        $value=1;
//        $value = yield $this->mysql_pool->dbQueryBuilder->insert('user')
//            ->option('HIGH_PRIORITY')
//            ->set('name', 1)
//            ->set('password', 1)
//            ->set('sex',1)
//            ->set('email', 1)
//            ->set('phone', 1)
//            ->set('create_time', 1)
//            ->set('ip', 1)
//            ->coroutineSend();
        print_r($value);
        $this->end($value);
    }
}