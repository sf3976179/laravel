<?php
/**
 * 此控制器不用，只是展示说明
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AliOssController extends Controller
{
    //创建存储
    public function new_cunchu(){
        $alioss = config('alioss'); //oss配置数据

        try {
            $ossClient = new OssClient($alioss['AccessKeyId'],$alioss['AccessKeySecret'],$alioss['ossServer']);
            $ossClient->createBucket('sf-huadong2');
        } catch (OssException $e) {
            print $e->getMessage();
        }
    }

    public function image_upload(){
        $alioss = config('alioss'); //oss配置数据
        try {
            $ossClient = new OssClient($alioss['AccessKeyId'],$alioss['AccessKeySecret'],$alioss['ossServer']);
            $result = $ossClient->multiuploadFile($alioss['BucketName'],'oss_huadong1/'.$_FILES['mypic']['name'],$_FILES['mypic']['tmp_name']);
        } catch (OssException $e) {
            print $e->getMessage();
        }

        $res = ($result === 'null')?"http://".$alioss['BucketName'].'.'.$alioss['ossServer'].'/oss_huadong1/'.$_FILES['mypic']['name']:false;
        return $res; //返回数据
    }

    //图片下载
    public function download_img(){
        try {
            // 下载object到本地文件
            $options = array(
                OssClient::OSS_HEADERS => array(
                    'Content-Disposition' => 'attachment; filename="demo.png"',
                    'Content-Type'=> 'image/jpg'
                )
//                    OssClient::OSS_FILE_DOWNLOAD => 'download-test-object-name.txt',
//                    OssClient::OSS_RANGE => '0-3'
            );

            $content = $ossClient->getObject($alioss['BucketName'],'oss_huadong1/2.png',$options);
            header('Content-type: image/jpg');
//                echo $content;
            $filename="teststream.jpg";//要生成的图片名字

            $jpg = $content;//得到post过来的二进制原始数据
            $file = fopen($filename,"w");//打开文件准备写入
            fwrite($file,$jpg);//写入
//                fclose($file);//关闭

        } catch (OssException $e) {
            print $e->getMessage();
        }
    }

    //批量删除
    public function deleteall(){
        try {
            $ossClient->deleteObjects($alioss['BucketName'],array('oss_huadong1/201702221609154814.jpg','oss_huadong1/201702221609158691.jpg'));

        } catch (OssException $e) {
            print $e->getMessage();
        }
    }



}