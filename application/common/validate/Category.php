<?php
namespace app\common\validate;
use think\Validate;
class Category extends Validate{
	protected $rule=[
		['categoryname','require|max:30','不超过20个字符'],
	];
	protected $scene=[
		'add'=>['categoryname'],
		'edit'=>['id','categoryname'],
		'delete'=>['id'],
	];
}
?>