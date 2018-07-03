<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Admin;
class AdminController extends Base
{
    public function index()
    {
    	$admins=Model('Admin')->getAllAdmin();
        return $this->fetch('',['admins'=>$admins]);
    }
}
?>
