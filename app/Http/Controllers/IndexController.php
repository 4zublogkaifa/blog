<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
use App\Model\Praise;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /*
     * @content 前台首页
     *
     * */
    public function index()
    {
        $data = Title::get();
        return view('index/index',['data'=>$data]);
    }
    
    /*
     * @content 文章详情
     * 
     * */
    public function details(Request $request)
    {
        if($request->isMethod('post')){
            $user_id = $request->user_id;
            $title_id = $request->title_id;
            $data = [
                'user_id'=>$user_id,
                'title_id'=>$title_id
            ];
            $re = Praise::insert($data);
            if($re){
                return 1;//点赞成功
            }else{
                return 2;//点赞失败
            }
        }else{
            $id=$request->title_id;
            $count=Db::table('comment')->count();
            $arr=Db::table('comment')->join('title','title.title_id','=','comment.title_id')->where('cm_status',1)->get();
            $user_id=session('user');

            $data = Title::where('title_id',$id)->first();
            return view('index/details',['data'=>$data,'user_id'=>$user_id,'arr'=>$arr,'count'=>$count]);
        }

    }
    /*
     * @content 判断用户是否存在 如果存在把用户id return
     * */
    public function getUser()
    {
        $user_id=session('user');
        if(empty($user_id)){
            return 2;//没有此用户
        }else{
            return $user_id;
        }
    }

    /*
     * @content 用户评论
     * */
    public function Comment(Request $request)
    {
        //评论内容
        $cm_content = $request->desc;
        $user_id=$request->user_id;
        //文章id
        $id=$request->title_id;
        //根据user_id查询用户
        $userinfo=DB::table('admin_user')->where('admin_id',$user_id)->first();
        $data = [
            'cm_content'=>$cm_content,
            'title_id'=>$id,
            'cm_user'=>$userinfo->admin_name,
            'cm_status'=>1,
        ];
        $res = DB::table('comment')->insert($data);
        if($res){
            return 1;//评论成功,
        }else{
            return 2;//评论失败
        }

    }

    /*
     * @content 前台登录视图
     */
    public function Register(){
        return view('index/register');
    }

    /*
     * @content 前台注册视图
     */
    public function RegitserTo(){
        return view('index/registerto');
    }

    /**
     * @content 前台注册
     */
    public function RegisterAdd(Request $request)
    {
        $arr = $request->input();
        if(empty($arr['usr_name'])){
            $error=array(
                'status'=>0,
                'msg'=>"账号不能为空"
            );
            return $error;
        }
        if(empty($arr['usr_pwd'])){
            $error=array(
                'status'=>0,
                'msg'=>"密码不能为空！"
            );
            return $error;
        }
        $usr_name = $arr['usr_name'];
        $pwd = $arr['usr_pwd'];
        $usr_pwd = md5($pwd);
        $data = [
            'user_name'=>$usr_name,
            'user_pwd'=>$usr_pwd
        ];

        $add=DB::table('indexuser')->insert($data);
        if($add){
            $error=array(
                'status'=>1,
                'msg'=>"注册成功"
            );
            return $error;
        }else{
            $error=array(
                'status'=>0,
                'msg'=>"注册失败"
            );
            return $error;
        }

    }

    /**
     * content 登录
     */
    public function Successful(Request $request)
    {
        $arr = $request->input();
        if(empty($arr['usr_name'])){
            $error=array(
                'status'=>1,
                'msg'=>"账号不能为空"
            );
            return $error;
        }
        if(empty($arr['usr_pwd'])){
            $error=array(
                'status'=>1,
                'msg'=>"密码不能为空！"
            );
            return $error;
        }
        $usr_name = $arr['usr_name'];
        $pwd = $arr['usr_pwd'];
        $usr_pwd = md5($pwd);
        $data = [
            'user_name'=>$usr_name,
            'user_pwd'=>$usr_pwd
        ];
        $res=DB::table('indexuser')->where($data)->first();
        if($res){
            session(['user'=>$res->user_id,'user_name'=>$res->user_name]);
            $error=array(
                'status'=>0,
                'msg'=>"登录成功！"
            );
            return $error;
        }else{
            $error=array(
                'status'=>1,
                'msg'=>"账号或密码错误！"
            );
            return $error;
        }
    }

    /*
     * @centent 修改密码
     */
    public function UpdateList(){
        return view('index/updatelist');
    }
}