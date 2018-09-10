<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/11
 * Time: 下午3:56
 */
namespace app\Controllers\Demo;
use Server\Asyn\Mysql\Miner;
use app\BaseException;
use Server\CoreBase\Controller;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Server\SwooleMarco;
use Firebase\JWT\JWT;
class sel extends  Controller
{
    //访问地址 http://localhost:8081/Demo/sel
    public function http_sel()
    {
        $value = yield $this->mysql_pool->dbQueryBuilder->insert('user')
            ->option('HIGH_PRIORITY')
            ->set('name', 1)
            ->set('password', 1)
            ->set('sex',1)
            ->set('email', 1)
            ->set('phone', 1)
            ->set('create_time', 1)
            ->set('ip', 1)
            ->coroutineSend();
        print_r(33);
        $this->http_output->end($value);
    }
    public function getView()
    {
        $tpl=$this->http_input->getPathInfo();
        return 'app::'.strtolower($tpl);
    }
}