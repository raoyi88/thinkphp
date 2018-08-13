<?php
namespace app\admin\controller;
use think\Db;

class Renzheng extends Admin{
    public function index(){
        $renzhengs=Db::table('twothink_renzheng')->where('status',0)->select();
        $this->assign('list',$renzhengs);
        return $this->fetch();
    }
    public function changestatus($id){
        Db::table('twothink_renzheng')->where('id',$id)->update([
            'status'=>1
        ]);
        $this->success('通过审核成功！','index');
    }
}