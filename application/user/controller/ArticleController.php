<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\Article;
class ArticleController extends Base
{
    public function index()
    {
    	$articles=Model('Article')->getAllArticle();
        return $this->fetch('',['articles'=>$articles]);
    }
    public function add(){
        $authores=model('Author')->getAllAuthor();
        $categorys=model('Category')->getAllCategory();
        return $this->fetch('',[
                'authores'=>$authores,
                'categorys'=>$categorys,
            ]);
    }
    public function save(){
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('Article');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $categoryID=$data['category_id'];
        $articleData=[
            'title'=>$data['title'],
            'logo'=>$data['logo'],
            'author_id'=>$data['author_id'],
            'category_id'=>$data['category_id'],
            'description'=>$data['description'],
            'content'=>$data['content'],
            'up'=>0,
            'status'=>1,
        ];
        $articleid=model('Article')->add($articleData);
        if($articleid){
            $this->redirect(url('article/index'));
        }else{
            $this->error('提交失败');
        }
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $article=model('Article')->get($id);
        if(!is_null($article)){
            if($article->delete()){
                $this->success('删除成功','article/index');
            }
        }
            $this->error('删除失败');
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $article=model('Article')->get($id);
        $this->assign('article',$article);
        return $this->fetch('');
    }
    public function edit(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $article=model('Article')->get($id);
        $authores=model('Author')->getAllAuthor();
        $categorys=model('Category')->getAllCategory();
        $this->assign('article',$article);
        return $this->fetch('',[
                'authores'=>$authores,
                'categorys'=>$categorys,
            ]);
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('Article');
        if(!validate()->scene('update')->check($data)){
            $this->error($validate->getError());
        }
        $articleData=[
            'title'=>$data['title'],
            'logo'=>$data['logo'],
            'category_id'=>$data['category_id'],
            'description'=>$data['description'],
            'content'=>$data['content'],
            'up'=>0,
            'status'=>1,
        ];
        $articleid=model('Article')->save($articleData,['id'=>intval($data['id'])]);
        if($articleid){
            $this->redirect(url('article/index'));
        }else{
            $this->error('不成功');
        }
    }
}
?>
