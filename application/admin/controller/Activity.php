<?php
namespace app\admin\controller;
use app\admin\model\Modelmodel;
use think\Db;
use think\Request;

class Activity extends Admin{
    //列表
    public function index(){
        $model=model('activity');
        $list=$model->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    //修改
    public function edit($id){
        $activity=Db::table('twothink_activity')->where('id',$id)->find();
        return $this->fetch('edit',['activity'=>$activity]);
    }
    //修改保存
    public function update(Request $request){
        $id=$request->post('id');
    }
}
