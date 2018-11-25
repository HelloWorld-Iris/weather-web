<?php
namespace app\index\controller;
 
use think\Controller;
 
class Login extends Controller
{
  
  public function index()
  {
    return $this->fetch();
  }
    public function doLogin()
  {
    $param=input('post.');
    if(empty($param['user_name']))
    {
         $this->error('用户名不能为空');
    }

    if(empty($param['user_pwd']))
    {
        $this->error('密码不能为空');
    }
    
    $has=db('users')->where('user_name',$param['user_name'])->find();
    if(empty($has))
    {
        $this->error('用户名密码错误');
    }
    if($has['user_pwd']!=md5($param['user_pwd']))
    {
        $this->error('用户名密码错误');
    }

    cookie('user_id',$has['id'],3600);
    cookie('user_name',$has['user_name'],3600);

    $this->redirect(url('index/index'));
}
  
  public function loginOut()
  {
    cookie('user_id',null);
    cookie('user_name',null);
    
    $this->redirect(url('login/index'));
  }
   
}
