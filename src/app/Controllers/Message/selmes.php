<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午3:53
 */

namespace app\Controllers\Test\Message;
class selmes extends Message
{
    /**
     * @link http://localhost:8081/Test/Message/selmes?id=1
     */
    public function http_selmes()
    {
        $id = $this->http_input->get('id');
        $value = yield $this->mysql_pool->dbQueryBuilder
            ->select('*')
            ->from('message')->where( 'id',$id, '=')
            ->coroutineSend()->row();
        $template = $this->loader->view('app::Test/Message/selmes');
        $data = [
            'title' => '查看详细信息',
            'content' => "查看留言信息",
            'info' => $value,
        ];
        print_r($data);
        $this->http_output->end($template->render($data));
    }

}