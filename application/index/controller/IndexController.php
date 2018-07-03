<?php
namespace app\index\controller;
use think\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$articles=Model('Article')->getAllArticle();
        return $this->fetch('',['articles'=>$articles]);
    }
}
?>
