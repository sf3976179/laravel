<?php

namespace App\Repositories;

use App\Models\Article_content;

class ArticleRepository extends BaseRepository
{
    protected $baseModel;

    public function __construct(Article_content $article_content)
    {
        $this->constructParam = func_get_args();
        $this->article_content = $article_content;
        $this->baseModel = $this->article_content;
        $this->baseParam = ['id','main_title','image_name','subtitle','ac_id','channel','ac_tag','ac_display','content','add_time'];
        $this->baseTransformer = 'article_content';
    }

}