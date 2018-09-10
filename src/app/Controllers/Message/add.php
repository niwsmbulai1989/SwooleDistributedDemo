<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午3:53
 */

namespace app\Controllers\Test\Message;
class add extends Message
{
    /**
     * @link http://localhost:8081/Test/Message/add
     */
    public function http_add()
    {
        $template = $this->loader->view('app::Test/Message/add');
        $data = [
            'title' => '留言板',
            'content' => "填写留言内容信息",
        ];
        $this->http_output->end($template->render($data));
    }
    /*
     * 生成数据库表
     *
     * */
    public function create_table()
    {
        yield $this->mysql_pool->dbQueryBuilder->coroutineSend(null, "
            CREATE TABLE IF NOT EXISTS `message` (
              `id` smallint(6) NOT NULL AUTO_INCREMENT,
              `yourname` char(50) NOT NULL,
              `youphone` char(50) NOT NULL,
              `email` char(50) NOT NULL,
              `title` char(100) NOT NULL,
              `content` VARCHAR (600) NOT NULL,
              `pic` char(100) NULL,
              PRIMARY KEY (`id`)
            ) ;
        ");

    }

}