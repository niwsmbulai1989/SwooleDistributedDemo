<?php
/**
 * Created by PhpStorm.
 * User: zhaolicheng
 * Date: 2018/7/9
 * Time: 下午3:53
 */

namespace app\Controllers\Test\Message;
class postdata extends Message
{
    /**
     * @link http://localhost:8081/Test/Message/postdata
     */
    public function http_postdata()
    {
        $this->http_output->setHeader('Content-Type','text/html;charset=utf-8');
        $postData=$this->http_input->getAllPost();
        $picstring=$this->uploadpic();
        $value = yield $this->mysql_pool->dbQueryBuilder->insert('message')
            ->option('HIGH_PRIORITY')
            ->set('yourname', $postData['yourname'])
            ->set('youphone', $postData['youphone'])
            ->set('email', $postData['email'])
            ->set('title', $postData['title'])
            ->set('content', $postData['content'])
            ->set('pic', $picstring)
            ->set('time', time())
            ->set('ip', $this->get_client_ip())
            ->coroutineSend();
        if($value)
        {
            $html='<script>alert("提交成功");window.location.href = "http://localhost:8081/Test/Message/add";</script>';
            $this->http_output->end($html);
           //$redirectUrl='http://localhost:8081/Test/Message/add';
           //$this->redirect($redirectUrl);
        }
    }
    public function uploadpic()
    {
        // 接收上传的图片
        $postData = $this->request;
        if(($postData->files["files"]["type"]=="image/png"||$postData->files["files"]["type"]=="image/jpeg")&&$postData->files["files"]["size"]<1024000)
        {
            //防止文件名重复
            $filename=$postData->files["files"]["name"];
            $ext=pathinfo($filename, PATHINFO_EXTENSION);//获取文件后缀
            $newfilename=md5($filename).'.'.$ext;//文件重命名
            $path=__DIR__.'/upload/';//文件路径
            $filepath =$path.$newfilename;
            //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
            $filepath =iconv("UTF-8","gb2312",$filepath);
            //检查文件或目录是否存在
            move_uploaded_file($postData->files["files"]["tmp_name"],$filepath);//将临时地址移动到指定地址
            return $newfilename;
        }
    }
    public function uploadimage()
    {

        // 获取阿里云配置信息
        $params = yield api("Hall")->getAliyunConfig();

        $accessKeyId = $params['accessKeyId'];// 去阿里云后台获取秘钥
        $accessKeySecret = $params['accessKeySecret'];// 去阿里云后台获取秘钥
        $endpoint = $params['endpoint'];// 阿里云OSS地址
        $bucket = $params['bucket'];// 阿里云bucket fphall
        $ossClient = new \OSS\OssClient($accessKeyId, $accessKeySecret, $endpoint);

        // 接收上传的图片
        $postData = $this->request;
        var_dump($postData->files);

        // 允许尾缀
        $allow_suffix = ['gif', 'jpg', 'png', 'jpeg'];

        // 判断是不是post上传
        if (!is_uploaded_file($postData->files['files']['tmp_name'])) {
            $response['error'][] = '非法上传，文件 "' . $postData->files['files']['name'] . '" 不是post获得的';
        }

        // 判断错误
        if ($postData->files['files']['error'] > 0) {
            $response['error'][] = '文件 "' . $postData->files['files']['name'] . '" 上传错误,error下标为 "' . $postData->files->files->error . '"';
        }

        // 获取文件后缀
        $suffix = ltrim(strrchr($postData->files['files']['name'], '.'), '.');

        // 判断后缀是否是允许上传的格式
        if (!in_array($suffix, $allow_suffix)) {
            $response['error'][] = '文件 "' . $postData->files['files']['name'] . '" 为不允许上传的文件类型';
        }

        //得到上传后文件名
        $new_file_name = date('ymdHis', time()) . '_' . uniqid() . '.' . $suffix;

        // 上传到阿里云服务器
        $res = $ossClient->uploadFile($bucket, $new_file_name, $postData->files['files']['tmp_name']);

        // 处理图片地址
        $images = $res['info']['url'];
        $images = str_replace('http://fphall.oss-cn-hangzhou.aliyuncs.com/', '', $images);

        // 返回图片ID
        return $images;
        //$this->end(['image' => $images]);

    }
    //获取ip
    public function get_client_ip()
    {
         $ip = $this->http_input->server('remote_addr');
         return $ip;
    }




}




