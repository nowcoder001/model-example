<?php


namespace app\index\model;


use think\Model;
use traits\model\SoftDelete;

class Article extends Model
{
    use SoftDelete;
    protected $pk = 'article_id';
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    protected $deleteTime = 'deleted_at';
    protected $autoWriteTimestamp = 'int';
    // 配置数据自动转换
    protected $type
        = [
            'content' => 'json',
        ];

    protected static function init()
    {
        self::beforeInsert(function ($article) {
            if (mb_strlen($article->title, 'utf-8') < 10) {
                return false;
            }

            return true;
        });
    }
}