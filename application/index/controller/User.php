<?php


namespace app\index\controller;


use think\Controller;
use think\Request;

class User extends Controller
{
    public function create()
    {
        $data = [
            'username' => uniqid(),
            'password' => password_hash(uniqid(), PASSWORD_DEFAULT),
        ];
        $user = new \app\index\model\User();
        $user->data($data);
        $user->save();

        return $user;
    }

    public function update($id)
    {
        $user         = \app\index\model\User::get($id);
        $user->banned = true;
        $user->save();

        return $user;
    }

    public function showOne(Request $request)
    {
        $user = \app\index\model\User::scope('unBanned')->find($request->get('user_id'));

        return $user;
    }

    public function showAll()
    {
        $model = new \app\index\model\User();
        $articles = $model->with('articles')->select();

        return json($articles);
    }

    public function delete($id)
    {
        $user = \app\index\model\User::get($id);
        $user->delete();

        return json(['errmsg' => 'ok', 'errcode' => 0]);
    }
}