<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Category;
use think\Db;
class CategoryController extends Controller
{
    public function index()
    {
     
    	$categorys=Model('Category')->getAllCategory();
        
        $id=input('param.id');


        if($id==0||is_null($id)){
            $this->error('参数有误');
        }        
   $articles=Model('Article')->getAllArticle_id($id);

        $category=model('Category')->get($id);
      
        $this->assign('category',$category);
        return $this->fetch('',['categorys'=>$categorys,
                                'articles'=>$articles,
            ]);
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
}
?>
