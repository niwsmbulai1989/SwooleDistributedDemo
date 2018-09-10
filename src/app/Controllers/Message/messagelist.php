<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午3:53
 */

namespace app\Controllers\Test\Message;
class messagelist extends Message
{
    /**
     * @link http://localhost:8081/Test/Message/messagelist
     */
    public function http_messagelist()
    {
        $title = $this->http_input->get('title');
        if(!empty($title))
        {
            $value = yield $this->mysql_pool->dbQueryBuilder
                ->select('*')
                ->from('message')->where( 'title',"%{$title}%", 'like')
                 ->orWhere('yourname',"%{$title}%", 'like')
                ->orWhere('youphone',"%{$title}%", 'like')
                ->orWhere('email',"%{$title}%", 'like')
                ->orWhere('title',"%{$title}%", 'like')
                ->orWhere('content',"%{$title}%", 'like')
                ->orderBy('id', 'desc')
                ->coroutineSend();
        }
        else
        {
            $value = yield $this->mysql_pool->dbQueryBuilder
                ->select('*')
                ->from('message')
                ->orderBy('id', 'desc')
                ->coroutineSend();
        }
        $template = $this->loader->view('app::Test/Message/messagelist');
        $data = [
            'title' => '留言列表',
            'content' => "留言管理",
            'list' => $value['result'],
        ];
        $this->http_output->end($template->render($data));
    }
}