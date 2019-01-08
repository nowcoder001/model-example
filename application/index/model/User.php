<?php

namespace app\index\model;

use think\db\Query;
use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
    use SoftDelete;
    protected $pk = 'user_id';
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    protected $deleteTime = 'deleted_at';
    protected $autoWriteTimestamp = 'int';
    // 配置自动完成
    protected $insert = ['created_ip'];
    // 配置数据自动转换
    protected $type
        = [
            'banned' => 'boolean',
        ];

    protected function setCreatedIpAttr()
    {
        return request()->ip();
    }

    // 编辑查询
    protected function scopeBanned(Query $query)
    {
        $query->where('banned', true);
    }

    protected function scopeUnBanned(Query $query)
    {
        $query->where('banned', false);
    }

    public function articles()
    {
        return $this->hasMany('Article', 'user_id', 'user_id');
    }
}