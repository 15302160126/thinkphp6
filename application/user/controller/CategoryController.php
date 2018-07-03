<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\Category;
class CategoryController extends Base
{
    public function index()
    {
    	$categorys=Model('Category')->getAllCategory();
        return $this->fetch('',['categorys'=>$categorys]);
    }
}
?>
