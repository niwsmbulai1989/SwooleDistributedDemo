<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/11
 * Time: 下午3:56
 */
namespace app\Controllers\Test\Message;
class demo extends Message
{
    /**
     * @link http://localhost:8081/Test/Message/demo
     */
    public function http_demo()
    {
        //$template = $this->loader->view('app::Test/Message/demo');
        $template = $this->loader->view($this->getView());
        $this->http_output->end($template->render());
    }


}