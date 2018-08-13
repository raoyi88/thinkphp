<?php

namespace app\home\controller;

use think\Db;
use think\Request;

class Activity extends Home
{
    //显示状态为已发布的活动
    public function index(Request $request)
    {
        $category=$request->get('category');
        $activitys = Db::table('twothink_activity')->where([
            'status'=>1,
            'category'=>$category
        ])->select();
        $this->assign('list', $activitys);
        return $this->fetch();
    }
    //显示指定的活动
    public function show($id){
        $activity=Db::table('twothink_activity')->where('id',$id)->find();
        $user_id=is_login();
        $res=Db::table('twothink_baoming')->where([
            'member_id'=>$user_id,
            'activity_id'=>$id
        ])->find();
        $num=Db::table('twothink_baoming')->where('activity_id',$id)->count();
        $activity_num=$activity['num'];
        $activity['num']=$activity_num-$num;
        if (empty($res)){
            $activity['res']=false;
        }else{
            $activity['res']=true;
        }
        if (is_login()){
            $activity['is_login'] = true;
        }else{
            $activity['is_login'] = false;
        }
        $this->assign('activity',$activity);
        Db::table('twothink_activity')->where('id',$id)->setInc('view');
        return $this->fetch();
    }
    //报名
    public function baoming(Request $request){
        $id = $request->get('id');
        if (!is_login()) {
           $this->error('请先登录','user/login/index');
        }
        $act_num=Db::table('twothink_activity')->where('id',$id)->value('num');
        $num=Db::table('twothink_baoming')->where('activity_id',$id)->count();
        if ($num==$act_num){
            return response(['status'=>0,'msg'=>'报名人数已满'],200,[],'json');
        }else{
            $user_id=is_login();
            $data=[
                'activity_id'=>$id,
                'member_id'=>$user_id
            ];
            Db::table('twothink_baoming')->insert($data);
            return response(['status'=>1,'msg'=>'success'],200,[],'json');
        }
    }
    public function fuwu(){
        return $this->fetch();
    }
    public function my(){
        return $this->fetch();
    }
}