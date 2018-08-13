<?php
namespace app\admin\controller;
use think\Db;
use think\Request;

class Zushou extends Admin{
    //列表
    public function index(){
        $zushous=Db::table('twothink_zushou')->select();
        $this->assign('list',$zushous);
        return $this->fetch();
    }
    //添加
    public function create(){
       return $this->fetch();
    }
    //添加保存
    public function add(Request $request){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $filename=$info->getSaveName();
                $new=str_replace("\\","/",$filename);
                $filename='/uploads/'.$new;
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        $data=[
            'title'=>$request->post('title'),
            'content'=>$request->post('content'),
            'price'=>$request->post('price'),
            'img'=>$filename,
            'name'=>$request->post('name'),
            'tel'=>$request->post('tel'),
            'category'=>$request->post('category'),
            'create_time'=>time(),
            'status'=>0
        ];
        Db::table('twothink_zushou')->insert($data);
        $this->success('发布成功！','index');
    }
    //查看
    public function show($id){
        $zushou=Db::table('twothink_zushou')->where('id',$id)->find();
        $this->assign('zushou',$zushou);
         return $this->fetch();
    }
    //修改
    public function edit($id){
        $zushou=Db::table('twothink_zushou')->where('id',$id)->find();
        $this->assign('zushou',$zushou);
        return $this->fetch();
    }
    //保存修改
    public function update(Request $request){
        Db::table('twothink_zushou')->where('id',$request->post('id'))->update([
            'title'=>$request->post('title'),
            'content'=>$request->post('content'),
            'price'=>$request->post('price'),
            'img'=>111,
            'name'=>$request->post('name'),
            'tel'=>$request->post('tel')
        ]);
        $this->success('更改成功！','index');
    }
    //删除
    public function destroy($id){
       Db::table('twothink_zushou')->where('id',$id)->delete();
       $this->success('删除成功！','index');
    }
}