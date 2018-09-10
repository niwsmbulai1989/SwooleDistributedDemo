<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/8/23
 * Time: 上午10:11
 */
namespace app\Controllers\Demo;
class add extends sel
{
    /**
     * @link http://localhost:8081/Demo/add
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
}