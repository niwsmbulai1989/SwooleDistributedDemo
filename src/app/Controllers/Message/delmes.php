<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午3:53
 */

namespace app\Controllers\Test\Message;
class delmes extends Message
{
    /**
     * @link http://localhost:8081/Test/Message/delmes
     */
    public function http_delmes()
    {
        $postData=$this->http_input->getAllPost();
        $id=$postData['id'];
        $value = yield $this->mysql_pool->dbQueryBuilder->delete()
            ->from('message')
            ->where('id', $id)
            ->coroutineSend();
        if($value)
        {
            $data=array(
               'code'=>0,
                'msg'=>'删除成功',
            );
        }
        else
        {
            $data=array(
                'code'=>1,
                'msg'=>'删除失败',
            );
        }
       return $this->end($data);
    }
}