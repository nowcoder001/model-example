<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '[user]'      => [
        'create'     => ['user/create'],
        'update/:id' => ['user/update'],
        'show'       => ['user/showOne'],
        'all'        => ['user/showAll'],
        'delete/:id' => ['user/delete'],
    ],
    '[article]'   => [
        'create' => ['article/create'],
        'all'    => ['article/all'],
    ],
];
