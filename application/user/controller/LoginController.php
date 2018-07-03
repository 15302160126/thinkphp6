<?php
namespace app\user\controller;
use think\Controller;
use think\captcha;
class LoginController extends Controller
{
    public function index(){
        $author=session('my_author','','my');
        if($author&&$author->id){
            $this->redirect('author/index');
        }  
        session(null,'my');
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
        $author=model('Author')->getAuthorByuserName($username);
        if(!$author){
            $this->error('错误');
        }//.$author->code
        if($author->password!=(md5($data['password']))){
            $this->error('密码输入错误');
        }
        session('my_author',$author,'my');
        $this->success('ok','author/index');
    }
    public function logout(){
        session(null,'my');
        $this->redirect('login/index');
    }
}
?>
