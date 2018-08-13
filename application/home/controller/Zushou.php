<?php
namespace app\home\controller;
use think\Db;

class Zushou extends Home{
    public function index($category){
        $zushous=Db::table('twothink_zushou')->where('category',$category)->select();
        $this->assign('list',$zushous);
        return $this->fetch();
    }
    public function show($id){
        $zushou=Db::table('twothink_zushou')->where('id',$id)->find();
        $this->assign('list',$zushou);
        return $this->fetch();
    }
}