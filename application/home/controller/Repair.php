<?php

namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Request;

class Repair extends Home
{
    //加载视图
    public function index()
    {
        $id=is_login();
        $member=Db::table('twothink_renzheng')->where('member_id',$id)->find();
        if ($member['status']==0){
            $this->error('您的账号还没有通过认证','renzheng/index');
        }
        return $this->fetch();
    }

    //保存信息
    public function create(Request $request)
    {
        \app\admin\model\Repair::create([
            'name'=>$request->post('name'),
            'title'=>$request->post('title'),
            'tel'=>$request->post('tel'),
            'address'=>$request->post('address'),
            'content'=>$request->post('content'),
        ]);
        $this->success('报修成功！',url('home/index/index'));
//        return redirect(url('home/index/index.html'));
    }
}