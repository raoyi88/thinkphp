<?php
namespace app\home\controller;
use think\Db;
use think\Request;

class Renzheng extends Home{
    public function index(){
        return $this->fetch();
    }
    public function create(Request $request){
        $id=is_login();
        if (!$id){
            $this->error('请登录','http://www.thinkphp.com/user/login/index.html');
        }
        Db::table('twothink_renzheng')->insert([
            'member_id'=>$id,
            'status'=>0,
            'name'=>$request->post('name'),
            'house'=>$request->post('house'),
            'relation'=>$request->post('relation'),
            'tel'=>$request->post('tel'),
            'card_id'=>$request->post('card_id')
        ]);
        $this->success('提交成功！请耐心等待审核','home/index');
    }
}