<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha;
class LoginController extends Controller
{
    public function index(){
        session('my_user',null,'my');
        $admin=session('my_admin','','my');
        if($admin&&$admin->id){
            $this->redirect('admin/index');
        }
        return $this->fetch();
    }
    public function check(){
        if(!request()->isPost()){
            $this->error('错误');
        }
        $data=input('post.');

        $captcha=$data['captcha'];
        if(!captcha_check($captcha)){          
            $this->error('验证码错误');
        }

        $username=$data['username'];
        $admin=model('Admin')->getAdminByuserName($username);
        if(!$admin){
            $this->error('错误');
        }//.$admin->code
        if($admin->password!=(md5($data['password']))){
            $this->error('密码输入错误');
        }
        session('my_admin',$admin,'my');
        $this->success('ok','admin/index');
    }
    public function logout(){
        session(null,'my');
        $this->redirect('login/index');
    }
}
?>
