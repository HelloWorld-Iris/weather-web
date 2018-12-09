<?php
namespace app\index\controller;
 
use think\Controller;
 
class Register extends Controller
{
  
  public function index()
  {
    return $this->fetch();
  }
    public function doRegister()
  {
    $param=input('post.');
    if(empty($param['user_name']))
    {
         echo "<script>alert('账号不能为空');history.back();</script>";
    }else if(empty($param['user_pwd']))
    {
       echo "<script>alert('密码不能为空');history.back();</script>";
    }else if($param['user_pwd']!=$param['user_pwd_again'])
    {
      echo "<script>alert('两次输入密码不同');history.back();</script>";
    }else
    {
      $has=db('users')->where('user_name',$param['user_name'])->find();
   
      if($has)
      {
          $this->error('用户名已经被使用，请更换用户名');
      }else
      {
        $data = ['user_name'=>$param['user_name'],'user_pwd'=>md5($param['user_pwd'])];
            $ok = db('users')->insert($data);
        $this->redirect(url('login/index'));
      }
      
    }
    
  

    
}
  

   
}
