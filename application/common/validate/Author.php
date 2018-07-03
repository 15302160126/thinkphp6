<?php
namespace app\common\validate;
use think\Validate;
class Author extends Validate{
	protected $rule=[
		['realname','require|max:10','名字不超过10个字符'],
	];
	protected $scene=[
		'add'=>['username'],
		'edit'=>['id','username'],
		'delete'=>['id'],
	];
}
?>