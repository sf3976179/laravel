<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\SubscribeupRepository;
use Illuminate\Support\Facades\Redis;
use Mockery\Exception;

class ArticleService extends BaseService
{
    protected $articleRepository;
    protected $upRepository;

    public function __construct(articleRepository $articleRepository,SubscribeupRepository $upRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->upRepository = $upRepository;
    }

    //订阅Up主
    public function createUp(array $input){
        $data = array(
            'up_id' => $input['up_id'],
            'user_id' => $input['member_id']
        );
        $this->subscribeupRepository->create($data);
    }

    //文章增加
    public function addArticle(array $input){
        if(1){
            $this->queueUp();
        }else{
            $user_id = session()->get('user_id');
            $user_login = session()->get('user_login');
            $data = array(
                'user_id' => $user_id,
                'main_title' => $input['first_title'],
                'image_name' => $input['image_upload'],
                'subtitle' => $input['second_titile'],
                'ac_id' => $input['article_list1'] . ',' . $input['article_list2'],
                'channel' => $user_id . '_' . $user_login,
                'ac_tag' => $input['tags_1'],
                'ac_display' => $input['display'],
                'content' => $input['editorValue'],
                'add_time' => time()
            );
            $res = $this->articleRepository->create($data);
        }
    }

    //Up主队列，订阅推送
    public function queueUp(){
        $res = $this->upRepository->getUpList(array('up_id'=>session()->get('user_id')));
        $user_data = array_column($res, 'user_id');
        $channel = 'up_article'; //频道名称
        Redis::LPUSH($channel,$user_data); //入队
        sleep(rand()%3);

        if(Redis::LLEN($channel)){
            try{
                for($i=0;Redis::LLEN($channel)>0;$i++){
                    $user = Redis::BLPOP($channel, 1);
                    $res = Redis::publish($channel, json_encode(['up_id'=>session()->get('user_id'),'user_id' => $user['1'], 'message' => '新的动态']));
                }
            }catch(Exception $e){

            }
        }
        dd(Redis::LLEN($channel));



    }

}