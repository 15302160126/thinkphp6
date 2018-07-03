<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{
    private $account='';
    public function _initialize(){
        if(!$this->isLogin()){
            $this->redirect('login/index');
        }
        $user=$this->getLoginUser();
        $this->assign('user',$user);
    }
    public function isLogin(){
        $user=$this->getLoginUser();
        if($user&&$user->id){
            return true;
        }
        return false;
    }
    public function getLoginUser(){
        if(!$this->account){
            $this->account=session('my_admin','','my');
        }
        return $this->account;
    }
}
?>
