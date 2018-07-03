<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\Author;
class AuthorsController extends Controller
{
    public function add(){
        return $this->fetch('author/add');
    }
    public function save(){
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('Author');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $authorData=[
            'username'=>$data['username'],
            'realname'=>$data['realname'],
            'logo'=>$data['logo'],
            'password'=>md5($data['password']),
            'tel'=>$data['tel'],
            'email'=>$data['email'],
            'note'=>$data['note'],
        ];
        $authorid=model('Author')->add($authorData);
        if($authorid){
            $this->success('ok','login/index');
        }else{
            $this->error('提交失败');
        }
    }
}
?>
