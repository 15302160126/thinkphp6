<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\Author;
class AuthorController extends Base
{
    public function index()
    {
    	$authores=Model('Author')->getAllAuthor();
        return $this->fetch('',['authores'=>$authores]);
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $author=model('Author')->get($id);
        if(!is_null($author)){
            if($author->delete()){
                $this->success('删除成功','author/index');
            }
        }
            $this->error('删除失败');
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $author=model('Author')->get($id);
        $this->assign('author',$author);
        return $this->fetch('');
    }
    public function edit(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $author=model('Author')->get($id);
        $this->assign('author',$author);
        return $this->fetch('');
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('Author');
        if(!validate()->scene('update')->check($data)){
            $this->error($validate->getError());
        }
        $authorData=[
            'username'=>$data['username'],
            'realname'=>$data['realname'],
            'logo'=>$data['logo'],
            'tel'=>$data['tel'],
            'email'=>$data['email'],
            'note'=>$data['note'],
            'status'=>1,
        ];
        $authorid=model('Author')->save($authorData,['id'=>intval($data['id'])]);
        if($authorid){
            $this->redirect(url('author/index'));
        }else{
            $this->error('不成功');
        }
    }
}
?>
