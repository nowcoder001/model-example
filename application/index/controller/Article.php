<?php


namespace app\index\controller;


use think\Controller;

class Article extends Controller
{
    public function create()
    {
        $article          = new \app\index\model\Article();
        $article->title   = '测试测试测试测试测试测试测试';
        $article->content = [
            'text'   => '你好',
            'images' => ['https://www.baidu.com/img/logo.gif'],
        ];
        $article->user_id = 1;
        $article->save();

        return $article;
    }

    public function all()
    {
        return json(\app\index\model\Article::all());
    }
}