<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;

class LoginController extends Controller
{
    //注册
    public function reg(){
        return view('login/reg');
    }
    //执行注册
    public function reg_do(Request $request)
    {
        $data = $request->input();
        
        if(empty($data['user_name'])){
            echo "<script>alert('用户名必填'); window.history.go(-1);</script>";
            die;
        }

        if(empty($data['email'])){
            echo "<script>alert('邮箱必填'); window.history.go(-1);</script>";
            die;
        }
       
        if(empty($data['pwd'])){
            echo "<script>alert('密码必填'); window.history.go(-1);</script>";
            die;
        }

        $name = UserModel::where(['user_name'=>$data['user_name']])->first();
        if($name){
            echo "<script>alert('用户名已存在'); window.history.go(-1);</script>";
            die;
        }
        $email = UserModel::where(['email'=>$data['email']])->first();
        if($email){
            echo "<script>alert('邮箱已存在'); window.history.go(-1);</script>";
            die;
        }

        $pwd = password_hash($data['pwd'], PASSWORD_BCRYPT);
        $userInfo = [
            'user_name'     => $data['user_name'],
            'email'         => $data['email'],
            'pwd'           => $pwd
        ];
        $res = UserModel::insertGetId($userInfo);
        if($res>0){
            echo "<script>alert('注册成功',location='/login')</script>";
        }else{
            echo "<script>alert('注册失败',localtion='/reg')</script>";
        }
    }

    //登录
    public function login(){
        return view('login.login');
    }
    //执行登录
    public function login_do(Request $request)
    {
        $u = $request->input('u');
        $pwd = $request->input('pwd');
        $res = UserModel::where(['user_name'=>$u])->orWhere(['email'=>$u])->first();
        if($res == NULL){
            echo "<script>alert('用户不存在,请先注册用户!');location='/reg'</script>";
        }

        if(password_verify($pwd,$res->pwd)){
            session(['uid' => $res->uid]);
            echo "<script>alert('登陆成功,正在跳转至个人中心');location='/center'</script>";
        }else{
            echo "<script>alert('密码不正确,请重新输入...');window.history.go(-1);</script>";
        }

    } 
    













































































    
    // //个人中心
    // public function center(Request $request)
    // {
    //     // $data = $request->session()->all();
    //     // print_r($data);
    //     $res = UserModel::where(['uid'=>session('uid')])->first();

    //     if(session()->has('uid')){
    //         return view('login.center',['data'=>$res]);
    //     }else{
    //         echo "<script>alert('请先登录');location='/login'</script>";
    //     }
    // }



















}
