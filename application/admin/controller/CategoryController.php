<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Category;
class CategoryController extends Base
{
    public function index()
    {
    	$categorys=Model('Category')->getAllCategory();
        return $this->fetch('',['categorys'=>$categorys]);
    }
    public function edit(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $category=model('Category')->get($id);
        $this->assign('category',$category);
        return $this->fetch('');
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('Category');
        if(!validate()->scene('update')->check($data)){
            $this->error($validate->getError());
        }
        $categoryData=[
            'categoryname'=>$data['categoryname'],
        ];
        $categoryid=model('Category')->save($categoryData,['id'=>intval($data['id'])]);
        if($categoryid){
            $this->redirect(url('category/index'));
        }else{
            $this->error('不成功');
        }
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $category=model('Category')->get($id);
        $this->assign('category',$category);
        return $this->fetch('');
    }
    public function add(){
        return $this->fetch();
    }
    public function save(){
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('Category');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $categoryData=[
            'categoryname'=>$data['categoryname'],
        ];
        $categoryid=model('Category')->add($categoryData);
        if($categoryid){
            $this->redirect(url('category/index'));
        }else{
            $this->error('提交失败');
        }
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $category=model('Category')->get($id);
        if(!is_null($category)){
            if($category->delete()){
                $this->success('删除成功','category/index');
            }
        }
            $this->error('删除失败');
    }
}
?>
