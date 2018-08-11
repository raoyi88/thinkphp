<?php

namespace app\admin\controller;

use think\Db;
use think\Loader;
use think\Request;

class Repair extends Admin {
    //报修列表
    public function index(){
       $repairmodel= model('repair');
        $repairlist=$repairmodel->select();
        $this->assign('list',$repairlist);
        return $this->fetch();
    }
    //修改
    public function edit($id){
        $repair=Db::table('twothink_repair')->where('id',$id)->find();
        return $this->fetch('edit',['repair'=>$repair]);
    }
    //修改保存
    public function update(Request $request){
//        $validate=Loader::validate('Repair');
//        if (!$validate->check($request)){
//            $validate->getError();
//        }
        Db::table('twothink_repair')->where('id',$request->post('id'))->update([
            'title' => $request->post('title'),
            'name'=>$request->post('name'),
            'tel'=>$request->post('tel'),
            'create_time'=>strtotime($request->post('time')),
            'address'=>$request->post('address'),
            'content'=>$request->post('content')
        ]);
        $this->success('修改成功','index');
    }
    //添加报修
    public function create(){
        return view('create');
    }
    //保存添加
    public function add(Request $request){
        \app\admin\model\Repair::create([
            'name'=>$request->post('name'),
            'title'=>$request->post('title'),
            'tel'=>$request->post('tel'),
            'address'=>$request->post('address'),
            'content'=>$request->post('content'),
        ]);
        return redirect(url('index'));
    }
    //删除
    public function destroy($id){
        Db::table('twothink_repair')->where('id',$id)->delete();
        $this->success('删除成功！','index');
        return redirect(url('index'));
    }
    //批量删除,未完成
    public function deleterepairs(Request $request){
//        var_dump($request->post());exit();
            DB::table('twothink_repair')->whereIn('id',$request->post())->delete();
//        Db::table('twothink_repair')->delete(\request()->post());
        $this->success('删除成功！','index');
    }
 }