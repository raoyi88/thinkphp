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
//        $list=Db::table('twothink_activity')->where('status',0)->find();
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
        Db::table('twothink_activity')->where('id',$id)->update([
            'title'=>$request->post('title'),
            'content'=>$request->post('content'),
            'start_time'=>strtotime($request->post('start_time')),
            'end_time'=>strtotime($request->post('end_time')),
            'num'=>$request->post('num')
        ]);
        $this->success('修改成功！','index');
    }
    //添加
    public function create(){
        return $this->fetch();
    }
    //添加保存
    public function add(Request $request){
        \app\admin\model\Activity::create([
            'title'=>$request->post('title'),
            'content'=>$request->post('content'),
            'start_time'=>strtotime($request->post('start_time')),
            'end_time'=>strtotime($request->post('end_time')),
            'num'=>$request->post('num'),
            'status'=>1,
            'category'=>$request->post('category')
        ]);
        $this->success('添加成功！','index');
    }
    //查看详情
    public function show($id){
        $activity=Db::table('twothink_activity')->where('id',$id)->find();
        $this->assign('list',$activity);
        return $this->fetch();
    }
    //删除
    public function destroy($id){
        Db::table('twothink_activity')->where('id',$id)->delete();
        $this->success('删除成功！','index');
    }
    //修改状态
    public function changestatus($id){
        $status=Db::table('twothink_activity')->where('id',$id)->value('status');
        if ($status===1){
            $change=0;
//            Db::table('twothink_activity')->where('id',$id)->update(['status'=>0]);
        }else{
            $change=1;
//           Db::table('twothink_activity')->where('id',$id)->update(['status'=>0]);
        }
        Db::table('twothink_activity')->where('id',$id)->update(['status'=>$change]);
        $this->success('修改状态成功！','index');
    }
}
