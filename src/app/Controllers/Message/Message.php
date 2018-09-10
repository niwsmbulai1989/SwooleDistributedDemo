<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午3:42
 */
namespace app\Controllers\Test\Message;

use app\Controllers\BaseController;
use Server\Asyn\Mysql\Miner;
class Message extends BaseController
{
    protected function initialization($controller_name, $method_name)
    {
        parent::initialization($controller_name, $method_name);
        $this->mysql_pool = get_instance()->getAsynPool("mysqlPool_webim");
    }
    public function getView()
    {
        $tpl=$this->http_input->getPathInfo();
        return 'app::'.strtolower($tpl);
    }
}